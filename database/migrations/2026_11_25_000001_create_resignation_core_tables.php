<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('policy_parameters', function (Blueprint $table): void {
            $table->id();
            $table->string('key')->unique();
            $table->json('value');
            $table->date('effective_from')->index();
            $table->date('effective_to')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('salary_scales', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->date('effective_from')->index();
            $table->date('effective_to')->nullable();
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table): void {
            $table->id();
            $table->string('personnel_id')->unique();
            $table->string('name');
            $table->string('designation');
            $table->date('joining_date')->index();
            $table->foreignId('present_office_id')->nullable()->index();
            $table->string('contact_information')->nullable();
            $table->timestamps();
        });

        Schema::create('employee_salary_histories', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('employee_id')->constrained()->restrictOnDelete();
            $table->foreignId('salary_scale_id')->constrained()->restrictOnDelete();
            $table->decimal('basic_salary', 14, 2);
            $table->date('effective_from');
            $table->date('effective_to')->nullable();
            $table->timestamps();
            $table->index(['employee_id', 'effective_from', 'effective_to'], 'salary_history_lookup');
        });

        Schema::create('resignation_applications', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('employee_id')->constrained()->restrictOnDelete();
            $table->date('proposed_resignation_date');
            $table->date('proposed_last_working_date');
            $table->text('reason');
            $table->string('status')->default('submitted')->index();
            $table->foreignId('submitted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['employee_id', 'status']);
        });

        Schema::create('financial_settlements', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('resignation_application_id')->unique()->constrained()->restrictOnDelete();
            $table->decimal('basic_salary', 14, 2);
            $table->decimal('resignation_recovery', 14, 2)->default(0);
            $table->decimal('other_recoverable_liabilities', 14, 2)->default(0);
            $table->decimal('total_deposit', 14, 2)->default(0);
            $table->decimal('amount_deposited', 14, 2)->default(0);
            $table->decimal('outstanding_balance', 14, 2)->default(0);
            $table->string('currency', 3)->default('BDT');
            $table->string('status')->default('pending')->index();
            $table->json('calculation_snapshot');
            $table->foreignId('calculated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_settlements');
        Schema::dropIfExists('resignation_applications');
        Schema::dropIfExists('employee_salary_histories');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('salary_scales');
        Schema::dropIfExists('policy_parameters');
    }
};
