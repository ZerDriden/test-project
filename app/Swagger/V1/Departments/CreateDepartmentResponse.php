<?php

namespace App\Swagger\V1\Departments;

/**
 * @OA\Schema(
 *     title="Creating a department response",
 *     type="object",
 *     description="Creating a department response"
 * )
 */
final class CreateDepartmentResponse
{
    /**
     * @OA\Property(
     *     property="department",
     *     description="Data of the created department.",
     *     type="object",
     *     @OA\Property(
     *         @OA\Property(
     *             property="id",
     *             type="integer",
     *             description="Department ID",
     *             example=1
     *         ),
     *         @OA\Property(
     *             property="name",
     *             type="string",
     *             description="Department name",
     *             example="Управление персоналом"
     *         )
     *     ),
     *     example="{""id"": 1, ""name"": ""Управление персоналом""}"
     * )
     */
    public object $department;
}
