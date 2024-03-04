<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Cache;

class ExchangeRateController extends Controller {
    private static $dbCacheTTL = 0;

    public function __construct() {
        self::$dbCacheTTL = (int) config( 'services.fixerio.db_cache_ttl' );
    }

    /**
     * Display a listing of the resource.
     */
    public static function index() {
        if ( ExchangeRate::getShouldUpdate() ) {
            ExchangeRate::getLatestRates();
        }

        $exchangeRate = Cache::remember( 'exchange-rates:data', self::$dbCacheTTL, function() {
            return ExchangeRate::latest( 'created_at' )
                ->select( 'id', 'EUR', 'ZAR', 'USD', 'created_at' )
                ->first();
        } );

        return [
            'id' => $exchangeRate->id,
            'date' => $exchangeRate->created_at->format( 'Y-m-d' ),
            'time' => $exchangeRate->created_at->format( 'H:i:s' ),
            'values' => [
                'EUR' => $exchangeRate->EUR,
                'USD' => $exchangeRate->USD,
                'ZAR' => $exchangeRate->ZAR,
            ]
        ];
    }
}
