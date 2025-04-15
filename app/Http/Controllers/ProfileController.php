<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

use function Laravel\Prompts\spin;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return Inertia::render('Profile/Edit', [
            'user' => $request->user(),
            'status' => session('status')
        ]);
    }

    public function updateInfo(Request $request)
    {
        sleep(1);

        $fields = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['max:255', 'email', 'lowercase', 'required', Rule::unique(User::class)->ignore($request->user()->id)]
        ]);

        $request->user()->fill($fields);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->route('profile.edit');
    }

    public function updatePassword(Request $request)
    {
        sleep(1);

        $fields = $request->validate([
            'password' => ['required', 'min:4', 'confirmed'],
            'current_password' => ['required', 'min:4', 'current_password'],
        ]);

        $request->user()->update([
            'password' => Hash::make($fields['password'])
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password_confirmation' => ['required', 'current_password']
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
