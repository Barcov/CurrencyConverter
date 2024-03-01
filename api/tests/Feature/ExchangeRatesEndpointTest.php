<?php

namespace Tests\Feature;

use App\Http\Clients\FixerIo;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ExchangeRatesEndpointTest extends TestCase {
    /**
     * A basic feature test example.
     */
    public function test_api_returns_json_exchange_rates(): void {

        config( [ 'services.fixerio.api_key' => 'test' ] );

        $body = file_get_contents( base_path( 'tests/Fixtures/fixerio_usd_zar_eur_response.json' ) );

        Http::fake( [
            FixerIo::baseUrl . '*' => Http::response( $body, 200 ),
        ] );

        $response = $this->getJson( '/api/v1/exchange-rates' );

        $response->assertStatus( 200 );

        $response
            ->assertJson( fn( AssertableJson $json ) => $json->where( 'EUR', 1 )
                ->where( 'USD', 1.080106 )
                ->where( 'ZAR', 20.756177 )
                ->etc()
            );
    }
}
