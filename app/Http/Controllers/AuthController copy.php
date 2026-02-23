<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Logged in Successfully');
        }
        return redirect("login")->with('error', 'Invalid credentials');
    }

    public function postRegistration(Request $request){  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:24',
            'confirm_password' => 'required_with:password|same:password'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        
        $user->save();
        
        if($user){
            return view("register-success")->with('Success','Great! registration-success');
        }
        return redirect("register")->withSuccess('Try Again Register');
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }

    public function logout(){
        Session::flush();
        Auth::logout();
        return view('logout-success')->with('error', 'Logged Out');
    }
}
