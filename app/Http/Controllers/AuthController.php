<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage(){
        return Inertia::render('Auth/Login');
    }

    public function login(Request $request){
        try{

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if(!Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->back()->with('error', 'invalid Credentials');
        }
        
         return redirect('/dashboard')->with('success', 'Login success');
    }catch(\Throwable $th){
        return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function registerPage(){
        return Inertia::render('Auth/Registration');
    }

    public function register(Request $request){

        try{
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/login')->with('success', 'User Created Successfully');
        }catch(\Throwable $th){
           
             return redirect('/register')->with('error', 'Something went wrong');
        }
        
    }
}
