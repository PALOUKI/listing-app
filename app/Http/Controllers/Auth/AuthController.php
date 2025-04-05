<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function OnRegister(Request $request)
    {
        sleep(2);

        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:4']
        ]);

        $user = User::create($credentials);

        //send verification email
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login()
    {
        return Inertia::render('Auth/Login', [
            'status' => session('status')
        ]);
    }

    public function OnLogin(Request $request)
    {
        sleep(2);

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Vos informations sont incorrectes.'
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
