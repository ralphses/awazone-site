<?php

namespace App\Models\utils;

class Utility {

    public const USER_ABILITIES = [
        'authority' => [
            'authority_view',
            'authority_create',
            'authority_update',
        ],
        'user' => [
            'user_view',
            'user_delete',
            'user_edit'
        ],
        'kyc' => [
            'kyc_view',
            'kyc_edit',
        ],
        'aibopayAccount' => [
            'aibopayAccount_view',
            'aibopayAccount_delete:any',
            'aibopayAccount_bvn:update',
            'aibopayAccount_bvn:approve',
            'aibopayAccount_bvn:reject',
            'aibopayAccount_suspend:any'
        ],
        'transaction' => [
            'transaction_view',
            'transaction_delete',
            'transaction_edit',
        ],
        'card' => [
            'card_view',
            'card_delete',
            'card_edit',
        ],
        'exchangeRate' => [
            'exchangeRate_view',
            'exchangeRate_delete',
            'exchangeRate_edit',
            'exchangeRate_create'
        ],
        'currency' => [
            'currency_view',
            'currency_delete',
            'currency_edit',
            'currency_create',
        ]
    ];
}