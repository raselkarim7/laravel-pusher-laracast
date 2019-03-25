<?php


class Order {
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/update', function () {
    \App\Events\OrderStatusUpdated::dispatch(new Order(777));
});


Route::get('/tasks', function (){
   return \App\Task::latest()->pluck('body');
});

Route::post('/tasks', function (){
    dd(request(['body']));
    \App\Task::forceCreate(request(['body']));
});
















//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/one', 'HomeController@one');
//Route::get('/send-notification', 'PusherNotificationController@sendNotification');


//Route::get('/event', function () {
//    $order = new \App\Order();
//    $order->message = 'Love of my life - Queen.';
//    event(new \App\Events\OrderShipped($order));
//});