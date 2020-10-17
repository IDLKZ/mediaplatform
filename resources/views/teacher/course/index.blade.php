@extends('teacher.layout')
@section('content')
    <!--  CONTENT  -->

    <div class="row clearfix">
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Список моих видеокурсов</h1>
                    <small class="text-muted">Здесь вы можете просмотреть свои видеокурсы</small>
                </div>
            </div>
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
                        <h6>{{$course->title}}</h6>
                        <small class="text-muted">{{\Illuminate\Support\Facades\Auth::user()->name}}  |  Последнее обновление: {{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</small>
                    </div>
                    <div class="pw_meta text-center">
                        <a href="{{route("course.show",$course->alias)}}" class="mr-2 ml-2 btn btn btn-raised btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a  href="{{route("course.edit",$course->alias)}}" class="mr-2 ml-2 btn btn-raised btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form  method="post" action="{{route('course.destroy',$course->alias)}}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Вы уверены')"  href="index.html" class="mr-2 ml-2 btn btn-raised btn-danger">
                                <i class="fa fa-close"></i>
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
            @endforeach
        @else
            <h1>Курсов пока нет</h1>
        @endif


    </div>

    <!--/ CONTENT -->

@endsection
