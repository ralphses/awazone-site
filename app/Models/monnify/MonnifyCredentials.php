<?php

namespace App\Models\monnify;

use Illuminate\Support\Facades\Storage;

class MonnifyCredentials {

    public const LOGIN_URL = "/api/v1/auth/login";
    public const CREATE_VIRTUAL_ACCOUNT = "/api/v2/bank-transfer/reserved-accounts";
    public const DELETE_VIRTUAL_ACCOUNT = "/api/v1/bank-transfer/reserved-accounts/reference/";
    public const PAYMENT_INIT = "/api/v1/merchant/transactions/init-transaction";
    public const TRANSACTION_STATUS = "/api/v2/transactions/";
    public const PAY_WITH_CARD = "/api/v1/merchant/cards/charge";
    public const AUTHORIZE_OTP = "/api/v1/merchant/cards/otp/authorize";
    public const GET_BANKS_URL = "/api/v1/sdk/transactions/banks";
    public const VALIDATE_ACCOUNT = "/api/v1/disbursements/account/validate?";

    /**
     * Monnify constants
     */
    public const BASIC_AUTHORIZATION_PREFIX = "Basic ";
    public const BEARER_AUTHORIZATION_PREFIX = "Bearer ";
    public const CONTRACT_CODE = "0840919684";
    public const NGN_CURRENCY_CODE = "NGN";
    public const WEMA_BANK_CODE = "035";

    public static function authorizationHeader() {
        return ['Authorization' => MonnifyCredentials::BEARER_AUTHORIZATION_PREFIX . Storage::disk('local')->get('token.txt')];
    }

}
