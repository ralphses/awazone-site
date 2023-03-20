<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\utils\Utility;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Tester\Constraint\CommandIsSuccessful;

class AdminInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $userRole = Roles::where('name', 'Super Admin')->get();
        
        if($userRole->count() < 1) {

            $authorities = Utility::USER_AUTHORITIES;

            $allAuthorities = $this->createAdminAuthurities($authorities);
            $mainCurrency = Currency::where('code', 'NGN')->get()->first() ?? Currency::create(['name' => 'Nigerian Naira', 'code' => "NGN", 'added_by' => 'Admin']);
            
            $userRole = Roles::create([
                'name' => 'Super Admin', 
                'token' => uniqid(),
                'description' => 'Overall Admin of this application',
                'authorities' => $allAuthorities
            ]);

    
            $user = User::create([
                'name' => str_replace('|', ' ', env('APP_ADMIN_NAME')),
                'email' => env('APP_ADMIN_EMAIL'),
                'password' => Hash::make(env('APP_ADMIN_PASSWORD')),
                'roles_id' => $userRole->id,
                'main_currency' => $mainCurrency->id
            ]);

            UserAddress::create(['user_id' => $user->id]);
    
            event(new Registered($user));
        }

    }

    private function createAdminAuthurities(array $authorities) {

        $allAuthorities = "";

        foreach(array_values($authorities) as $key => $value) {
            
            $allAuthorities .= implode('|', $value) . "|";

        }

        return $allAuthorities;
    }
}
