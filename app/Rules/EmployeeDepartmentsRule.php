<?php

namespace App\Rules;

use Closure;
use App\Models\Department;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EmployeeDepartmentsRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $nonExistsIds = array_diff(
            $value,
            Department::query()->select('id')->pluck('id')->toArray()
        );

        if ($nonExistsIds) {
            $fail('Defunct departments: ' . implode(', ', $nonExistsIds));
        }
    }
}
