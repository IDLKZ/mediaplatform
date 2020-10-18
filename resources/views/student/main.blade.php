@extends('student.layout')
@section('content')
    <div class="page dashboard-page">
        <div class="row clearfix">
            <div class="b-b mb-20">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="h3 m-0">Список моих видеокурсов</h1>
                        <small class="text-muted">Здесь вы можете просмотреть свои видеокурсы</small>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-body">
                        <div class="input-group search-bar">
                            <div class="form-group is-empty"><input type="text" class="form-control " name="search" placeholder="Search..."><span class="material-input"></span></div>
                            <span class="input-group-btn">
										<button class="btn btn-raised btn-default" type="button">
											<i class="fa fa-search"></i> Search</button>
									</span>
                        </div>
                    </div>
                </section>
            </div>
            @if(count($courses)>0)
                @foreach($courses as $course)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs project_widget">
                            <div class="pw_img">
                                <img class="img-responsive p-10" src="{{$course->img}}" alt="About the image">
                            </div>
                            <div class="pw_content">
                                <div class="pw_header">
                                    <h6><a href="{{route('singleCourse', $course->alias)}}">{{$course->title}}</a></h6>
                                    <small class="text-muted">{{$course->author->name}}  |  Последнее обновление: {{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</small>
                                </div>
                                <div class="pw_meta">
                                    <span>25 уроков</span>
                                    <a href="{{route('sendSubscribe', $course->alias)}}"><small class="text-danger">Подписаться</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>Курсов пока нет</h1>
            @endif


        </div>
    </div>
@endsection
