@extends('layouts.master')

@section('icerik')
        <!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header mavi-back" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Yazarlık Talepleri</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Durum</th>
                    <th>Yazar Adı</th>
                    <th>Yazar Email</th>
                    <th>Talep Tarihi</th>
                    <th>Eylem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($talepler as $talep)
                    <tr>
                        <td>
                            <input type="checkbox" class="durum" data-id="{{$talep->user->id}}" data-url="/talep/durum-degis" {{$talep->user->yetkisi_var_mi("author") ? "checked" : null}} >
                        </td>

                        <td>{{$talep->user->name}}</td>
                        <td>{{$talep->user->email}}</td>
                        <td>{{$talep->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/talep/{{$talep->id}}/edit" class="btn btn-primary eylem" data-toggle="modal" data-target="#aciklama{{$talep->id}}" title="İncele"><i class="fa fa-eye"></i></a>
                            <a href="/talep/{{$talep->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="aciklama{{$talep->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{$talep->user->name." Yazarlık Talebi"}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! $talep->aciklama !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">KAPAT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{$talepler->links()}}
            </div>



        </div>
    </div>
@stop

