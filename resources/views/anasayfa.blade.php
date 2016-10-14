@extends("layouts.master")

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{!! config("ayarlar.baslik") !!}</h1>
                    <hr class="small">
                    <span class="subheading">{!! config("ayarlar.aciklama") !!}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($makaleler as $makale)
            <div class="post-preview">
                <a href="/yayinlanan-makale/{{$makale->slug}}">
                    <h2 class="post-title">
                        {{$makale->baslik}}
                    </h2>

                </a>
                <p class="post-meta">
                    {{$makale->user->name}} tarafından {{$makale->created_at->formatLocalized('%A %d %B %Y - %H:%M')}} tarihinde yayınlandı.
                </p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            <div class="text-center">
                {{$makaleler->links()}}
            </div>
        </div>
    </div>
</div>
    @stop


