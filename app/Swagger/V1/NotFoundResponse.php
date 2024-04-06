<?php

namespace App\Swagger\V1;

/**
 * @OA\Schema(
 *     title="404 error response",
 *     type="object",
 *     description="404 error response"
 * )
 */
final class NotFoundResponse
{
    /**
     * @OA\Property(
     *     property="error",
     *     description="Error text.",
     *     type="string",
     *     example="The entity not found"
     * )
     */
    public object $error;
}
