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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/termsOfUse', 'API\UserGetApiController@termsOfUse')->name('terms');
Route::get('/privacyPolicy', 'API\UserGetApiController@privacyPolicy')->name('policy');
Route::get('/dataPolicy', 'API\UserGetApiController@dataPolicy')->name('data');

//********************BASIC API ****************************//
Route::post('user/manageIntrest', 'API\UserApiController@manageIntrest')->name('manageIntrest');
Route::post('user/privacySetting', 'API\UserApiController@privacySetting')->name('privacySetting');
Route::post('user/singup', 'API\UserApiController@singup')->name('signup');
Route::post('user/login', 'API\UserApiController@login')->name('login');
Route::get('/metadata', 'API\UserGetApiController@metadata')->name('metadata');

Route::post('user/OTPVerification', 'API\UserApiController@OTPVerification')->name('otpverification');
Route::post('user/forgotPassword', 'API\UserApiController@forgotPassword')->name('forgotPassword');
Route::post('user/fogotPasswordWeb/{id}', 'API\UserApiController@fogotPasswordWeb')->name('fogotPasswordWeb');	
Route::post('user/emailCheck', 'API\UserApiController@emailCheck')->name('emailCheck');	
//********************BASIC API ****************************//


//*********Group Api*******//
Route::post('user/createGroup', 'API\UserApiController@createGroup')->name('createGroup');
Route::post('user/getGroup', 'API\UserApiController@getGroup')->name('getGroup');	
Route::post('user/editGroup', 'API\UserApiController@editGroup')->name('editGroup');	
Route::post('user/manageGroup', 'API\UserApiController@manageGroup')->name('manageGroup');
Route::post('user/sendRequestGroup', 'API\UserApiController@sendRequestGroup')->name('sendRequestGroup');
Route::post('user/responseRequestGroup', 'API\UserApiController@responseRequestGroup')->name('responseRequestGroup');
Route::post('user/myGroup', 'API\UserApiController@myGroup')->name('myGroup');	
Route::post('user/getContactPerson', 'API\UserApiController@getContactPerson')->name('getContactPerson');
Route::post('user/changeGroupName', 'API\UserApiController@changeGroupName')->name('changeGroupName');
Route::post('user/deleteGroup', 'API\UserApiController@deleteGroup')->name('deleteGroup');	
Route::post('user/changePassword', 'API\UserApiController@changePassword')->name('changePassword');




//****** Member API ****//
Route::post('member/groupMember', 'API\MemberApiController@groupMember')->name('groupMember');	
Route::post('member/deleteMember', 'API\MemberApiController@deleteMember')->name('deleteMember');	
Route::post('member/getProfile', 'API\MemberApiController@getProfile')->name('getProfile');
Route::post('member/updateProfile', 'API\MemberApiController@updateProfile')->name('updateProfile');
Route::post('member/transferAdmin', 'API\MemberApiController@transferAdmin')->name('transferAdmin');
Route::post('member/changeRole', 'API\MemberApiController@changeRole')->name('changeRole');



//********* Events API ***//


Route::get('events/_isCurl', 'API\EventApiController@_isCurl')->name('test');

Route::post('events/createEvent', 'API\EventApiController@createEvent')->name('createEvent');
Route::post('events/editEvents', 'API\EventApiController@editEvents')->name('editEvents');
Route::post('events/getEvent', 'API\EventApiController@getEvent')->name('getEvent');
Route::post('events/getEventFromGroup', 'API\EventApiController@getEventFromGroup')->name('getEventFromGroup');
Route::post('events/deleteEvent', 'API\EventApiController@deleteEvent')->name('deleteEvent');
Route::post('events/saveEvent', 'API\EventApiController@saveEvent')->name('saveEvent');
Route::post('events/calenderEvent', 'API\EventApiController@calenderEvent')->name('calenderEvent');
Route::post('events/searchEvent', 'API\EventApiController@searchEvent')->name('searchEvent');
Route::post('events/sponsorEvent', 'API\EventApiController@sponsorEvent')->name('sponsorEvent');
Route::post('events/paymentPaypal', 'API\EventApiController@paymentPaypal')->name('payment');


//**********Announcement API ***//
Route::post('announcements/createAnnouncement', 'API\AnnouncementApiController@createAnnouncement')->name('createAnnouncement');
Route::post('announcements/editAnnouncement', 'API\AnnouncementApiController@editAnnouncement')->name('editAnnouncement');
Route::post('announcements/deleteAnnouncement', 'API\AnnouncementApiController@deleteAnnouncement')->name('deleteAnnouncement');
Route::post('announcements/getAnnouncement', 'API\AnnouncementApiController@getAnnouncement')->name('getAnnouncement');
Route::post('announcements/getAnnouncementGroup', 'API\AnnouncementApiController@getAnnouncementGroup')->name('getAnnouncementGroup');


//**********Attendance API ***//
Route::post('attendance/checkInEvent', 'API\AttendanceApiController@checkInEvent')->name('checkInEvent');
Route::post('attendance/checkInEventGet', 'API\AttendanceApiController@checkInEventGet')->name('checkInEventGet');
Route::post('attendance/checkInEventRequest', 'API\AttendanceApiController@checkInEventRequest')->name('checkInEventRequest');
Route::post('attendance/checkInEventResponse', 'API\AttendanceApiController@checkInEventResponse')->name('checkInEventResponse');

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'API\EventApiController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'API\EventApiController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'API\EventApiController@getPaymentStatus',));

//Paypal Integration
Route::post('payWithPaypal','PayPalController@payWithPaypal')->name('payWithPaypal');
Route::get('status','PayPalController@getPaymentStatus');