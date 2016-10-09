@extends("layouts.master")

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset("uploads/".$makale->resim->isim)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{$makale->baslik}}</h1>

                    <span class="meta">{{$makale->user->name}} tarafından {{$makale->created_at->formatLocalized('%A %d %B %Y - %H:%M')}} tarihinde yayınlandı.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {!! $makale->icerik !!}
        </div>
    </div>
</div>
    @stop