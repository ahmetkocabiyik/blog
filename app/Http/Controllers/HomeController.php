<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Makale;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makaleler = Makale::where("durum",1)->orderBy("created_at","desc")->paginate(10);
        return view('anasayfa',compact('makaleler'));
    }
}
