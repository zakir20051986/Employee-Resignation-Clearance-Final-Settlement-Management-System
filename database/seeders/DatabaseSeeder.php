<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $effective = '2026-07-01';
        $policies = [
            'service_threshold_months' => 12,
            'recovery_months_one_year_or_more' => 3,
            'notice_months_one_year_or_more' => 3,
            'recovery_months_under_one_year' => 1,
            'notice_months_under_one_year' => 1,
            'pay_scale_2026_effective_date' => $effective,
            'salary_basis' => 'basic_salary',
            'currency' => 'BDT',
        ];

        foreach ($policies as $key => $value) {
            DB::table('policy_parameters')->updateOrInsert(
                ['key' => $key, 'effective_from' => '2026-01-01'],
                ['value' => json_encode($value, JSON_THROW_ON_ERROR), 'effective_to' => null, 'created_at' => now(), 'updated_at' => now()],
            );
        }

        DB::table('salary_scales')->updateOrInsert(
            ['code' => 'PAY-SCALE-2026'],
            ['name' => 'Pay Scale-2026', 'effective_from' => $effective, 'effective_to' => null, 'created_at' => now(), 'updated_at' => now()],
        );
    }
}
