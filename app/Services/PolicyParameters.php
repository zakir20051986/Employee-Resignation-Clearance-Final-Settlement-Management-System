<?php

namespace App\Services;

use Carbon\CarbonImmutable;

/** Policy defaults are seeded into policy_parameters and are overridable by authorized administrators. */
final class PolicyParameters
{
    public function __construct(
        public readonly int $recoveryMonthsForOneYearOrMore = 3,
        public readonly int $noticeMonthsForOneYearOrMore = 3,
        public readonly int $recoveryMonthsForUnderOneYear = 1,
        public readonly int $noticeMonthsForUnderOneYear = 1,
        public readonly CarbonImmutable $payScale2026EffectiveDate = new CarbonImmutable('2026-07-01'),
        public readonly string $currency = 'BDT',
    ) {
    }
}
