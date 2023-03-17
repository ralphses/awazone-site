<?php

namespace App\Models\utils;

class Utility {

    public const CARD_TYPE = [
        'VISA',
        'MASTER CARD',
        'OTHERS',
        'VERVE'
    ];

    public const AIBOPAY_ACCOUNT_STATUS = [
        'active' => 'ACTIVATED',
        'frozen' => 'FROZEN',
        'inactive' => 'INACTIVE',
        'suspended' => 'SUSPENDED'
    ];

    public const USER_AUTHORITIES = [
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

    public const AIBOPAY_ACCOUNT_TYPE = [
        'savings' => 'Savings',
        'current' => 'Current',
    ];



    public const KYC_DOC_TYPE = [
        'nin' => 'National Identity Card',
        'pvc' => "Permanent Voter's Card",
        'drive' => 'Driver Licence',
        'passport' => 'International Passport',
        'others' => 'Others'

    ];

    public const TRANSACTION_STATUS = [
        'COMPLETED' => 0,
        'DECLINED' => -2,
        'PAID' => 1,
        'OVERPAID' => 2,
        'PARTIALLY_PAID' => 3,
        'PENDING' => -1,
        'ABANDONED' => -2,
        'CANCELLED' => -3,
        'FAILED' => -4,
        'REVERSED' => -5,
        'EXPIRED' => -6,
    ];

    public const SUPPORT_TICKET_STATUS = [
        'open' => 'OPEN',
        'closed' => 'CLOSED',
        'suspended' => 'SUSPENDED'
    ];

}