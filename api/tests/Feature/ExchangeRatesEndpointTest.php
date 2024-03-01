<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ExchangeRatesEndpointTest extends TestCase {
    /**
     * A basic feature test example.
     */
    public function test_api_returns_json_exchange_rates(): void {
        $response = $this->getJson( '/api/v1/exchange-rates' );

        $response->assertStatus( 200 );

        $response
            ->assertJson( fn( AssertableJson $json ) => $json->has( 3 )
                ->first( fn( AssertableJson $json ) => $json->where( 'id', 1 )
                    ->where( 'EUR', 1 )
                    ->where( 'USD', 1.08 )
                    ->where( 'ZAR', 20 )
                    ->where( 'date', '2021-01-01' )
                    ->where( 'time', '12:00:00' )
                    ->etc()
                )
            );
    }
}
