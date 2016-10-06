@extends('layouts.master')

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Yeni Kategori Ekle</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {!! Form::open(["url" => "/kategori" ,"method" => "post", "files" => true]) !!}

            {!! Form::bsText("baslik","Başlık") !!}
            {!! Form::bsFile("resim","Resim") !!}

            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop