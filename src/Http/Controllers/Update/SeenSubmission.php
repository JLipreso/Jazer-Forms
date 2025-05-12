<?php

namespace Jazer\Forms\Http\Controllers\Update;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SeenSubmission extends Controller
{
    public static function seen(Request $request) {
        $user = DB::connection("conn_forms")->table("forms_submissions_seen")
                ->where([
                    "project_refid"             => config('formsconfig.project_refid'),
                    "form_submission_refid"     => $request['form_submission_refid'],
                    "seen_by"                   => $request['seen_by']
                ])
                ->first();
        
        if (!$user) {
            $seen = DB::connection("conn_forms")->table("forms_submissions_seen")->insert([
                "project_refid"             => config('formsconfig.project_refid'),
                "form_submission_refid"     => $request['form_submission_refid'],
                "seen_by"                   => $request['seen_by'],
                "seen_at"                   => date("Y-m-d h:i:s")
            ]);
            return [
                "success"   => true,
                "message"   => "Form submission marked as seen"
            ];
        }
        else {
            return [
                "success"   => false,
                "message"   => "Seen already"
            ];
        }
    }
}