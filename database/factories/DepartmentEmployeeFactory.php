<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use App\Models\DepartmentEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DepartmentEmployee>
 */
class DepartmentEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::factory(),
            'employee_id' => Employee::factory(),
        ];
    }
}
