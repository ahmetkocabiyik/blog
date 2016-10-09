<?php

namespace App\Http\Controllers\Yazar;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Makale;
use App\Resim;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class MakaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $makaleler = Makale::where("user_id",Auth::user()->id)->orderBy("created_at","desc")->paginate(10);
        return view("yazar.makale_index",compact('makaleler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $kategoriler = Kategori::lists("baslik","id")->all();

        return view("yazar.makale_create",compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "baslik" => "required|max:255",
            "icerik" => "required",
            "kategori_id" => "required",
            "resim" => "required"
        ]);

        $input = $request->all();
        $input["user_id"] = Auth::user()->id;
        $input["durum"] = 0;

        $makale = Makale::create($input);

        if($resim = $request->file("resim"))
        {
            $time = time();
            $resim_isim = $time.".".$resim->getClientOriginalExtension();
            $thumb = "thumb_".$time.".".$resim->getClientOriginalExtension();

            Image::make($resim->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.65))->save(public_path("uploads/".$resim_isim));
            Image::make($resim->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));

            $input = [];
            $input["isim"] = $resim_isim;
            $input["imageable_id"] = $makale->id;
            $input["imageable_type"] = "App\Makale";

            Resim::create($input);

        }

        Session::flash("durum",2);
        return redirect("/makalem");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $makale = Makale::find($id);
        $kategoriler = Kategori::lists("baslik","id")->all();

        return view("yazar.makale_edit",compact('makale','kategoriler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            "baslik" => "required|max:255",
            "icerik" => "required",
            "kategori_id" => "required"
        ]);

        $input = $request->all();
        $input["durum"] = 0;
        $makale = Makale::find($id);
        $makale->update($input);

        if($resim = $request->file("resim"))
        {
            $resim_isim = $makale->resim->isim;
            $thumb = "thumb_".$makale->resim->isim;

            Image::make($resim->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.65))->save(public_path("uploads/".$resim_isim));
            Image::make($resim->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));


        }

        Session::flash("durum",2);
        return redirect("/makalem");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $makale_resim = Makale::find($id)->resim->isim;

        @unlink(public_path("uploads/".$makale_resim));
        @unlink(public_path("uploads/thumb_".$makale_resim));

        Resim::where("imageable_id",$id)->where("imageable_type","App\Makale")->delete();

        Makale::destroy($id);

        Session::flash("durum",1);

        return redirect("/makalem");
    }

    public function durumDegis(Request $request)
    {
        $id = $request->id;
        $durum = ($request->durum == "true") ? 1 : 0;

        Makale::find($id)->update(["durum" => $durum]);

    }
}
