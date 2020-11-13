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
                    <div class="col-md-12 col-sm-12  course-item mt-20">
                        <div class="row">
                            <div class="col-md-3 bg-slategray course-item-header p-lg-40">
                                <div class="course-item-image p-sm-10">
                                    <img src="{{$img = $course->img !=null ? $course->img :"/images/no-image.png" }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-9 course-title">
                                <div class="col-md-10">
                                    <h3 class="text-blush">{{$course->title}}</h3>
                                    <small class="text-blush">Автор:{{$course->author->name}}</small><br>
                                    <small class="text-blush">Создано {{$course->created_at->diffForHumans()}}</small> |
                                    <small class="text-blush">Обновлено {{$course->updated_at->diffForHumans()}}</small>
                                    <hr class="mt-0">
                                </div>
                                <div class="col-md-2 text-center">
                                    <ul class="controls list-group-flush">
                                        <li class="dropdown list-group-item">
                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp list-unstyled">

                                                <li>
                                                    <a href="{{route("admin-course.show",$course->alias)}}" role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-eye"></i> Посмотреть </a>
                                                </li>
                                                <li>
                                                    <a href="{{route("admin-course-videos",$course->alias)}}" role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-vimeo-square"></i> Видеоуроки </a>
                                                </li>
                                                <li>
                                                    <a href="{{route("admin-course.edit",$course->alias)}}" role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-pencil"></i> Редактировать </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-user-plus"></i> Подписчики </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-question-circle"></i> Заявка </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="boxs-fullscreen">
                                                        <i class="fa fa-bitbucket"></i> Удалить </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <h5>{{$course->subtitle}}</h5>
                                    <hr>
                                    <div class="uw_footer ">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-4 border-right">
                                                <div class="uw_description text-center">
                                                    <i class="fa fa-flag"></i>
                                                    <h5>{{$course->language->title}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-4 border-right">
                                                <div class="uw_description text-center">
                                                    <i class="fa fa-group"></i>
                                                    <h5>{{$course->subscribers->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-4">
                                                <div class="uw_description text-center">
                                                    <i class="fa fa-vimeo-square"></i>
                                                    <h5>{{$course->videos->count()}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <a href="{{route("admin-course.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>

    <!--/ CONTENT -->

@endsection

