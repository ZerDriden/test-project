<?php

namespace App\Swagger\V1\Departments;

/**
 * @OA\Schema(
 *     title="Creating or updating a department",
 *     type="object",
 *     description="Creating or updating a department"
 * )
 */
final class CreateOrUpdateDepartmentRequest
{
    /**
     * @OA\Property(
     *     property="name",
     *     description="Department name.",
     *     type="string",
     *     example="DepartmentName"
     * )
     */
    public string $name;
}
