<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function validateAuth(Request $request, $action = null)
    {
        try {
            $rules_store = [
                'email'     =>  'required|email|unique:users,email',
                'password'  =>  'required|string|min:3',
            ];  

            $rules_update = [
                'email'     =>  'sometimes|email|unique:users,email',
                'password'  =>  'sometimes|string|min:3',
            ];

            if ($action === 'storeLogin') {
                return $request->validate($rules_store);
            } else {
                return $request->validate($rules_update);
            }

        } catch (ValidationException $e) {
            $errors = $e->errors();
            return back()->with('error', $errors);
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

    public function storeLogin(Request $request)
    {
        // validations
        $validated=
        $request->validate([
            'email'     =>  'required|email',
            'password'  =>  'required|string|min:3',
        ]);

        // klo percobaan salah
        if(!Auth::attempt($validated)) {
            return back()->with('error', 'Email atau password salah.');
        }

        // berikan session utk user
        $request->session()->regenerate();

        // ambil session user
        $userId = Auth::user()->id;

        // catat log
        activity_log('user logged in.', $userId);

        return redirect()->route('login.index')->with('success', 'Anda Berhasil Login.');
    }
}
