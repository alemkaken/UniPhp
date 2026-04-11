<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Support\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends BaseController
{
    public function Login(string $username, string $password)
    {
        if ($username === 'Alem' && $password === "kaken123") {
            return ApiResponse::ok($username, 'Products list');
        } else {
            return ApiResponse::error('Not found', null, 404);
        }
    }
   public function Admin(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    return response()->json($user);
}
}
