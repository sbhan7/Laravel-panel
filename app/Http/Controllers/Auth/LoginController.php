<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $credintials = $request->only('email', 'password');
        if (! auth()->attempt($credintials)){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'ایمیل وارد شده معتبر نمی باشد'
            ]);
        }
        $request->session()->regenerate();
        return response()->json(null, 201);
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(null,200);
    }
}
