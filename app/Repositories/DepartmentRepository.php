<?php

namespace App\Repositories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\DepartmentRepositoryInterface;

final class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function getAllDepartments(int $page, int $take): object
    {
        return Department::query()
            ->withCount('employees')
            ->withMax('employees', 'wage')
            ->paginationByPageFilter($page, $take)
            ->get();
    }

    public function createDepartment(array $requestData): Builder|Model
    {
        return Department::query()->create($requestData);
    }

    public function updateDepartment(Department $department, array $requestData): bool
    {
        return $department->update($requestData);
    }

    public function deleteDepartment(Department $department): bool|null
    {
        return $department->delete();
    }
}
