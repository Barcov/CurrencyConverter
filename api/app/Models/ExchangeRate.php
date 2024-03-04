<?php

namespace App\Models;

use App\Http\Clients\FixerIo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ExchangeRate extends Model {
    use HasFactory;

    private static mixed $apiCacheTTL = 0;
    public $timestamps = true;
    protected $dates = [ 'created_at', 'updated_at' ];
    protected $fillable = [
        'EUR',
        'USD',
        'ZAR'
    ];

    public function __construct( array $attributes = [] ) {
        parent::__construct( $attributes );
        self::$apiCacheTTL = (int) config( 'services.fixerio.api_cache_ttl' );
    }

    public static function getLatestRates() {
        $data = FixerIo::getExchangeRates();

        if ( ! $data ) {
            return;
        }

        self::create( $data );

        ExchangeRate::setShouldUpdate();
    }

    public static function setShouldUpdate() {
        Cache::add( 'exchange-rates:should-update-api', false, self::$apiCacheTTL );
    }

    public static function getShouldUpdate(): bool {
        return Cache::get( 'exchange-rates:should-update-api' ) ?? true;
    }

}
