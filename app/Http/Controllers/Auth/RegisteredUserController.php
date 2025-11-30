<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // remove unsupported 'lowercase' rule and use table name for unique
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nrp' => ['required', 'string', 'max:50', 'unique:users,nrp'],
            'prodi' => ['required', 'string', 'max:255'],
            'tahun_masuk' => ['required', 'integer', 'min:2000', 'max:2030'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nrp' => $request->nrp,
            'prodi' => $request->prodi, 
            'tahun_masuk' => $request->tahun_masuk, 
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
