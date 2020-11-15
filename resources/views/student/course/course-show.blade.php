@extends('student.layout')
@section('content')

    <div class="container">
        {{Diglactic\Breadcrumbs\Breadcrumbs::render('showCourse', $course)}}
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{$course->img}}" class="card-img-top" alt="{{$course->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$course->title}}</h5>
                        <p class="card-text">{!! $course->description !!}</p>
                        <p class="card-text"><small class="text-muted">{{$course->created_at->diffForHumans()}}</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 row justify-content-center">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        @foreach($subscribe->videos as $video)
                            @if (in_array($video->id, $subscribe->uservideo->pluck('video_id', 'id')->toArray()))
                                <a href="{{route('student.video.show', $video->alias)}}"><li class="list-group-item text-success"><i class="far fa-check-circle mr-2"></i>{{$video->title}}</li></a>
                            @else
                        <li class="list-group-item text-darkgray"><i class="fas fa-lock mr-2"></i>{{$video->title}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
