<?php

namespace App\Infra\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use \Illuminate\Http\JsonResponse;

class ViaCepServiceException extends Exception
{
    /**
     * @param string $message 
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }

    public function report()
    {
        Log::error($this->getMessage());
    }

    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
        ], JsonResponse::HTTP_BAD_REQUEST);
    }
}
