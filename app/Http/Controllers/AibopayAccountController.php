<?php

namespace App\Http\Controllers;

use App\Models\AibopayAccount;
use App\Models\monnify\MonnifyCredentials;
use App\Models\MonnifyAccount;
use App\Models\utils\RequestSender;
use App\Models\utils\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AibopayAccountController extends Controller
{

     /**
     * Create an aibopay module for this user.
     */
    public function initAibopay(Request $request) {

        if($request->user()->aibopayAccounts->count() > 0) {
            return redirect()->route('aibopay.dashboard');
        }

        /**
         * Todo:
         * 1. Create Monnify Account
         * 2. Create one Aibopay Account 
         * 3. Redirect to Aibopay Dashboard
         */

         //Create Monnify Account 
         $createAccountResponse = RequestSender::sendRequest(

            ['Authorization' => MonnifyCredentials::BEARER_AUTHORIZATION_PREFIX . Storage::disk('local')->get('token.txt')],
            
            env('MONNIFY_BASE_URL') . MonnifyCredentials::CREATE_VIRTUAL_ACCOUNT,
            
            [
                "accountReference" => Auth::user()->username,
                "accountName" => Auth::user()->name,
                "currencyCode" => MonnifyCredentials::NGN_CURRENCY_CODE,
                "contractCode" => MonnifyCredentials::CONTRACT_CODE,
                "customerEmail" => Auth::user()->email,
                "bvn" => $request->get('bvn'),
                "customerName" => Auth::user()->name,
                "getAllAvailableBanks" => false,
                "preferredBanks" => [MonnifyCredentials::WEMA_BANK_CODE]
            ],

            "POST"
        );

        // dd($createAccountResponse);

        if($createAccountResponse->successful() AND $createAccountResponse->status() === 200) {

            //Create new monnify account resource
            MonnifyAccount::create(
                [
                    'customerName' => $createAccountResponse->json('responseBody')['customerName'],
                    'accountNumber' => $createAccountResponse->json('responseBody')['accounts'][0]['accountNumber'],
                    'user_id' => Auth::user()->id,
                    'currency' => MonnifyCredentials::NGN_CURRENCY_CODE,
                    'bank' => $createAccountResponse->json('responseBody')['accounts'][0]['bankName'],
                    'reference' => $createAccountResponse->json('responseBody')['accountReference'],
                    'bvn' => $createAccountResponse->json('responseBody')['bvn'],
                ]
            );

            //Create new Aibopay Account for user
            AibopayAccount::create(
                [
                    'user_id' => Auth::user()->id,
                    'accountName' => Auth::user()->name,
                    'currency' => MonnifyCredentials::NGN_CURRENCY_CODE,
                    'accountNumber' => $this->generateAccountNumber($request),
                    'accountType' => Utility::AIBOPAY_ACCOUNT_TYPE['savings'],
                ]
            );

            return redirect()->route('aibopay.dashboard');
        }
        else {
            return back()->with('error', 'Unable to create Account, try again later');
        }

    }
    
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

    private function generateAccountNumber(Request $request): string
    {
        $userPhoneContact = $request->user()->address->phone;
        return substr($userPhoneContact, ( strlen($userPhoneContact) - 10), strlen($userPhoneContact));
        
    }
}
