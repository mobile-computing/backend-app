<?php

use Illuminate\Http\Request;

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

Route::get('/map/download', function (Request $request) {
    $buildingId = request('building-id', null);
    if (empty($buildingId)) {
        return response()->json([
            'code' => 400,
            'message' => 'Bad request',
        ], 400);
    }
    $building = \App\Building::find($buildingId);
    if ($building->count()) {
        return response()->json($building->toJson(), 200);
    } else {
        return response()->json([
            'code' => 1,
            'message' => 'Nonexistent building',
        ], 404);
    }
});
