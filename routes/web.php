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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('api/subscriptions','SubscriptionsController');
Route::get('/sendemail',function(){


        $data = [

               'title'=>"Hello from Team",
               'content'=>'This is an auto generated email - please dont reply to this'

        ];

        Mail::send('email.test',$data,function($message){


                $message->to('mythilmeshram@gmail.com','Mithilesh')->subject('Hello From Team');

        });

});
