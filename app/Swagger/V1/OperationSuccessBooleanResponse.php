<?php

namespace App\Swagger\V1;

/**
 * @OA\Schema(
 *     title="Successful result response",
 *     type="object",
 *     description="Successful result response"
 * )
 */
final class OperationSuccessBooleanResponse
{
    /**
     * @OA\Property(
     *     property="result",
     *     description="Successful result.",
     *     type="boolean",
     *     example=true
     * )
     */
    public object $result;
}
