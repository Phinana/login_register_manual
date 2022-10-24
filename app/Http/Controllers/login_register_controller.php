<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class login_register_controller extends Controller
{
    public function login(){
        return view('login_register.login');
    }

    public function register(){
        return view('login_register.register');
    }

    public function register_user(Request $request){
        $request->validate([
            'user_name' => 'required|min:3|max:16',
            'user_email' => 'required|email|max:50|unique:users,email',
            'user_password' => 'required|min:4|max:16'
        ]);

        $user = new User();

        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->user_password);

        $result = $user->save();
        if($result){
            return back()->with('result_of_success', 'You have registered');
        }
        else{
            return back()->with('result_of_success', 'Something went wrong');
        }
    }

    public function login_user(Request $request){
        $request->validate([
            'user_email' => 'required|email|max:50',
            'user_password' => 'required|min:4|max:16'
        ]);

        $user = User::where('email', '=', $request->user_email)->first();

        if(!$user){
            return back()->with('result_of_success', 'This email has not registered yet');
        }
        if(!Hash::check($request->user_password, $user->password)){
            return back()->with('result_of_success', 'Your email or password does not match');
        }
        else{
            $request->session()->put('login_id', $user->id);
            return redirect('dashboard');
        }
    }

    public function dashboard(){
        $data = array();

        if(Session::has('login_id')){
            $data = User::where('id', '=', Session::get('login_id'))->first();
        }else{
            if(Session::has('login_id')){
                Session::pull('login_id');
            }
            return back()->with('result_of_success', 'Something went wrong and Session has been terminated');
        }

        return view('dashboard', compact('data'));
    }

    public function logout(){
        if(Session::has('login_id')){
            Session::pull('login_id');
            return redirect('login');
        }else{
            return redirect('login');
        }
    }
}
