<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $currencies = Currency::paginate(10);
        $pages = $currencies->getUrlRange(1, $currencies->lastPage());

        return view('dashboard.currency.all', ['currencies' => $currencies, 'pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.currency.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_name' => ['required', Rule::unique('currencies', 'name')],
            'currency_code' => ['required', Rule::unique('currencies', 'name')]
        ]);


        try {

            Currency::create([
                'name' => $request->get('currency_name'),
                'code' => $request->get('currency_code'),
                'added_by' => Auth::user()->name
            ]);

            return redirect()->route('currency.all');
            
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Currency::destroy($request->id);
            return redirect()->route('currency.all');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
