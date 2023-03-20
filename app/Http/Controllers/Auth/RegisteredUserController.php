<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\utils\Utility;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Nette\Utils\Random;

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

        $mainCurrency = Currency::where('code', 'NGN')->get()->first() ?? Currency::create(['name' => 'Nigerian Naira', 'code' => "NGN", 'added_by' => 'Admin']);

        $usernme = substr($request->email, 0, strpos($request->email, '@')) . Random::generate(4);
        //Create this user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $userRole->id,
            'referral_code' => $usernme,
            'referred_by' => $userReferrer,
            'is_locked' => false,
            'username' => $usernme,
            'main_currency' => $mainCurrency->id

        ]);

        //Create address record for this user
        UserAddress::create(['user_id' => $user->id]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
