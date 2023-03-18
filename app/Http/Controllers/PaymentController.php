<?php

namespace App\Http\Controllers;

use App\Models\monnify\MonnifyCredentials;
use App\Models\utils\RequestSender;
use App\Models\utils\UssdTemplate;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function transfer(Request $request) {

        return view('dashboard.aibopay.transactions.add-money.transfer', ['monnifyAccount' => $request->user()->monnifyAccount]);
    }

    public function ussd(Request $request) {

        //Send request to get all banks and their USSD codes
        $getBanksRequest = RequestSender::sendRequest(
            MonnifyCredentials::authorizationHeader(),
            env('MONNIFY_BASE_URL') . MonnifyCredentials::GET_BANKS_URL,
            [],
            "GET"
        );

       if($getBanksRequest AND $getBanksRequest->successful() AND $getBanksRequest->status() === 200) {

            $ussds = $getBanksRequest->json()['responseBody'];

            $ussds = $this->buildUssds($request, $ussds);

            // dd($ussds);

            return view('dashboard.aibopay.transactions.add-money.ussd', ['ussds' => $ussds]);

       }
       else {
            return redirect()->route('aibopay.dashboard')->with('error', "Oops! something when wrong, Try again later");
       }
    }

    private function buildUssds(Request $request, array $ussds) {

        return array_map(function($value) use ($request) {

            $accountNumber = $request->user()->monnifyAccount->accountNumber;

            $bankName = $value['name'];
            $ussdCode = str_replace('AccountNumber', $accountNumber, $value['ussdTemplate']);

            return new UssdTemplate($bankName, $ussdCode);

        }, $ussds);
    }
    
}
