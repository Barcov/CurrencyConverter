<?php

use App\Http\Clients\FixerIo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get( '/exchange-rates/', function() {
    $response = [
        [
            'id' => 1,
            'EUR' => 1,
            'USD' => 1.08,
            'ZAR' => 20.0,
            'date' => '2021-01-01',
            'time' => '12:00:00',
        ],
        [
            'id' => 2,
            'EUR' => 1,
            'USD' => 1.08,
            'ZAR' => 20.0,
            'date' => '2021-01-01',
            'time' => '12:00:00',
        ],
        [
            'id' => 3,
            'EUR' => 1,
            'USD' => 1.08,
            'ZAR' => 20.0,
            'date' => '2021-01-01',
            'time' => '12:00:00',
        ]

    ];
    return response()->json( $response, 200 );
} );
