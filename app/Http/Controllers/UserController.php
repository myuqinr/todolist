<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function register(){
        return view("register");
    }

    public function create(RegisterRequest $request){
        $data = $request->validated();
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["repeat_password"]),
        ]);

        // Log::info($user);

        return redirect(route("login.page"))->with("status", "Register Successfull");
    }

    public function login(){
        return view("login");
    }

    public function loginAction(LoginRequest $request){
        $data = $request->validated();
        $status = Auth::attempt([
            "email" => $data["email"],
            "password" => $data["password"]
        ]);
        if($status){
            return redirect()->intended("/main");
        }else{
            return redirect("/login")->with("error", "Login Failed");
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }

    public function profile(){
        $user = Auth::user();
        if($this->authorize("view", $user)){
            return view("profile", ["user" => $user]);
        }
    }

    public function updateProfilePage(){
        $user = Auth::user();


        return view("update_profile", ["user" => $user]);
    }

    public function updateUserAction(UpdateUserRequest $request){
        $user = Auth::user();
        $data = $request->validated();

        if(trim($data["new_password"]) == ""){
            User::find($user->id)->update([
                "name" => $data["name"],
                "email" => $data["email"],

            ]);
            return redirect()->route("update.profile.page")->with("message", "Profile updated successfully");
        }

        User::find($user->id)->update([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["new_password"]),
        ]);

        return redirect()->route("update.profile.page")->with("message", "Profile updated successfully");


    }
}