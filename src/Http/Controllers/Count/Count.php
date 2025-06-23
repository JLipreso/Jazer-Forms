<?php

namespace Jazer\Forms\Http\Controllers\Count;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Count extends Controller
{
    public static function countByStatus(Request $request) {
        $data = DB::connection("conn_forms")->table("forms_submissions")
        ->where([
            "project_refid"     => config('jtformsconfig.project_refid'),
            "form_refid"        => $request['form_refid'],
            "status"            => $request['status']
        ])->count();
        
        return [
            "form_refid"    => $request['form_refid'],
            "form_status"   => $request['status'],
            "counts"        => $data
        ];
    }

    public static function countByStatusList(Request $request) {

        $forms = json_decode($request['forms']);
        $list  = [];

        foreach($forms as $index => $form) {
            $data = DB::connection("conn_forms")->table("forms_submissions")
            ->where([
                "project_refid"     => config('jtformsconfig.project_refid'),
                "form_refid"        => $form->form_refid,
                "status"            => $form->form_status
            ])->count();
            $list[]  = [
                "form_refid"    => $form->form_refid,
                "form_status"   => $form->form_status,
                "counts"        => $data
            ];
        }

        return $list;
    }
}
