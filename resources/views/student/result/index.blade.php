@extends('student.layout')
@section('content')
    <div class="col-4">
        @include('student.left_sidebar')
    </div>
    <div class="col-8">

{{--        @foreach($results as $result)--}}
{{--                <div class="media">--}}
{{--                    <img src="{{$result->course->img}}" class="align-self-center mr-3" alt="{{$result->course->title}}" width="75" height="75">--}}
{{--                    <div class="media-body">--}}
{{--                        <h5 class="mt-0">{{$result->examination->title}}</h5>--}}
{{--                        <h6 class="mt-0">{{$result->video->title}}</h6>--}}
{{--                        <p>Автор курса:<strong>{{$result->author->name}}</strong></p>--}}
{{--                        <p>День сдачи:<strong>{{$result->passed_day}}</strong></p>--}}
{{--                        <p>День проверки:<strong>{{$result->checked_day}}</strong></p>--}}
{{--                        <p>Статус:<strong class="text-{{$result->checked ? 'success' : 'warning'}}">{{$result->checked ? 'Проверено' : 'Не проверено'}}</strong></p>--}}
{{--                        <p>--}}
{{--                            <a href="{{route("student.showResult",$result->id)}}">--}}
{{--                                Детали--}}
{{--                            </a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--        @endforeach--}}
        <div class="row">
            @foreach($results as $result)
            <div class="col-6 mb-4">
                <div class="container-test">
                    <div class="img-container">
                        <img src="{{$result->course->img}}" alt="">
                    </div>
                    <ul class="social-media">
                        <li><a href="{{route('student.showResult', $result->id)}}"><i class="fa fa-info"></i>Детали</a></li>
                    </ul>
                    <div class="user-info">
                        <h3>{{$result->video->title}}</h3>
                        <span>Автор курса: {{$result->author->name}}</span><br>
                        <span>Дата сдачи: {{$result->passed_day}}</span><br>
                        <span class="text-{{$result->checked ? 'success' : 'warning'}}">Статус: {{$result->checked ? 'Проверено' : 'Не проверено'}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>





    </div>

@endsection
