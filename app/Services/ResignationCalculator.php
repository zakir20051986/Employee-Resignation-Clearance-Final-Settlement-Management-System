<?php

namespace App\Services;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use InvalidArgumentException;

/**
 * Effective-dated resignation policy calculator.
 * Basic Salary is the salary basis for both service groups, as confirmed by the requester.
 */
final class ResignationCalculator
{
    public function __construct(private readonly PolicyParameters $policy = new PolicyParameters())
    {
    }

    /** @return array<string, mixed> */
    public function calculate(
        CarbonInterface $joiningDate,
        CarbonInterface $noticeDate,
        CarbonInterface $lastWorkingDate,
        string|int|float $basicSalaryAtLastWorkingDate,
    ): array {
        $joining = CarbonImmutable::instance($joiningDate)->startOfDay();
        $notice = CarbonImmutable::instance($noticeDate)->startOfDay();
        $lastDay = CarbonImmutable::instance($lastWorkingDate)->startOfDay();
        $basic = (float) $basicSalaryAtLastWorkingDate;

        if ($basic <= 0 || ! is_finite($basic)) {
            throw new InvalidArgumentException('Basic salary must be a positive finite amount.');
        }
        if ($joining->greaterThan($notice) || $notice->greaterThan($lastDay)) {
            throw new InvalidArgumentException('Dates must be ordered: joining, notice, last working day.');
        }

        $completedOneYear = $joining->addYearNoOverflow()->lessThanOrEqualTo($lastDay);
        $requiredNoticeMonths = $completedOneYear
            ? $this->policy->noticeMonthsForOneYearOrMore
            : $this->policy->noticeMonthsForUnderOneYear;
        $noticeSatisfied = $notice->addMonthsNoOverflow($requiredNoticeMonths)->lessThanOrEqualTo($lastDay);
        $recoveryMonths = $noticeSatisfied ? 0 : ($completedOneYear
            ? $this->policy->recoveryMonthsForOneYearOrMore
            : $this->policy->recoveryMonthsForUnderOneYear);
        $recovery = round($basic * $recoveryMonths, 2);

        return [
            'service_group' => $completedOneYear ? 'one_year_or_more' : 'under_one_year',
            'completed_one_year' => $completedOneYear,
            'required_notice_months' => $requiredNoticeMonths,
            'notice_satisfied' => $noticeSatisfied,
            'recovery_months' => $recoveryMonths,
            'basic_salary' => round($basic, 2),
            'salary_basis' => 'basic_salary',
            'salary_effective_date' => $this->policy->payScale2026EffectiveDate->toDateString(),
            'pay_scale' => $lastDay->greaterThanOrEqualTo($this->policy->payScale2026EffectiveDate)
                ? 'Pay Scale-2026' : 'applicable historical scale',
            'resignation_recovery' => $recovery,
            'other_recoverable_liabilities' => 0.0,
            'total_deposit' => $recovery,
            'amount_deposited' => 0.0,
            'outstanding_balance' => $recovery,
            'currency' => $this->policy->currency,
        ];
    }
}
