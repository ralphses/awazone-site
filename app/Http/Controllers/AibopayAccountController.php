<?php

namespace App\Http\Controllers;

use App\Models\AibopayAccount;
use Illuminate\Http\Request;

class AibopayAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = AibopayAccount::paginate(10);
        $pages = $accounts->getUrlRange(1, $accounts->lastPage());

        // return view('')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AibopayAccount $aibopayAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AibopayAccount $aibopayAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AibopayAccount $aibopayAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AibopayAccount $aibopayAccount)
    {
        //
    }
}
