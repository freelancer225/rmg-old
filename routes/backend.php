<?php

Route::get('/', 'BackController@index');

Route::get('/settings', 'BackController@settings');

Route::get('produit/produits_data', 'BackController@fetch_data');

Route::get('categorie/categories_data', 'BackController@fetchCat_data');

Route::resource('otherUser', 'OtherUserController');

Route::resource('categorie', 'CategoriesController');

Route::resource('produit', 'ProduitsController');

// Route::get('produit', 'ProduitsController@index');
// Route::get('produit/{id}/edit', 'ProduitsController@edit');