<?php

namespace Jazer\Forms\Http\Controllers\Create;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FormSubmission extends Controller
{
    public static function submit(Request $request) {
        if($request['form_refid'] == '') {
            return [
                "success"   => false,
                "message"   => "No parent form reference"
            ];
        }
        else if($request['title'] == '') {
            return [
                "success"   => false,
                "message"   => "Undefined form title"
            ];
        }
        else if($request['forms_data'] == '') {
            return [
                "success"   => false,
                "message"   => "Form data looks empty, please check."
            ];
        }
        else if($request['creator_email'] == '') {
            return [
                "success"   => false,
                "message"   => "Creator email is required to receive update and response"
            ];
        }
        else {
            $submitted = DB::connection("conn_forms")->table("forms_submissions")->insert([
                "project_refid"         => config('jtformsconfig.project_refid'),
                "form_refid"            => $request['form_refid'],
                "form_submission_refid" => \Jazer\Forms\Http\Controllers\Utility\ReferenceID::create('FSB'),
                "title"                 => $request['title'],
                "forms_data"            => $request['forms_data'],
                "creator_refid"         => $request['creator_refid'],
                "creator_name"          => $request['creator_name'],
                "creator_email"         => $request['creator_email'],
                "created_by"            => $request['created_by'],
                "status"                => "new"
            ]);

            if($submitted) {
                return [
                    "success"   => true,
                    "message"   => "Submitted successfully"
                ];
            }
            else {
                return [
                    "success"   => false,
                    "message"   => "Fail to submit form"
                ];
            }
        }
    }
}