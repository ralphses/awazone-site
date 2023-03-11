<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function transfer(Request $request) {

        return view('dashboard.aibopay.transactions.add-money.transfer', ['monnifyAccount' => $request->user()->monnifyAccount]);
    }
    
}
