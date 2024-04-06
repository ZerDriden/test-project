<?php

namespace App\Swagger\V1;

/**
 * @OA\Schema(
 *     title="Validation 422 error response",
 *     type="object",
 *     description="Validation 422 error response"
 * )
 */
final class ValidationErrorResponse
{
    /**
     * @OA\Property(
     *     property="message",
     *     description="Error text.",
     *     type="string",
     *     example="The name field is required."
     * )
     */
    public string $message;

    /**
     * @OA\Property(
     *     property="errors",
     *     description="List of fields with errors.",
     *     type="object",
     *     example="{""name"": [""The name field is required.""]}"
     * )
     */
    public object $errors;
}
