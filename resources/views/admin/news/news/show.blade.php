@extends('admin.layout')
@section('content')
    <a href="{{route("admin-news.index")}}" class="btn btn-raised btn-info">{{__("content.back")}}</a>
    <div class="page static-page-tables">
        <div class="row clearfix bg-white">
            <div class="mypost-list mt-20 p-20">
                <div class="boxs-header m-20">
                    <h3 class="custom-font hb-green">
                        <strong>{{$news->title}}</strong> </h3>
                    <p>{{__("admin.author")}}: {{$news->author->name}}</p>
                    <p>{{__("admin.update")}}: {{$news->updated_at->diffForHumans()}}</p>
                </div>
                <div class="post-box">																														<div class="post-img">
                        <img src="{{$news->img}}" class="img-responsive m-auto" alt="">
                    </div>
                    <div class="panel panel-default p-20">
                        {!! $news->description !!}
                        <p class="mt-10 mb-0">
                            <a href="{{route("admin-news.edit",$news->alias)}}" class="btn btn-raised bg-blue btn-sm">
                                <i class="fa fa-pencil text-inactive"></i> {{__("admin.change")}} </a>

                        </p>
                    </div>
                </div>
                <hr>


            </div>
        </div>
    </div>

@endsection
