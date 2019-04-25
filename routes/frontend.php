<?php


Route::get('cart','cartController@index');
Route::get('cart/add/{id}','cartController@addItem');
Route::get('cart/remove/{id}', 'cartController@removeItem');
Route::get('cart/update/','cartController@update');

Route::get('/', 'FrontController@index');
Route::get('/contact', 'FrontController@contact');
Route::get('/produits', 'FrontController@allproducts');

// Route::get('/cart/{slug} ', 'FrontController@cart');


Route::get('/produits/{cat_id}', 'FrontController@cat');
Route::get('/produits/{catByUser}/{prod_slug}', 'FrontController@produitDetail');