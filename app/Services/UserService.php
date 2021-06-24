<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @var $user
     */
    protected User $user;

    /**
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Create new token for external API by Sanctum
     *
     * @return array
     */
    public function createToken() : string
    {
        auth()->user()->tokens()->delete();

        $token = auth()->user()->createToken(md5(time()));

        return $token->plainTextToken;
    }
}
