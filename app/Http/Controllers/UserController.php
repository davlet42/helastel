<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;

class UserController extends Controller
{
    /**
     * @var userService
     */
    protected UserService $userService;

    /**
     *
     * @param UserService $userService
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Create new token for external API by Sanctum
     *
     * @return \Illuminate\Http\Response
     */
    public function createToken()
    {
        $result = [
            'status' => 200,
        ];

        try {
            $result['token'] = $this->userService->createToken();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'errors' => [[$e->getMessage()]]
            ];
        }

        return response()->json($result, $result['status']);
    }
}
