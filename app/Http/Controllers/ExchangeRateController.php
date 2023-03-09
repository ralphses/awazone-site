<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = ExchangeRate::paginate(10);
        $pages = $rates->getUrlRange(1, $rates->lastPage());

        return view('dashboard.exchange-rate.all', ['pages' => $pages, 'rates' => $rates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::all();
        return view('dashboard.exchange-rate.add', ['currencies' => $currencies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_currency' => ['required', Rule::exists('currencies', 'id')],
            'second_currency' => ['required', Rule::exists('currencies', 'id')],
            'currency_rate' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
        ]);

       try {

            $first = $request->get('first_currency');
            $second = $request->get('second_currency');
            $rate = $request->get('currency_rate');

            ExchangeRate::create([
                'name' => Currency::find($first)->code . " - " . Currency::find($second)->code,
                'first' => $first,
                'second' => $second,
                'rate' => $rate,
                'first_to_second' => $rate,
                'second_to_first' => round(1/doubleval($rate), 5),
                'added_by' => Auth::user()->id
            ]);

            return redirect()->route('exchange.all');

       } catch (\Throwable $th) {

        return back();
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExchangeRate $exchangeRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExchangeRate $exchangeRate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExchangeRate $exchangeRate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            ExchangeRate::destroy($request->id);

            return redirect()->route('exchange.all');
        } catch (\Throwable $th) {
            return back();
        }
    }
}
