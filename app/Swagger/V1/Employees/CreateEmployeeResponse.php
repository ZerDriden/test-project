<?php

namespace App\Swagger\V1\Employees;

/**
 * @OA\Schema(
 *     title="Creating an employee response",
 *     type="object",
 *     description="Creating an employee response"
 * )
 */
final class CreateEmployeeResponse
{
    /**
     * @OA\Property(
     *     property="employee",
     *     description="Data of the created employee.",
     *     type="object",
     *     @OA\Property(
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
     *     example="{""id"": 1, ""gender"": ""Мужской"", ""wage"": 235828, ""full_name"": ""Белоусов Милан Борисович""}"
     * )
     */
    public object $employee;
}
