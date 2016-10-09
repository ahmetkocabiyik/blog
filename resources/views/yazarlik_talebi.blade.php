@extends('layouts.master')

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Yazarlık Talebi</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {!! Form::open(["url" => "/yazarlik-talebi/gonder" ,"method" => "post"]) !!}

            {!! Form::bsTextArea("aciklama","Açıklama",null,["class" => "summernote"]) !!}

            {!! Form::bsSubmit("TALEP GÖNDER") !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop