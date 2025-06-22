<?php

use Illuminate\Support\Facades\Route;
use Jazer\Forms\Http\Controllers\Create\FormSubmission;
use Jazer\Forms\Http\Controllers\Update\SeenSubmission;
use Jazer\Forms\Http\Controllers\Update\StatusSubmission;
use Jazer\Forms\Http\Controllers\Fetch\Paginate;
use Jazer\Forms\Http\Controllers\Count\Count;

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'forms'], function () {
        Route::post('formsubmission', [FormSubmission::class, 'submit']);
        Route::get('seensubmission', [SeenSubmission::class, 'seen']);
        Route::get('statussubmission', [StatusSubmission::class, 'update']);
        Route::get('paginatesubmissions', [Paginate::class, 'paginate']);
        Route::get('countbystatus', [Count::class, 'countByStatus']);
        Route::get('countbystatuslist', [Count::class, 'countByStatusList']);
    });
});

