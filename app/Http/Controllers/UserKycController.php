<?php

namespace App\Http\Controllers;

use App\Models\UserKyc;
use App\Models\utils\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserKycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kycs = UserKyc::paginate(10);

        $pages = $kycs->getUrlRange(1, $kycs->lastPage());

        return view('dashboard.users.kyc.all', ['kycs' => $kycs, 'pages' => $pages, 'types' => Utility::KYC_DOC_TYPE]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.kyc.add', ['types' => Utility::KYC_DOC_TYPE]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->userKyc) {
            return redirect()->route('dashboard.home');
        }
        $request->validate([
            'kyc_type' => ['required', Rule::in(array_keys(Utility::KYC_DOC_TYPE))],
            'kyc_image' => ['required', Rule::imageFile()]
        ]);

        UserKyc::create([
            'type' => $request->get('kyc_type'),
            'path' => $request->file('kyc_image')->storePublicly('public/user/kyc'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('dashboard.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('dashboard.users.kyc.view', ['kyc' => UserKyc::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserKyc $userKyc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $userKyc = UserKyc::find($request->id);

            $userKyc->update([
                'verified_on' => date('Y-m-d')
            ]);
        } catch (\Throwable $th) {
            return back();
        }

        return redirect()->route('kyc.all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            UserKyc::destroy($request->id);
            return redirect()->route('kyc.all');
        } catch (\Throwable $th) {
            return back();
        }
        
    }
}
