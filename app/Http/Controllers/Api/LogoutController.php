<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;


class LogoutController extends Controller
{
  public function __invoke(Request $request, AuthManager $authManager): \Illuminate\Http\Response
  {
    $authManager->guard('sanctum')->user()->tokens()->delete();

    return response()->noContent();
  }
}
