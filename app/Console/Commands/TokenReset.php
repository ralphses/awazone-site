<?php

namespace App\Console\Commands;

use App\Models\monnify\MonnifyConfig;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TokenReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Storage::disk('local')
            ->put('token.txt', MonnifyConfig::getAccessToken());
        
        return Command::SUCCESS;
    }
}
