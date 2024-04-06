<?php

namespace App\Swagger\V1\Employees;

/**
 * @OA\Schema(
 *     title="Creating or updating an employee",
 *     type="object",
 *     description="Creating or updating an employee"
 * )
 */
final class CreateOrUpdateEmployeeRequest
{
    /**
     * @OA\Property(
     *     property="name",
     *     description="Employee name.",
     *     type="string",
     *     example="EmployeeName"
     * )
     */
    public string $name;

    /**
     * @OA\Property(
     *     property="surname",
     *     description="Employee surname.",
     *     type="string",
     *     example="EmployeeSurname"
     * )
     */
    public string $surname;

    /**
     * @OA\Property(
     *     property="patronymic",
     *     description="Employee patronymic.",
     *     type="string",
     *     example="EmployeePatronymic"
     * )
     */
    public string $patronymic;

    /**
     * @OA\Property(
     *     property="gender",
     *     description="Employee gender.",
     *     type="integer",
     *     example=0
     * )
     */
    public int|string|null $gender;

    /**
     * @OA\Property(
     *     property="wage",
     *     description="Employee wage.",
     *     type="integer",
     *     example=8964
     * )
     */
    public int $wage;

    /**
     * @OA\Property(
     *     property="departments",
     *     description="Employee departments.",
     *     type="array",
     *     @OA\Items(
     *         type="number",
     *         description="The department ID",
     *         @OA\Schema(type="number")
     *     ),
     *     example="[1,3]"
     * )
     */
    public array $departments;
}
