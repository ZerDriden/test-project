<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\EmployeeRepositoryInterface;

final class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployees(int $page, int $take): object
    {
        return Employee::query()->paginationByPageFilter($page, $take)->get();
    }

    public function createEmployee(array $requestData): Builder|Model
    {
        $departments = $requestData['departments'];

        unset($requestData['departments']);

        $employee = Employee::query()->create($requestData);
        $employee->departments()->attach($departments);

        return $employee;
    }

    public function updateEmployee(Employee $employee, array $requestData): bool
    {
        $departments = $requestData['departments'];

        unset($requestData['departments']);

        $result = $employee->update($requestData);
        $employee->departments()->sync($departments);

        return $result;
    }

    public function deleteEmployee(Employee $employee): bool|null
    {
        return $employee->delete();
    }
}
