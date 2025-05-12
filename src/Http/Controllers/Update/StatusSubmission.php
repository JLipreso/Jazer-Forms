<?php

namespace Jazer\Forms\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatusSubmission extends Controller
{
    public static function update(Request $request) {
        $updated = DB::connection("conn_forms")->table("forms_submissions")
            ->where([
                "form_submission_refid" => $request['form_submission_refid']
            ])
            ->update([
                "status"    => $request['status']
            ]);

        if($updated) {
            return [
                "success"   => true,
                "message"   => "Status successfully updated"
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Fail to update status"
            ];
        }
    }
}