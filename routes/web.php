<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\View;
use App\Models\Admin;
use App\Models\Hotel;
use App\Models\Message;
use App\Models\Conversation;

View::composer(['*'], function ($view) {

    $adminI = Admin::where('id', Auth::guard('admin')->id())->first();

    $view->with('adminI', $adminI);
});

View::composer(['*'], function ($view) {

    $hotel = Hotel::all()->first();
    $view->with('hotel', $hotel);
});
View::composer(['*'], function ($view) {
    $conversation = Conversation::where('user_id', Auth::id())->first();
    if ($conversation == null) {
        $cMessage = 0;
        $view->with('cMessage', $cMessage);
    } else {
        $message = Message::all()->where('conversation_id', $conversation->id)
            ->where('owner_type', 'admin')->where('readCheck', '0');
        $cMessage = count($message);
        $view->with('cMessage', $cMessage);
    }
});

View::composer(['*'], function ($view) {
    $conversations = Conversation::all();
    $admincMessage = 0;


    if ($conversations == null) {
        $admincMessage = 0;
        $view->with('admincMessage', $admincMessage);
    } else {
        foreach ($conversations as $item) {
            if ($item->message != null) {
                foreach ($item->message as $item2) {
                    if ($item2->readCheck == 0 and $item2->owner_type == 'user') {
                        $admincMessage++;
                        break;
                    }
                }
            }
        }
        $view->with('admincMessage', $admincMessage);
    }
});

############ GROUB VARIABL############
$admin = [
    'prefix' => 'admin',
    'namespace' => 'admin',
    'middleware' => 'adminauth'
];
$adminstration = [
    'middleware' => ['adminstration'],
];
$user = [
    'prefix' => 'user',
    'namespace' => 'user',
    'middleware' => ['auth', 'active_user', 'visitor', 'profileAuth']
];
############ GROUB VARIABL ############


###### USER AUTH ######
Auth::routes(['verify' => true]);



############ ALL PUBLIC PAGES ############

###### WELCOME #######
Route::get('/', 'HotelController@welcome')->name('main.page');

###### CONTATC US in footer #######
Route::get('/contactUs', 'HotelController@contactUs')->name('contactUs');

##### GALLERY ######
Route::get('gallery/index', 'GalleryController@index')->name('gallery.indexx');

####### ROOMS ########
Route::get('room/index', 'RoomController@index')->name('room.index');
Route::get('room/filter', 'RoomController@filter')->name('room.filter');
Route::get('room/images/{id}', 'RoomController@showTypeImage')->name('room.images');

##### SERVICES #####
Route::get('service/index', 'ServiceController@index')->name('service.indexx');

###### MEMORIES ######
Route::get('post/index', 'user\PostController@index')->name('post.index');
###############Complite Account Info#############
Route::get('user/complite/account', 'user\UserProfileController@compliteAccountInfo')->middleware('auth')->name('user.complite.account');
Route::post('user/store/account/info', 'user\UserProfileController@storeAccountInfo')->middleware('auth')->name('user.store.account.info');


##############   User Pages   ###################
Route::group($user, function () {

    ###############All settings#############
    Route::get('edit/profile', 'UserProfileController@editProfile')->name('user.edit.profile');
    Route::post('update/profile', 'UserProfileController@updateProfile')->name('user.update.profile');
    Route::get('change/password', 'UserProfileController@changePassword')->name('user.change.password');
    Route::post('update/password', 'UserProfileController@UpdatePassword')->name('user.update.password');


    ###############posts#############
    Route::get('post/create', 'PostController@create')->name('user.post.create');
    Route::post('post/store', 'PostController@store')->name('user.post.store');
    Route::get('post/edit/{id}', 'PostController@edit')->name('user.post.edit');
    Route::post('post/update/{id}', 'PostController@update')->name('user.post.update');
    Route::get('post/destroy/{id}', 'PostController@destroy')->name('user.post.destroy');
    Route::get('show/memories', 'PostController@showMemories')->name('user.show.memories');
    Route::get('/like', 'PostController@like')->name('like');
    Route::get('/dislike', 'PostController@dislike')->name('dislike');


    ###############messages#############
    Route::get('conversation/store', 'ConversationController@store')->name('user.conversation.store');
    Route::get('conversation/show', 'ConversationController@show')->name('user.conversation.show');
    Route::post('message/store', 'MessageController@store')->name('user.message.store');
    Route::get('message/destroy/{id}', 'MessageController@destroy')->name('user.message.destroy');


    ###############reservations#############
    Route::get('reservation/destroy/{id}', 'ReservationController@destroy')->name('user.reservation.destroy');
    Route::get('room/reserve/{id}/{dates}', 'ReservationController@reserve')->name('user.room.reserve');
    Route::post('room/reserve/store/{dates}', 'ReservationController@storeReservation')->name('user.room.reserve.store');
    Route::get('booking/details', 'ReservationController@bookingDetails')->name('user.booking.details');
    Route::get('show/persons/details/{reservation_id}', 'ReservationController@personDetails')->name('user.show.persons.details');
});

