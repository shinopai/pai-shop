<?php
// root
Route::get('/', 'ItemsController@index')->name('items.index');

// auth user
Auth::routes();

// admin user
Route::prefix('admin')->group(function(){
    Route::resource('categories', CategoriesController::class, ['only' => ['create', 'store']]);
});

// items
Route::resource('items', ItemsController::class, ['except' => ['index']]);
Route::post('/items/{item}/add_cart', 'ItemsController@addCart')->name('items.addcart');
Route::delete('/items/{item}/remove_item', 'ItemsController@removeItem')->name('items.removeitem');

// carts
Route::get('/carts', 'CartsController@index')->name('carts.index');

// orders
Route::get('/thanks', 'OrdersController@showThanks')->name('orders.thanks');
Route::post('/orders', 'OrdersController@buyItem')->name('orders.buyitem');
