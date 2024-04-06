<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        $fullName = explode(' ', fake()->name($gender));

        return [
            'name' => $fullName[1],
            'surname' => $fullName[0],
            'patronymic' => $fullName[2],
            'gender' => $gender == 'female' ? 0 : 1,
            'wage' => fake()->randomNumber(6),
        ];
    }
}
