<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Rekening;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard(){
        $month = now('m');
        $year = now('y');
        // dd($year);
        return view('index', [
            'nasabahbaru' => Nasabah::whereYear('created_at','=',  $year)->whereMonth('created_at', '=',  $month)->get()->count(),
            'rekeningbaru' => Rekening::whereYear('created_at','=',  $year)->whereMonth('created_at', '=',  $month)->get()->count(),
                                   
        ]);
    }
}
