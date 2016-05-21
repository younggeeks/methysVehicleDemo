<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//these are protected routes, Logged In user can access them

Route::group(['middleware' => 'auth'], function () {


    Route::get('/', "VehiclesController@home");

    Route::controllers([
        "vehicle"=>"VehiclesController",
        "owners"=>"OwnersController"
    ]);

    Route::get('/home', 'HomeController@index');

});


Route::group([
    "prefix"=>"api/v1",
    "middleware"=>['jwt.auth']
],function(){

    Route::resource("vehicle","VehicleApiController");

});


Route::get("getToken",function(){
    try {
        // verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt([
            "email"=>"samjunior@kiu.ac.tz",
            "password"=>"secret"
        ])) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        // something went wrong
        return response()->json(['error' => 'could_not_create_token'], 500);
    }

    // if no errors are encountered we can return a JWT
    return response()->json(compact('token'));
});









Route::auth();


