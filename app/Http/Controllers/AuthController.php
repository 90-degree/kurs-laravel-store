<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\NewUserEmailTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $credentials = $request->validated();
        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        $user->roles()->attach(1);
        Auth::login($user);
        // $details = [
        //     'title' => 'Mail from vivify-kurs',
        //     'body' => 'Wellcome ' . $user->name
        // ];
        // Mail::to($user->email)->send(new NewUserEmailTemplate($details));

        return redirect('/');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['password' => 'Wrong email or password']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
