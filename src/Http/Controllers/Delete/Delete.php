<?php

namespace Jazer\Forms\Http\Controllers\Delete;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Delete extends Controller
{
    public static function delete(Request $request) {
        $deleted = DB::connection("conn_forms")->table("forms_submissions")
            ->where([
                "project_refid"             => config('jtformsconfig.project_refid'),
                "form_submission_refid"     => $request['form_submission_refid']
            ])
            ->delete();

        if($deleted) {
            return [
                "success"   => true
            ];
        }
        else {
            return [
                "success"   => false
            ];
        }
    }
}