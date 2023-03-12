<?php

namespace App\Models\utils;

class UssdTemplate {

    private string $bank;
    private string $ussdCode;

    public function __construct(string $bank, string $ussdCode)
    {
        $this->bank = $bank;
        $this->ussdCode = $ussdCode;
    }

    public function getBank() {
        return $this->bank;
    }

    public function getUssd() {
        return $this->ussdCode;
    }

}