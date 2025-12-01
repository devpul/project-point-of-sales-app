<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function validateAuth()
    {
        try {
            
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return redirect()->back()->with('error', $errors);
        }
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function indexLogin()
    {
        return view('auth.login');
    }
}
