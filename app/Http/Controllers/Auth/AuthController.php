<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function loginWeb(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/');
        } else {
            $request->session()->put('error', 'Username and/or password is incorrect!');
            return redirect()->guest('/login');
        }
    }

    public function logoutWeb()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/');
    }
}
