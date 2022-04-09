<?php

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('ping', function(){
    return api_success('OK OK');
});
Route::prefix('v1')->middleware('api')->group(function () {
    Route::get('firebase', [FirebaseController::class, 'index'])->name('firebase.get');
    Route::post('firebase', [FirebaseController::class, 'create'])->name('firebase.create');
    Route::post('/save-token', [FirebaseController::class, 'saveToken'])->name('save-token');
    Route::post('/send-notification', [FirebaseController::class, 'sendNotification'])->name('send.notification');
});
