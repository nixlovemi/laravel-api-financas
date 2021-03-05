<?php
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::fallback(function ()
{
    $response = lpApiResponse(true, 'Rota não encontrada.');
    return response()->json($response, Response::HTTP_NOT_FOUND);
});

Route::post('login', 'AuthController@login');
Route::get('me', 'AuthController@me');
Route::post('logout', 'AuthController@logout');
Route::get('unauthenticated', 'AuthController@unauthenticated')->name('unauthenticated');