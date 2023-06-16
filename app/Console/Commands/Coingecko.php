<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Coingecko extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:coingecko';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch coingecko info and store in database';

    //api call to store coingecko info.
    public function handle()
    {
        $response = Http::post(config('app.url') . '/api/store-coingeckoinfo');
    }
}
