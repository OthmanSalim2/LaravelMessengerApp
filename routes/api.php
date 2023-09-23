<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessagesController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(
//     [
//         'middleware' => ['auth:sanctum'],
//     ],
//     function () {
Route::get('conversations', [ConversationController::class, 'index']);
Route::get('conversations/{conversation}', [ConversationController::class, 'show']);
Route::post('conversations/{conversation}/participants', [ConversationController::class, 'addParticipant']);
Route::delete('conversations/{conversation}/participants', [ConversationController::class, 'removeParticipant']);

Route::get('conversations/{id}/messages', [MessagesController::class, 'index']);
Route::post('messages', [MessagesController::class, 'store']);
Route::delete('messages/{id}', [MessagesController::class, 'destroy']);
//     }
// );
