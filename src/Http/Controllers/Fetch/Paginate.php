<?php

namespace Jazer\Forms\Http\Controllers\Fetch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Paginate extends Controller
{
    public static function paginate(Request $request) {

        if((isset($request['where'])) && ($request['where'] !== null )) {
            return DB::connection("conn_forms")->table("forms_submissions")
            ->where([
                "project_refid"     => config('jtformsconfig.project_refid')
            ])
            ->where(json_decode($request['where']))
            ->orderBy("dataid", "desc")
            ->paginate(config('formsconfig.fetch_paginate_max'));
        }
        else {
            return DB::connection("conn_forms")->table("forms_submissions")
            ->where([
                "project_refid"     => config('jtformsconfig.project_refid')
            ])
            ->orderBy("dataid", "desc")
            ->paginate(config('formsconfig.fetch_paginate_max'));
        }
    }
}