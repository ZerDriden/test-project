<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Test-project",
 *     description="Test-project API documentation"
 * )
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST_V1,
 *     description="Test-project OpenApi dynamic host server"
 * )
 * @OA\Tag(
 *     name="Departments",
 *     description="Departments."
 * )
 * @OA\Tag(
 *     name="Employees",
 *     description="Employees."
 * )
 */
abstract class Controller
{
    protected function getPaginationResponse($page, $take, $total, $items): JsonResponse
    {
        return response()->json([
            'total' => $total,
            'next' => $page * $take < $total,
            'items' => $items,
        ]);
    }
}
