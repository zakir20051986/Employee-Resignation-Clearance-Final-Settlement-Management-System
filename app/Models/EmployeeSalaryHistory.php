<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class EmployeeSalaryHistory extends Model
{
    protected $fillable = ['employee_id', 'salary_scale_id', 'basic_salary', 'effective_from', 'effective_to'];

    protected function casts(): array
    {
        return ['basic_salary' => 'decimal:2', 'effective_from' => 'date', 'effective_to' => 'date'];
    }
}
