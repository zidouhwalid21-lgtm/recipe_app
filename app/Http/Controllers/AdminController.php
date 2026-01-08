<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //    public function showRegister(){
        
    //     return view('admin.register');
    // }

    public function adminshowLogin(){
        return view('admin.login');
    }

    // public function register(Request $request){
    //     $validated= $request->validate([
    //         'name' =>'required|string|max:255',
    //         'email' =>'required|email|unique:users',
    //         'password' =>'required|string|min:8|confirmed',
    //     ]);
    //     $validated['password']=Hash::make($validated['password']);
    //     $user=User::create($validated);
    //     Auth::login($user);

    //     return redirect()->route('dashboard');
    // }

    public function adminlogin(Request $request){
         $validated= $request->validate([
            'email' =>'required|email',
            'password' =>'required|string',
         ]);
         if(Auth::guard('admin')->attempt($validated)){
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
         }

         throw ValidationException::withMessages([
            'credentials'=> 'sorry, incorrect credentials'
         ]);
    }

    public function  index(){
        $data=Admin::get();
        return view('admin.dashboard',['data'=>$data]);

    }

    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();

        //to delete all data u had once logging out
        $request->session()->invalidate();

        //to regenerate a token in the next login
        //so the previous token doesnt be used again for security
        $request->session()->regenerateToken();

        return redirect()->route('admin.show.login');
    }
}

