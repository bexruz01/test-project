<?php
use App\Http\Controllers\BrandController;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/brands', [BrandController::class, 'index'])->name('brands');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'person', 'namespace' => 'Person', 'as' => 'person.'], function () {
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', 'OrderController@index')->name('home');
            Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
        });
        Route::resource('categories', 'CategoryController');
        Route::resource('sub_catalogs', 'SubCatalogController');
        Route::resource('catalogs', 'CatalogController');
        Route::resource('product_brands', 'ProductBrandController');
        Route::resource('products', 'ProductController');
        Route::resource('products/{product}/skus', 'SkuController');
        Route::resource('properties', 'PropertyController');
        Route::resource('properties/{property}/property-options', 'PropertyOptionController');
    });
});


Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{skus}', 'BasketController@basketAdd')->name('basket-add');
    Route::group(['middleware' => 'basket_not_empty'], function () {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/remove/{skus}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
    });
});
Route::get('/{category}/{product}/{skus}', 'MainController@sku')->name('sku');
Route::get('/brand/{brand}', [BrandController::class, 'brand'])->name('brand');
Route::get('/{category}', 'MainController@category')->name('category');
