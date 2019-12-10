<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function(){
    return redirect(route('login'));
});

Route::group(['prefix' => 'admin', 'middleware' => ['get.menu'], 'as' => 'admin.', 'namespace' => 'admin'], function () {
    Route::get('/', [
        'as' => 'admin.home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('/typography', function () { return view('coreui.typography'); });
    Route::get('/charts', function () {     return view('coreui.charts'); });
    Route::get('/widgets', function () {    return view('coreui.widgets'); });
    Route::get('/404', function () {        return view('coreui.404'); });
    Route::get('/500', function () {        return view('coreui.500'); });
    
    // custom routes
    //----------- DEMANDS ------------//
    Route::get('demands', [
        'as' => 'demands.index',
        'uses' => 'DemandController@index',
    ]);
    Route::get('demands/show/{demand}', [
        'as' => 'demands.show',
        'uses' => 'DemandController@show',
    ]);
    Route::post('demands/store', [
        'as' => 'demands.store',
        'uses' => 'DemandController@store',
    ]);
    Route::put('demands/{demand}', [
        'as' => 'demands.update',
        'uses' => 'DemandController@update',
    ]);
    Route::patch('demands/{demand}', [
        'as' => 'demands.update',
        'uses' => 'DemandController@update',
    ]);
    Route::delete('demands/{demand}', [
        'as' => 'demands.destroy',
        'uses' => 'DemandController@destroy',
    ]);

    //----------- SALES ------------//
    Route::get('sales_price', [
        'as' => 'sales_price.index',
        'uses' => 'SalePriceController@index',
    ]);
    Route::get('sales_price/show/{sale_price}', [
        'as' => 'sales_price.show',
        'uses' => 'SalePriceController@show',
    ]);
    Route::post('sales_price/store', [
        'as' => 'sales_price.store',
        'uses' => 'SalePriceController@store',
    ]);
    Route::put('sales_price/{sale_price}', [
        'as' => 'sales_price.update',
        'uses' => 'SalePriceController@update',
    ]);
    Route::patch('sales_price/{sale_price}', [
        'as' => 'sales_price.update',
        'uses' => 'SalePriceController@update',
    ]);
    Route::delete('sales_price/{sale_price}', [
        'as' => 'sales_price.destroy',
        'uses' => 'SalePriceController@destroy',
    ]);

    //----------- PURCHASE ------------//
    Route::get('purchases_price', [
        'as' => 'purchases_price.index',
        'uses' => 'PurchasePriceController@index',
    ]);
    Route::get('purchases_price/show/{purchase_price}', [
        'as' => 'purchases_price.show',
        'uses' => 'PurchasePriceController@show',
    ]);
    Route::post('purchases_price/store', [
        'as' => 'purchases_price.store',
        'uses' => 'PurchasePriceController@store',
    ]);
    Route::put('purchases_price/{purchase_price}', [
        'as' => 'purchases_price.update',
        'uses' => 'PurchasePriceController@update',
    ]);
    Route::patch('purchases_price/{purchase_price}', [
        'as' => 'purchases_price.update',
        'uses' => 'PurchasePriceController@update',
    ]);
    Route::delete('purchases_price/{purchase_price}', [
        'as' => 'purchases_price.destroy',
        'uses' => 'PurchasePriceController@destroy',
    ]);

    
    //----------- Simulation ------------//
    Route::get('simulation', [
        'as' => 'simulation.index',
        'uses' => 'SimulationController@index',
    ]);

    // end custom routes

    Route::prefix('base')->group(function () {  
        Route::get('/breadcrumb', function(){   return view('coreui.base.breadcrumb'); });
        Route::get('/cards', function(){        return view('coreui.base.cards'); });
        Route::get('/carousel', function(){     return view('coreui.base.carousel'); });
        Route::get('/collapse', function(){     return view('coreui.base.collapse'); });

        Route::get('/forms', function(){        return view('coreui.base.forms'); });
        Route::get('/jumbotron', function(){    return view('coreui.base.jumbotron'); });
        Route::get('/list-group', function(){   return view('coreui.base.list-group'); });
        Route::get('/navs', function(){         return view('coreui.base.navs'); });

        Route::get('/pagination', function(){   return view('coreui.base.pagination'); });
        Route::get('/popovers', function(){     return view('coreui.base.popovers'); });
        Route::get('/progress', function(){     return view('coreui.base.progress'); });
        Route::get('/scrollspy', function(){    return view('coreui.base.scrollspy'); });

        Route::get('/switches', function(){     return view('coreui.base.switches'); });
        Route::get('/tables', function () {     return view('coreui.base.tables'); });
        Route::get('/tabs', function () {       return view('coreui.base.tabs'); });
        Route::get('/tooltips', function () {   return view('coreui.base.tooltips'); });
    });
    Route::prefix('buttons')->group(function () {  
        Route::get('/buttons', function(){          return view('coreui.buttons.buttons'); });
        Route::get('/button-group', function(){     return view('coreui.buttons.button-group'); });
        Route::get('/dropdowns', function(){        return view('coreui.buttons.dropdowns'); });
        Route::get('/brand-buttons', function(){    return view('coreui.buttons.brand-buttons'); });
    });
    Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
        Route::get('/coreui-icons', function(){         return view('coreui.icons.coreui-icons'); });
        Route::get('/flags', function(){                return view('coreui.icons.flags'); });
        Route::get('/brands', function(){               return view('coreui.icons.brands'); });
    });
    Route::prefix('notifications')->group(function () {  
        Route::get('/alerts', function(){   return view('coreui.notifications.alerts'); });
        Route::get('/badge', function(){    return view('coreui.notifications.badge'); });
        Route::get('/modals', function(){   return view('coreui.notifications.modals'); });
    });

    Route::resource('users', 'UsersController')->except( ['create', 'store'] );

    Route::resource('notes', 'NotesController');

    Route::get('menu', 'MenuController@index');
    Route::get('menu/selected', 'MenuController@menuSelected')->name('menu.selected');
    Route::get('menu/selected/switch', 'MenuController@switch');
});