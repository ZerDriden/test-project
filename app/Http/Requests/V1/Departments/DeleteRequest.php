<?php

namespace App\Http\Requests\V1\Departments;

use App\Models\Department;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

final class DeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                $isNotDeletable = Department::query()
                    ->where('id', $this->route('department')->id)
                    ->whereHas('employees')
                    ->count();

                if ($isNotDeletable) {
                    $validator->errors()->add('department', 'Employees are linked to this department.');
                }
            }
        ];
    }
}
