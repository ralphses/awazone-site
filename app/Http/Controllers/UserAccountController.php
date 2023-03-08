<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
     /**
     * function to display all Users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $roleId
     * @return \Illuminate\View\View
     */
    public function index(Request $request, int $roleId = 0) {

        //Get values for sorting and ordering if defined
        $sortBy = $request->get('sort') ?? 'name';
        $orderBy = $request->get('order') ?? 'asc';

        //Find users based on criteria above
        $users = ($roleId > 0) ? User::where('roles_id', $roleId)
                ->sortBy($sortBy, $orderBy)
                ->paginate(10) 
                : 
                User::orderBy($sortBy, $orderBy)
                ->paginate(10);

        $pages = $users->getUrlRange(1, $users->lastPage());

        return view('dashboard.users.all', ['users' => $users, 'pages' => $pages]);

    }

    public function profile(Request $request) {

        return view('dashboard.users.profile', ['user' => Auth::user()]);
    }


    public function update(ProfileUpdateRequest $request) {

        //Get AUthenticated User
        $user = Auth::user();
        
        //Update user
        $user->update([
            'date_of_birth' => $request->get('user_date_of_birth'),
            'main_currency' => $request->get('user_currency'),
            'image_path' => $request->user_image->storePublicly('public/user/images')
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
}
