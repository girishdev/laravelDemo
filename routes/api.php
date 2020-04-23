<?php

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::middleware('auth:api')->group( function () {
    Route::resource('employee', 'API\EmployeesController');
});

/*

127.0.0.1:8000/auth/login
127.0.0.1:8000/auth/logout

GET - 127.0.0.1:8000/api/employees (Show products)
POST - 127.0.0.1:8000/api/employee/create => Register/Create Product
127.0.0.1:8000/api/employee/create =>

*/

Route::middleware('auth:api')->group( function () {
    Route::resource('employeewebhistory', 'API\EmployeeWebHistoryController');
});
