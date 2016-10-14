<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Makale;
use Illuminate\Http\Request;

use App\Http\Requests;

class KategoriController extends Controller
{
    //
    public function index($slug)
    {
        $kategori = Kategori::where("slug",$slug)->first();

        $makaleler = Makale::where("kategori_id",$kategori->id)->where("durum",1)->orderBy("created_at","desc")->paginate(10);

        return view("kategori",compact('kategori','makaleler'));



    }
}
