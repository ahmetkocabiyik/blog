@extends('layouts.master')

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Makale Düzenle</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {!! Form::model($makale,["route" => ["makalem.update",$makale->id], "method" => "put", "files" => true]) !!}

            {!! Form::bsText("baslik","Başlık") !!}
            {!! Form::bsSelect("kategori_id","Kategori",null,$kategoriler,"Lütfen bir kategori seçiniz") !!}
            {!! Form::bsFile("resim","Resim") !!}
            {!! Form::bsTextArea("icerik","İçerik",null,["class" => "summernote"]) !!}


            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop