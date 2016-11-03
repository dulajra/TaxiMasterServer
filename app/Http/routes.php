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

//Route::group(['middleware' => ['web']], function () {

Route::get('/push', 'TestController@push');

Route::get('/test', function () {
    return 'Test';
});

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->userLevel->id == 4) {
            // Normal user
            return view('customer.mainlayout');
        } else {
            return redirect("/dashboard");
        }
    } else {
        return view('customer.mainlayout');
    }
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect("/dashboard");
    } else {
        return View::make('login');
    }
});

Route::get('/dashboard', function () {
    if (Auth::check()) {
        return View::make('admin.dashboard');
    } else {
        return redirect("/login");
    }
});

Route::get('/newhire', function () {
    if (Auth::check()) {
        return View::make('newhire');
    } else {
        return redirect("/login");
    }
});

Route::get('/ongoingorders', function () {
    if (Auth::check()) {
        return View::make('ongoing-orders');
    } else {
        return redirect("/login");
    }
});

Route::get('/orderhistory', function () {
    if (Auth::check()) {
        return View::make('orderhistory');
    } else {
        return redirect("/login");
    }
});

Route::get('/accounts/view', function () {
    if (Auth::check()) {
        return View::make('admin.viewAccounts');
    } else {
        return redirect("/login");
    }
});

Route::get('/taxis/edit/{taxi}', function () {
    if (Auth::check()) {
        return View::make('edittaxi');
    } else {
        return redirect("/login");
    }
});

Route::post('/login', 'AuthController@loginWeb');
Route::get('/logout', 'AuthController@logoutWeb');

Route::get('/updates', 'WebController@getDriverUpdates');

Route::get('/neworder', 'OrderController@showNewOrderPage');
Route::get('/taxioperator/order/new', 'CustomerController@placeOrderByTaxiOperator');
Route::get('/taxioperator/order/state', 'OrderController@getOrderState');

Route::get('/accounts/delete/{id}', 'UserController@deleteUser');
Route::get('/accounts/view/{user}', 'UserController@showViewPage');
Route::get('/accounts/edit/{user}', 'UserController@showEditPage');
Route::post('/accounts/update/{user}', 'UserController@updateUser');
Route::get('/accounts/new', 'UserController@showNewUserPage');
Route::post('/accounts/new', 'UserController@createNewUser');

Route::get('/taxis/new', 'TaxiController@showNewTaxiPage');
Route::get('/taxis/view', 'TaxiController@showViewTaxisPage');
Route::get('/taxis/edit/{taxi}', 'TaxiController@showEditTaxisPage');
Route::post('/taxis/update/{taxi}', 'TaxiController@updateTaxi');
Route::post('/taxis/new', 'TaxiController@createNewTaxi');

Route::get('/ongoing-orders', 'OrderController@showOnGoingOrdersPage');
Route::get('/ongoing-orders/get', 'OrderController@getOngoingOrders');
Route::get('/finished-orders', 'OrderController@showFinishedOrdersPage');
Route::get('/finished-orders/get', 'OrderController@getFinishedOrders');
Route::post('/add-reviews', 'ReviewController@rateDriver');
Route::get('/view-reviews/{driver_id}', 'ReviewController@getDriverRatings');
Route::get('/view-reviews/getAllReviews', 'ReviewController@getAllReviews');
// customer routes
Route::get('/signup/', function () {
    return view('signup');
});
Route::post('/signup/', 'AuthController@signUp');
Route::get('/reviews', 'ReviewController@getReviews');
//});

Route::group(['middleware' => ['api']], function () {

    Route::get('/driver/orders', 'DriverController@getOrderList');
    Route::post('/driver/login', 'AuthController@loginDriver');
    Route::post('/driver/logout', 'AuthController@logoutDriver');
    Route::post('/driver/update/password', 'UserController@changePassword');
    Route::post('/driver/update/state', 'DriverController@updateState');
    Route::get('/driver/order/finish', 'DriverController@finishOrder');
    Route::post('/driver/update/location', 'DriverController@updateLocation');
    Route::get('/driver/order/respond', 'DriverController@respondToNewOrder');
    Route::post('/order/rate', 'CustomerController@saveReview');

    Route::post('/customer/login', 'AuthController@loginCustomer');
    Route::post('/customer/login', 'AuthController@loginCustomer');
    Route::post('/customer/signUp', 'UserController@signUpUser');
    Route::post('/customer/logout', 'AuthController@logoutCustomer');
    Route::get('/customer/taxis', 'CustomerController@getAvailableTaxis');
    Route::get('/customer/order/new', 'CustomerController@placeOrder');
    Route::get('/customer/get/driverUpdate', 'CustomerController@getDriverUpdate');
    Route::get('/customer/get/driverLocation', 'CustomerController@getDriverLocation');
    Route::get('/customer/orders', 'CustomerController@getOrdersList');

    Route::get('/offers', 'OffersController@getOffers');
    Route::get('/newoffer/', 'OffersController@newOfferView');
    Route::post('/newoffer/', 'OffersController@newOfferSave');
    Route::get('/offerhistory/', 'OffersController@offerHistory');

});