<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referred_by',
        'address_id',
        'username',
        'date_of_birth',
        'image_path',
        'referral_code',
        'roles_id',
        'main_currency',
        'is_locked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsTo(Roles::class);
    }

    public function address() {
        return $this->hasOne(UserAddress::class);
    }

    public function userKyc() {
        return $this->hasOne(UserKyc::class);
    }

    public function monnifyAccount(): HasOne
    {
        return $this->hasOne(MonnifyAccount::class);
    }

    public function aibopayAccounts(): HasMany
    {
        return $this->hasMany(AibopayAccount::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function exchangeRates(): HasMany
    {
        return $this->hasMany(ExchangeRate::class, 'added_by');
    }

    public function currencies() {
        return $this->hasMany(Currency::class, 'added_by');
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function supportTickets() {
        return $this->hasMany(SupportTicket::class);
    }

}
