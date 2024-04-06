<?php

namespace App\Swagger\V1\Employees;

/**
 * @OA\Schema(
 *     title="Employees list response",
 *     type="object",
 *     description="Employees list response"
 * )
 */
final class EmployeesListResponse
{
    /**
     * @OA\Property(
     *     property="total",
     *     description="The number of all employees.",
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
     *     description="The list of all employees.",
     *     type="array",
     *     @OA\Items(
     *         type="object",
     *         description="The employee data",
     *         @OA\Property(
     *             property="id",
     *             type="integer",
     *             description="Employee ID",
     *             example=1
     *         ),
     *         @OA\Property(
     *             property="gender",
     *             type="string",
     *             description="Employee gender",
     *             example="Мужской"
     *         ),
     *         @OA\Property(
     *             property="wage",
     *             type="integer",
     *             description="Employee wage",
     *             example=235828
     *         ),
     *         @OA\Property(
     *             property="full_name",
     *             type="string",
     *             description="Fullname",
     *             example="Белоусов Милан Борисович"
     *         )
     *     ),
     *     example="[{""id"": 1, ""gender"": ""Мужской"", ""wage"": 235828, ""full_name"": ""Белоусов Милан Борисович""}]"
     * )
     */
    public array $items;
}
