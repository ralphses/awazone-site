<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserAddress;
use App\Providers\RouteServiceProvider;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //Check for referal code
        $referralCode = $request->get('referralCode') ?? false;
        $userReferrer = ($referralCode) ? User::where('referral_code', $referralCode)->get()->value('referral_code') : null;

        //Assign a role for user
        $userRole = Roles::where('name', 'user')->get()->first() ?? Roles::create(['name' => 'user', 'token' => uniqid()]);

        //Create this user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $userRole->id,
            'referral_code' => substr($request->email, 0, strpos($request->email, '@')),
            'referred_by' => $userReferrer,
            'username' => substr($request->email, 0, strpos($request->email, '@')),

        ]);

        //Create address record for this user
        UserAddress::create(['user_id' => $user->id]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}