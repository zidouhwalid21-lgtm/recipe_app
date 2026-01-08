<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister(){
        
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function register(Request $request){
        $validated= $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|email|unique:users',
            'password' =>'required|string|min:8|confirmed',
        ]);
        $validated['password']=Hash::make($validated['password']);
        $user=User::create($validated);
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request){
         $validated= $request->validate([
            'email' =>'required|email',
            'password' =>'required|string',
            'g-recaptcha-response'=>'required|captcha'
         ]);
         if(Auth::attempt($request->only('email','password'))){
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
         }

         throw ValidationException::withMessages([
            'credentials'=> 'sorry, incorrect credentials'
         ]);
    }

    public function logout(Request $request){
        Auth::logout();

        //to delete all data u had once logging out
        $request->session()->invalidate();

        //to regenerate a token in the next login
        //so the previous token doesnt be used again for security
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
