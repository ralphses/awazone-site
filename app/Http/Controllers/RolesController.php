<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\utils\Utility;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::paginate(10);
        $pages = $roles->getUrlRange(1, $roles->lastPage());

        return view('dashboard.users.roles.all', ['pages' => $pages, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.roles.add', ['abilities' => Utility::USER_AUTHORITIES]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required', Rule::unique('roles', 'name')],
            'authorities' => ['required']
        ]);

        Roles::create([
            'name' => $request->get('role_name'),
            'description' => $request->get('role_description'),
            'token' => uniqid(),
            'authorities' => implode('|', $request->get('authorities'))
        ]);

        return redirect()->route('roles.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $role = Roles::find($request->id);
            return view('dashboard.users.roles.show-role', ['role' => $role, 'userauthorities' => explode('|', $role->authorities), 'allauthorities' => Utility::USER_AUTHORITIES]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'role_name' => ['required', Rule::unique('roles', 'name')->ignore($request->id)],
            'authorities' => ['required']
        ]);

        try {
            $role = Roles::find($request->id);

            $role->update([
                'name' => $request->get('role_name'),
                'description' => $request->get('role_description'),
                'token' => uniqid(),
                'authorities' => implode('|', $request->get('authorities'))
            ]);
    
            return redirect()->route('roles.all');

        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Roles::destroy($request->id);
            return redirect()->route('roles.all');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
