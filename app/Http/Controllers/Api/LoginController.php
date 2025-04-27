<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;

class LoginController extends Controller
{
  public function __invoke(LoginRequest $request): AuthResource
  {
    $accessToken = $request->apiAuthenticate();

    return new AuthResource($accessToken);
  }
}
