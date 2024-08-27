<?php
// routes/api.php
use App\Http\Controllers\ExampleController;

// Route::get('/example', [ExampleController::class, 'index']);
Route::get('/example', function(){
    return 'example list';
});
Route::get('/test', function () {
    return response()->json(['message' => 'Test route working']);
});


Route::post('/example', [ExampleController::class, 'store']);
Route::get('/example/{id}', [ExampleController::class, 'show']);
Route::put('/example/{id}', [ExampleController::class, 'update']);
Route::delete('/example/{id}', [ExampleController::class, 'destroy']);
