@extends('layouts.master')

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Kullanıcı Düzenle</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {!! Form::model($user, ['route' => ['user.update', $user->id],"method" => "put"]) !!}
            {!! Form::bsCheckbox("rol","Roller", [
                ["value" => 1, "text" => "Admin", "is_checked" => $user->yetkisi_var_mi("admin")],
                ["value" => 2, "text" => "Yazar", "is_checked" => $user->yetkisi_var_mi("author")],
                ["value" => 3, "text" => "Standart", "is_checked" => $user->yetkisi_var_mi("standart")],
            ]) !!}

            {!! Form::bsText("name","İsim") !!}
            {!! Form::bsText("email","E-mail") !!}
            {!! Form::bsPassword("password","Şifre") !!}
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

