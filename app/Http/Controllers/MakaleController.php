<?php

namespace App\Http\Controllers;

use App\Makale;
use Illuminate\Http\Request;

use App\Http\Requests;

class MakaleController extends Controller
{
    //
    public function index($slug)
    {
        $makale = Makale::where("slug",$slug)->first();

        return view("makale",compact('makale'));

    }
}
