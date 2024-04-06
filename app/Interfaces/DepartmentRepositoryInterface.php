<?php

namespace App\Interfaces;

use App\Models\Department;

interface DepartmentRepositoryInterface
{
    public function getAllDepartments(int $page, int $take);

    public function createDepartment(array $requestData);

    public function updateDepartment(Department $department, array $requestData);

    public function deleteDepartment(Department $department);
}
