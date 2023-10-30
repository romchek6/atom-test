<?php

namespace App\Service;

use App\Models\Coin;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class CoinService
{
    public static function saveCoins(): void
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/map';
        $apiKey = Env::get('API_KEY');

        $response = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => $apiKey,
        ])->get($url);

        $data = $response->json();
        $aCoins = $data['data'];

        $i = 0;
        foreach ($aCoins as $item) {

            $oCoin = Coin::query()->updateOrCreate(
                [
                    'slug' => $item['slug']
                ],
                [
                    'rank' => $item['rank'],
                    'name' => $item['name'],
                    'symbol' => $item['symbol'],
                    'is_active' => $item['is_active'],
                    'first_historical_data' => $item['first_historical_data'],
                    'last_historical_data' => $item['last_historical_data'],
                    'platform' => $item['platform'] ? json_encode($item['platform']) : null
                ]
            );

            if ($oCoin->wasRecentlyCreated) $i++;
            if ($i == 100) break;
        }
    }
}
