<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Http\Requests\V1\Departments\StoreRequest;
use App\Http\Requests\V1\Departments\UpdateRequest;
use App\Http\Requests\V1\Departments\DeleteRequest;

final class DepartmentController extends Controller
{
    public function __construct(private readonly DepartmentRepositoryInterface $repository)
    {

    }

    /**
     * @OA\Get(
     *     path="/departments?page={page}&take={take}",
     *     operationId="getDepartments",
     *     tags={"Departments"},
     *     summary="List of departments",
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
     *         @OA\JsonContent(ref="#/components/schemas/DepartmentsListResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * List of departments.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $total = Department::query()->count();

        $page = $request->get('page', 0);
        $take = $request->get('take', 0);

        return $this->getPaginationResponse($page, $take, $total, $this->repository->getAllDepartments($page, $take));
    }

    /**
     * @OA\Post(
     *     path="/departments",
     *     operationId="createDepartment",
     *     tags={"Departments"},
     *     summary="Creating a department",
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateDepartmentRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful creation",
     *         @OA\JsonContent(ref="#/components/schemas/CreateDepartmentResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * Creating a department.
     *
     * @param StoreRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json([
            'department' => $this->repository->createDepartment($request->validated()),
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Put(
     *     path="/departments/{department}",
     *     operationId="updateDepartment",
     *     tags={"Departments"},
     *     summary="Updating the department",
     *     @OA\Parameter(
     *         in="path",
     *         name="department",
     *         description="The department ID.",
     *         required=true,
     *         example=1,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateDepartmentRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful update",
     *         @OA\JsonContent(ref="#/components/schemas/OperationSuccessBooleanResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Department not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * Updating the department.
     *
     * @param Department $department
     * @param UpdateRequest $request
     *
     * @return JsonResponse
     */
    public function update(Department $department, UpdateRequest $request): JsonResponse
    {
        return response()->json([
            'result' => $this->repository->updateDepartment($department, $request->validated()),
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/departments/{department}",
     *     operationId="deleteDepartment",
     *     tags={"Departments"},
     *     summary="Deleting the department",
     *     @OA\Parameter(
     *         in="path",
     *         name="department",
     *         description="The department ID.",
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
     *         description="Department not found",
     *         @OA\JsonContent(ref="#/components/schemas/NotFoundResponse")
     *     )
     * )
     *
     * Deleting the department.
     *
     * @param Department $department
     * @param DeleteRequest $request
     *
     * @return JsonResponse
     */
    public function destroy(Department $department, DeleteRequest $request): JsonResponse
    {
        return response()->json([
            'result' => $this->repository->deleteDepartment($department),
        ]);
    }
}