Route::group($admin, function () {

    ###############messages#############
    Route::get('conversation/inbox', 'ConversationController@inbox')->name('admin.conversation.inbox');
    Route::get('conversation/show/{id}', 'ConversationController@show')->name('admin.conversation.show');
    Route::get('conversation/destroy/{id}', 'ConversationController@destroy')->name('admin.conversation.destroy');
    Route::post('message/store', 'MessageController@store')->name('admin.message.store');
    Route::post('message/storeNewChat', 'MessageController@storeNewChat')->name('admin.message.storeNewChat');
    Route::get('message/destroy/{id}', 'MessageController@destroy')->name('admin.message.destroy');

    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    #################posts######################
    Route::get('post/index', 'PostController@index')->name('admin.post.index');
    Route::get('post/show/{id}', 'PostController@show')->name('admin.post.show');
    Route::get('post/edit/{id}', 'PostController@edit')->name('admin.post.edit');
    Route::get('post/destroy/{id}', 'PostController@destroy')->name('admin.post.destroy');

    #################hotel######################
    Route::get('hotel/create', 'HotelController@create')->name('admin.hotel.create')->middleware('adminstration');
    Route::post('hotel/store', 'HotelController@store')->name('admin.hotel.store')->middleware('adminstration');
    Route::get('hotel/edit/{id}', 'HotelController@edit')->name('admin.hotel.edit')->middleware('adminstration');
    Route::post('hotel/update/{id}', 'HotelController@update')->name('admin.hotel.update')->middleware('adminstration');

    Route::get('hotel/indexHeader', 'HotelController@indexImageDescHeader')->name('admin.hotel.indexHeader')->middleware('adminstration');
    Route::get('hotel/createHeader', 'HotelController@createImageDescHeader')->name('admin.hotel.createHeader')->middleware('adminstration');
    Route::POST('hotel/storeHeader', 'HotelController@storeImageDescHeader')->name('admin.hotel.storeHeader')->middleware('adminstration');
    Route::get('/hotel/header/destroy/{id}', 'HotelController@destroy')->name('admin.hotel.destroy')->middleware('adminstration');
    #################contact######################
    Route::get('contact/index', 'ContactController@index')->name('admin.contact.index');
    Route::get('contact/create', 'ContactController@create')->name('admin.contact.create');
    Route::post('contact/store', 'ContactController@store')->name('admin.contact.store');
    Route::get('contact/edit/{id}', 'ContactController@edit')->name('admin.contact.edit');
    Route::post('contact/update/{id}', 'ContactController@update')->name('admin.contact.update');
    Route::get('contact/destroy/{id}', 'ContactController@destroy')->name('admin.contact.destroy');

    ########## gallery ##########
    Route::get('gallery', 'galleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'galleryController@create')->name('gallery.create');
    Route::POST('/gallery/store', 'galleryController@store')->name('gallery.store');
    Route::get('/gallery/destroy/{id}', 'galleryController@destroy')->name('gallery.destroy');
    Route::get('/gallery/hdelete/{id}', 'galleryController@hdelete')->name('gallery.hdelete');
    Route::get('/gallery/restore/{id}', 'galleryController@restore')->name('gallery.restore');

    ########## Services ##########
    Route::resource('service', ServiceController::class);

    ########## Rooms Type ##########
    Route::resource('rooms/type', RoomTypeController::class);
    Route::get('/left', 'RoomTypeController@left')->name('left');
    Route::get('/right', 'RoomTypeController@right')->name('right');


    ########## Rooms ##########
    Route::resource('rooms', RoomController::class);

    ########## feature ##########
    Route::resource('feature', FeatureController::class);

    ########## MangeUser ########
    Route::get('/users', 'ManageUsersController@index')->name('users.index');
    Route::post('/users', 'ManageUsersController@search')->name('search');
    Route::get('users/active_deactive_user/{id}', 'ManageUsersController@active_deactive_user')->name('active_deactive_user');
    Route::get('users/destroy/{id}', 'ManageUsersController@destroy')->name('user.destroy');

    ###############reservations####################
    Route::get('reservation/index', 'ReservationController@index')->name('admin.reservation.index');
    Route::get('reservation/indexP/{id}', 'ReservationController@indexP')->name('admin.reservation.indexP');
    Route::get('reservation/show/{id}', 'ReservationController@show')->name('admin.reservation.show');
    Route::get('reservation/edit/{id}', 'ReservationController@edit')->name('admin.reservation.edit');
    Route::get('reservation/destroy/{id}', 'ReservationController@destroy')->name('admin.reservation.destroy');



    Route::get('/create', 'AdminProfileController@create')->name('profile.create')->middleware('adminstration');
    Route::get('/index', 'AdminProfileController@index')->name('profile.index')->middleware('adminstration');
    Route::get('/show/{id}', 'AdminProfileController@show')->name('profile.show')->middleware('adminstration');
    Route::get('/edit/{id}', 'AdminProfileController@edit')->name('profile.edit')->middleware('adminstration');
    Route::post('/store', 'AdminProfileController@store')->name('profile.store')->middleware('adminstration');
    Route::post('/update/{id}', 'AdminProfileController@update')->name('profile.update')->middleware('adminstration');
    Route::get('/destroy/{id}', 'AdminProfileController@destroy')->name('profile.destroy')->middleware('adminstration');

    Route::get('/unauthorized', 'AdminProfileController@unauthorized')->name('Error');

    Route::get('/board', 'AdminController@board')->name('dashboardd');
});
############
Route::get('/login/admin', 'Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('/login/admin', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('/admin/logoun', 'Auth\AdminAuthController@logout')->name('adminLogout');
############
