<?php

namespace Tests\Unit;

use App\Services\PolicyParameters;
use App\Services\ResignationCalculator;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ResignationCalculatorTest extends TestCase
{
    public static function policyCases(): array
    {
        return [
            'exactly one year and insufficient notice uses 3 basic salaries' => ['2025-01-01', '2025-10-01', '2026-01-01', 'one_year_or_more', false, 3000.0],
            'less than one year and insufficient notice uses 1 basic salary' => ['2025-01-02', '2025-11-15', '2025-12-01', 'under_one_year', false, 1000.0],
            'one year or more with sufficient notice has no recovery' => ['2024-01-01', '2025-10-01', '2026-01-01', 'one_year_or_more', true, 0.0],
            'under one year with sufficient notice has no recovery' => ['2025-01-02', '2025-11-01', '2025-12-02', 'under_one_year', true, 0.0],
            'Pay Scale 2026 date begins on 1 July 2026' => ['2025-07-01', '2026-04-01', '2026-07-01', 'one_year_or_more', true, 0.0],
        ];
    }

    #[DataProvider('policyCases')]
    public function test_policy_boundaries(
        string $joining, string $notice, string $lastDay, string $group, bool $noticeSatisfied, float $recovery,
    ): void {
        $calculator = new ResignationCalculator(new PolicyParameters());
        $result = $calculator->calculate(
            CarbonImmutable::parse($joining), CarbonImmutable::parse($notice), CarbonImmutable::parse($lastDay), 1000,
        );

        self::assertSame($group, $result['service_group']);
        self::assertSame($noticeSatisfied, $result['notice_satisfied']);
        self::assertSame($recovery, $result['resignation_recovery']);
    }

    public function test_effective_date_is_exactly_first_of_july_2026(): void
    {
        $policy = new PolicyParameters();
        self::assertSame('2026-07-01', $policy->payScale2026EffectiveDate->toDateString());
    }
}
