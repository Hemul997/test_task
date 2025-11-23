<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAuthToken(): JsonResponse
    {
        $user = Auth::user() ?? throw new HttpException(Response::HTTP_FORBIDDEN, 'Not authenticated');

        return response()->json([
            'data' => [
                'token' => $user->createToken('user-token')->plainTextToken
            ]
        ]);
    }
}
