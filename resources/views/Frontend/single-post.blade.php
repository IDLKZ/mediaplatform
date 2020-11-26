@extends('student.layout')
@section('content')

<div class="container">
    <div class="row clearfix bg-white">
        <div class="mypost-list mt-20 p-20">
            <div class="boxs-header m-20">
                <h3 class="custom-font hb-green">
                    <strong>{{$news->title}}</strong> </h3>
                <p>{{__("admin.author")}}: {{$news->author->name}}</p>
                <p>{{__("admin.updated")}}: {{$news->updated_at->diffForHumans()}}</p>
            </div>
            <div class="post-box">																														<div class="post-img">
                    <img src="{{$news->img}}" class="img-responsive m-auto" alt="">
                </div>
                <div class="panel panel-default p-20">
                    {!! $news->description !!}
                </div>
            </div>
            <hr>


        </div>
    </div>
</div>


@endsection
