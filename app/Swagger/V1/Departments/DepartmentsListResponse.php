<?php

namespace App\Swagger\V1\Departments;

/**
 * @OA\Schema(
 *     title="Departments list response",
 *     type="object",
 *     description="Departments list response"
 * )
 */
final class DepartmentsListResponse
{
    /**
     * @OA\Property(
     *     property="total",
     *     description="The number of all departments.",
     *     type="integer",
     *     example=3
     * )
     */
    public int $total;

    /**
     * @OA\Property(
     *     property="next",
     *     description="Is it possible to upload the following data.",
     *     type="boolean",
     *     example=true
     * )
     */
    public bool $next;

    /**
     * @OA\Property(
     *     property="items",
     *     description="The list of all departments.",
     *     type="array",
     *     @OA\Items(
     *         type="object",
     *         description="The department data",
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
     *         ),
     *         @OA\Property(
     *             property="employees_count",
     *             type="integer",
     *             description="Number of employees in the department",
     *             example=3
     *         ),
     *         @OA\Property(
     *             property="employees_max_wage",
     *             type="integer",
     *             description="The maximum salary among the employees of the department",
     *             example=939692
     *         ),
     *     ),
     *     example="[{""id"": 1, ""name"": ""Управление персоналом"", ""employees_count"": 3, ""employees_max_wage"": 939692}]"
     * )
     */
    public array $items;
}
