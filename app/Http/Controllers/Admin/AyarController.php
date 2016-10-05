<?php

namespace App\Http\Controllers\Admin;

use App\Ayar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AyarController extends Controller
{
    //

    public function index()
    {
        $ayarlar = Ayar::all();

        return view("admin.site_ayarlari",compact("ayarlar"));
    }

    public function guncelle(Request $request)
    {
        $this->validate($request,[

            "baslik" => "required",
            "author" => "required",
            "aciklama" => "required",
            "keywords" => "required",
            "facebook" => "required",
            "twitter" => "required",
            "github" => "required"
        ]);
        Ayar::find(1)->update(["value" => $request->baslik]);
        Ayar::find(2)->update(["value" => $request->author]);
        Ayar::find(3)->update(["value" => $request->aciklama]);
        Ayar::find(4)->update(["value" => $request->keywords]);
        Ayar::find(5)->update(["value" => $request->facebook]);
        Ayar::find(6)->update(["value" => $request->twitter]);
        Ayar::find(7)->update(["value" => $request->github]);

        Session::flash("durum",1);

        return back();
    }
}
