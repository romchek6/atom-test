<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Service\CoinService;
use Illuminate\View\View;

class CoinController extends Controller
{
    public function getCoins(): void
    {
        CoinService::saveCoins();
    }

    public function index(): View
    {
        $oCoins = Coin::query()->paginate(100);

        return view('coins', compact('oCoins'));

    }

}
