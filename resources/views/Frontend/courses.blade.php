@extends('Frontend.layout')
@section('content')
    <div id="main-third-course">
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4 col-sm-12">
                        <div class="skill-blocks">
                            <div class="row">
                                <div class="col-8">
                                    <small>{{$course->author->name}}</small><br>
                                    <h5>{{substr($course->title, 0, 60)}}</h5>
                                    <a href="{{route('userSingleCourse', $course->alias)}}"><small>Подробнее</small></a>
                                </div>
                                <div class="col-4 row align-items-center">
                                    <div class="circle">
                                        <img width="30" height="30" src="{{$course->img != null ? $course->img : '/images/no-image.png'}}" alt="{{$course->title}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop
