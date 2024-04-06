<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartmentsAndEmployeesSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Employee::query()->truncate();
        Department::query()->truncate();

        Schema::enableForeignKeyConstraints();

        $employees = Employee::factory(6)->create();

        Department::factory(3)
            ->create()
            ->each(function ($department) use ($employees) {
                $department->employees()->saveMany(collect($employees)->shuffle()->slice(0, 3));
            });
    }
}
