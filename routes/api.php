<?php

use Illuminate\Support\Facades\Route;
use Jazer\Forms\Http\Controllers\Create\FormSubmission;
use Jazer\Forms\Http\Controllers\Update\SeenSubmission;
use Jazer\Forms\Http\Controllers\Update\StatusSubmission;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'forms'], function () {
        Route::get('formsubmission', [FormSubmission::class, 'submit']);
        Route::get('seensubmission', [SeenSubmission::class, 'seen']);
        Route::get('statussubmission', [StatusSubmission::class, 'update']);
    });
});

