<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Currency;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserAccountController extends Controller
{
     /**
     * function to display all Users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $roleId
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        $roleId = $request->get('roleId') ?? 0;

        //Get values for sorting and ordering if defined
        $sortBy = $request->get('sort') ?? 'name';
        $orderBy = $request->get('order') ?? 'asc';

        //Find users based on criteria above
        $users = ($roleId > 0) ? User::where('roles_id', $roleId)
                ->orderBy($sortBy, $orderBy)
                ->paginate(10) 
                : 
                User::orderBy($sortBy, $orderBy)
                ->paginate(10);

        $pages = $users->getUrlRange(1, $users->lastPage());

        return view('dashboard.users.all', ['users' => $users, 'pages' => $pages]);

    }

    public function profile(Request $request) {
        return view('dashboard.users.profile', ['user' => $request->user(), 'currencies' => Currency::all(), 'currency' => Currency::find($request->user()->main_currency)]);
    }


    public function update(ProfileUpdateRequest $request) {

        //Get AUthenticated User
        $user = User::find($request->user()->id);

        if(!$user->image_path) {
            $request->validate(['user_image' => ['required', Rule::imageFile()]]);
        }

        $hasImage = $request->hasFile('user_image');

        //Delete previous image
        if($hasImage AND $user->image_path AND Storage::has($user->image_path)) {
            Storage::delete($user->image_path);
        }
       
        //Update user
        $user->update([
            'username' => $request->get('user_name'),
            'date_of_birth' => $request->get('user_date_of_birth'),
            'main_currency' => $request->get('user_currency'),
            'image_path' => $hasImage ? $request->file('user_image')->store('public/users/images') : $user->image_path
        ]);
        

        $address = $user->address;

        //Update User address
        $address->update([
            'phone' => $request->get('user_phone'),
            'address' => $request->get('user_address'),
            'zip_or_postal_code' => $request->get('user_zip'),
            'state' => $request->get('user_state'),
            'country' => $request->get('user_country'),
            'province' => $request->get('user_province')
        ]);
        
        $user->update(['is_locked' => 0]);
        
        return redirect()->route('dashboard.home');
    }

    /**
     * Function to search for users
     */

    public function search(Request $request) {
        $query = $request->get('query');

        $users = User::where('name', 'LIKE', '%'. $query .'%')
                    ->orWhere('email', 'LIKE', '%'. $query .'%')
                    ->paginate(10);

        $pages = $users->getUrlRange(1, $users->lastPage());
        
        return view('dashboard.users.all', ['users' => $users, 'pages' => $pages]);
    }

    public function assignRole(Request $request) {

        if($request->method() === "POST") {

            try {
                User::find($request->id)->update(['roles_id' => $request->user_role]);
                return redirect()->route('users.all');

            } catch (\Throwable $th) {
                return back();
            }
        }

        return view('dashboard.users.assign-role', ['roles' => Roles::all(), 'user' => User::find($request->id)]);
    }

    public function edit(Request $request) {

        try {
            $user = User::find($request->id);
            return view('dashboard.users.show', ['user' => $user, 'currencies' => Currency::all(), 'currency' => Currency::find($user->main_currency)]);

        } catch (\Throwable $th) {
            return back();
        }
    }

    public function status(Request $request) {

        try {

            $user = User::find($request->id);
            $user->update(['is_locked' => !$user->is_locked]);

            return redirect()->route('users.all');

        } catch (\Throwable $th) {
            return back();
        }
    }
    
}
