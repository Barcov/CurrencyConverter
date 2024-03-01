<?php

namespace App\Http\Clients;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FixerIo {
    public const baseUrl = 'http://data.fixer.io/api';

    public static function getExchangeRates( array $currencies = [ 'USD', 'EUR', 'ZAR' ] ): array {
        $symbols = implode( ',', $currencies );

        try {
            $response = Http::accept( 'application/json' )
                ->get( self::baseUrl . '/latest', [
                    'access_key' => config( 'services.fixerio.api_key' ),
                    'symbols' => $symbols,
                    'format' => 1
                ] );
            $json = $response?->json();
        } catch ( Exception $e ) {
            Log::warning( "FixerIo: Failed to update exchange rates - $e" );
        }

        if ( empty( $json ) || self::handleErrors( $json ) ) {
            return [];
        }

        return [
            'EUR' => 1,
            'USD' => $json['rates']['USD'],
            'ZAR' => $json['rates']['ZAR'],
        ];
    }

    /**
     * @param $json
     *
     * @return bool true api returned errors.
     */
    private static function handleErrors( $json ): bool {
        if ( $json['success'] === true && ! isset( $json['error'] ) ) {
            return false;
        }

        $errorCode = $json['error']['code'] ?? '';
        $errorInfo = $json['error']['info'] ?? '';

        Log::warning( "FixerIo: Failed to update exchange rates - $errorCode $errorInfo" );
        return true;
    }
}
















