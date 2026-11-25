<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Employee extends Model
{
    protected $fillable = ['personnel_id', 'name', 'designation', 'joining_date', 'present_office_id', 'contact_information'];

    protected function casts(): array
    {
        return ['joining_date' => 'date'];
    }
}
