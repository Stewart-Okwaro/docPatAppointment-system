<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ])->validate();
 

    User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        'level'=>'User',
    ]);
    return redirect()->route('login');
}

    public function login()
    {
        return view('auth/login');
    }

    // public function loginAction(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('/');
    //     }
    
    //     // Authentication failed...
    //     return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
 
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
 
        $request->session()->regenerate();
 
        return redirect()->route('doctors.index');
    }
    // }
//     public function logout()
// {
//     Auth::logout();
//     return redirect()->route('auth/login');
// }
public function logout(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    return redirect('/');
}
    
}
