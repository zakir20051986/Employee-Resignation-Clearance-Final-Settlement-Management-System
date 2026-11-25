<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ResignationApplication extends Model
{
    protected $fillable = ['employee_id', 'proposed_resignation_date', 'proposed_last_working_date', 'reason', 'status'];

    protected function casts(): array
    {
        return [
            'proposed_resignation_date' => 'date',
            'proposed_last_working_date' => 'date',
        ];
    }
}
