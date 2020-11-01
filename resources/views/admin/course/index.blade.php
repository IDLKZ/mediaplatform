@extends('admin.layout')
@section('content')
    <!--  CONTENT  -->
    <div class="page page-dashboard">
        <div class="row clearfix">
            <div class="b-b mb-20">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="h3 m-0">{{__('content.list_courses')}}</h1>
                        <small class="text-muted">{{__('content.small_subtitle_courses')}}</small>
                    </div>
                </div>
            </div>
            @if(count($courses)>0)
                @foreach($courses as $course)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="boxs project_widget">
                            <div class="pw_img">
                                <img class="img-responsive p-10" src="{{$course->img}}" alt="{{$course->title}}" style="margin: 0 auto">
                            </div>
                            <div class="pw_content">
                                <div class="pw_header">
                                    <h6>{{$course->title}}</h6>
                                    <small class="text-muted">{{$course->author->name}}  |
                                        {{__('content.course_last_update')}}: {{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</small>
                                </div>
                                <div class="pw_meta">
                                    <a href="{{route("admin-course.show",$course->alias)}}"><span>{{__('content.watch')}}</span></a>
                                    <a href="{{route("admin-course.edit",$course->alias)}}"><small class="text-muted">{{__('content.edit')}}</small></a>
                                    <form  method="post" action="{{route('admin-course.destroy',$course->alias)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-raised btn-danger" onclick="return confirm('Вы уверены')"><small class="text-white">{{__('content.delete')}}</small></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>{{__('content.not_course')}}</h1>
            @endif


        </div>
    </div>

    <!--/ CONTENT -->

@endsection

