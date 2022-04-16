<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Mail\Mailable;
use App\Mail\TestEmail;


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

// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     if(\Mail::to('hasaneiaz659@gmail.com')->send(new \App\Mail\MyTestMail($details)))
//     {
//         dd("Email is Sent.");
//     }
//     else
//     {
//         dd("not sent");
//     }
   

// });

Route::get('test', function ()
{
    return view('test');
});

// Route::get('sendemail', function () {

//     $data = array(
//         'name' => "Mudasir riaz",
//     );

//     Mail::send('myMail', $data, function ($message) {

//         $message->from('mudasirriaz649@gmail.com', 'Hello Muhammed');

//         $message->to('mudasirriaz1793@gmail.com')
//         ->subject('This is test email');

//     });

    

//     return view('otp');

// });


Route::get('sendemail', [App\Http\Controllers\HomeController::class, 'send_otp']);


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/null-token', [App\Http\Controllers\HomeController::class, 'null_token']);

Route::get('/resend-otp', [App\Http\Controllers\HomeController::class, 'send_otp']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/check_form', [App\Http\Controllers\HomeController::class, 'check_form']);
