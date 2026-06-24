<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/webhook-deploy', function () {
    shell_exec('/var/www/website_samsat/deploy.sh');
    return 'Deployed!';
});

use App\Http\Controllers\KendaraanController;

Route::resource('kendaraan', KendaraanController::class);

?>