<?php

namespace App\Http\Requests\V1\Employees;

use App\Enums\GenderEnum;
use App\Rules\EmployeeDepartmentsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\ValidationRule;

final class StoreOrUpdateRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'patronymic' => 'required|string',
            'gender' => 'nullable|integer|in:' . GenderEnum::getValues(','),
            'wage' => 'required|integer',
            'departments' => ['required', 'array', 'min:1', new EmployeeDepartmentsRule()],
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @param string|null $key
     * @param mixed $default
     *
     * @return array
     * @throws ValidationException
     */
    public function validated($key = null, $default = null): array
    {
        $data = $this->validator->validated();

        if (! isset($data['gender'])) {
            $data['gender'] = null;
        }

        return $data;
    }
}
