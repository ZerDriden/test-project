<?php

namespace App\Interfaces;

use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function getAllEmployees(int $page, int $take);

    public function createEmployee(array $requestData);

    public function updateEmployee(Employee $employee, array $requestData);

    public function deleteEmployee(Employee $employee);
}
