<?php

namespace Tests\Feature;

use App\Http\Clients\FixerIo;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FixerIoClientTest extends TestCase {

    public function test_example(): void {
        config( [ 'services.fixerio.api_key' => 'test' ] );

        $body = file_get_contents( base_path( 'tests/Fixtures/fixerio_usd_zar_eur_response.json' ) );

        Http::fake( [
            FixerIo::baseUrl . '*' => Http::response( $body, 200 ),
        ] );

        $response = FixerIo::getExchangeRates();

        $expected_result = [
            'USD' => 1.080106,
            'EUR' => 1,
            'ZAR' => 20.756177,
        ];

        $this->assertEquals( $expected_result, $response );

    }

}
