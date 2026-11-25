<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CalculateResignationRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Authentication and finance.calculate authorization are enforced when the
        // bank's identity provider and role assignments are configured.
        return true;
    }

    public function rules(): array
    {
        return [
            'joining_date' => ['required', 'date', 'before_or_equal:notice_date'],
            'notice_date' => ['required', 'date', 'before_or_equal:last_working_date'],
            'last_working_date' => ['required', 'date'],
            'basic_salary' => ['required', 'numeric', 'gt:0', 'decimal:0,2'],
        ];
    }
}
