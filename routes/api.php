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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Products Endpoint
Route::get('/product', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@fetchProductById');
Route::post('/product/create', 'ProductController@createProduct');
Route::put('/product/{id}', 'ProductController@updateProduct');
Route::delete('/product/{id}', 'ProductController@deleteProduct');

Route::get('/', 'TodoController@index');
Route::post('/', 'TodoController@insertTodo');
Route::get('/{id}', 'TodoController@viewTodoById');

