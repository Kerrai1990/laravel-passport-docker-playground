<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {

    $query = http_build_query([
        'client_id' => 2, // CHANGE ME FOR NEW ID IN DB
        'redirect_url' => 'http://localhost:8081/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('http://localhost:8080/oauth/authorize?' . $query);
});

Route::get('/callback', function (Request $request) {

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://api-web:80/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 2, // CHANGE ME FOR NEW ID
            'client_secret' => "sX8I34rspqjfe2a99BTEGdLaCGHNY6mzMJtPd2d2", //CHANGE ME WITH NEW DB ENTRY
            'redirect_uri' => 'http://frontend-web:81/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string)$response->getBody(), true);
});
