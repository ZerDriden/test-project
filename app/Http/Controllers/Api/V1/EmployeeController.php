<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Http\Requests\V1\Employees\StoreOrUpdateRequest;

final class EmployeeController extends Controller
{
    public function __construct(private readonly EmployeeRepositoryInterface $repository)
    {

    }

    /**
     * @OA\Get(
     *     path="/employees?page={page}&take={take}",
     *     operationId="getEmployees",
     *     tags={"Employees"},
     *     summary="List of employees",
     *     @OA\Parameter(
     *         in="path",
     *         name="page",
     *         description="Number of page.",
     *         example=1,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         in="path",
     *         name="take",
     *         description="The number of items to be received.",
     *         example=10,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/EmployeesListResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * List of employees.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $total = Employee::query()->count();

        $page = $request->get('page', 0);
        $take = $request->get('take', 0);

        return $this->getPaginationResponse($page, $take, $total, $this->repository->getAllEmployees($page, $take));
    }

    /**
     * @OA\Post(
     *     path="/employees",
     *     operationId="createEmployees",
     *     tags={"Employees"},
     *     summary="Creating an employee",
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateEmployeeRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful creation",
     *         @OA\JsonContent(ref="#/components/schemas/CreateEmployeeResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * Creating an employee.
     *
     * @param StoreOrUpdateRequest $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(StoreOrUpdateRequest $request): JsonResponse
    {
        return response()->json([
            'employee' => $this->repository->createEmployee($request->validated()),
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Put(
     *     path="/employees/{employee}",
     *     operationId="updateEmployee",
     *     tags={"Employees"},
     *     summary="Updating the employee",
     *     @OA\Parameter(
     *         in="path",
     *         name="employee",
     *         description="The employee ID.",
     *         required=true,
     *         example=1,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateEmployeeRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful update",
     *         @OA\JsonContent(ref="#/components/schemas/OperationSuccessBooleanResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employee not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * Updating the employee.
     *
     * @param Employee $employee
     * @param StoreOrUpdateRequest $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Employee $employee, StoreOrUpdateRequest $request): JsonResponse
    {
        return response()->json([
            'result' => $this->repository->updateEmployee($employee, $request->validated()),
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/employees/{employee}",
     *     operationId="deleteEmployee",
     *     tags={"Employees"},
     *     summary="Deleting the employee",
     *     @OA\Parameter(
     *         in="path",
     *         name="employee",
     *         description="The employee ID.",
     *         required=true,
     *         example=1,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful deletion",
     *         @OA\JsonContent(ref="#/components/schemas/OperationSuccessBooleanResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Employee not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     )
     * )
     *
     * Deleting the employee.
     *
     * @param Employee $employee
     *
     * @return JsonResponse
     */
    public function destroy(Employee $employee): JsonResponse
    {
        return response()->json([
            'result' => $this->repository->deleteEmployee($employee),
        ]);
    }
}
