<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Talep;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TalepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $talepler =Talep::orderBy("created_at","desc")->paginate(10);
        return view("admin.talep_index",compact('talepler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Talep::destroy($id);

        Session::flash("durum",1);

        return redirect("/talep");

    }

    public function durumDegis(Request $request)
    {
        $id = $request->id;
        $durum = ($request->durum == "true") ? 1 : 0;

        if($durum)
        {

            DB::table("role_user")->insert(["user_id" => $id, "role_id" => 2]);
        }
        else
        {
            DB::table("role_user")->where("user_id",$id)->where("role_id",2)->delete();
        }

    }

}
