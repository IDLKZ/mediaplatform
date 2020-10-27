@extends('student.layout')
@section('content')
    <!--  CONTENT  -->
    <a href="{{route("course.index")}}" class="btn btn-raised btn-info">Назад</a>
    <div class="row clearfix">

        <div class="md-12">

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h3>{{$course->title}}</h3>
                        <h5>{{\Illuminate\Support\Carbon::parse($course->created_at)->diffForHumans()}}</h5>
                    </div>
                    <div class="uw_image"> <img class="img-circle" src="{{$course->img}}" style="min-height: 120px" alt="User Avatar"></div>
                    <div class="uw_footer">
                        <div class="text-center">
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                            <p class="mt-20">{{$course->subtitle}}</p>
                            <a href="#" class="btn btn-raised btn-info">Подписаться</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>Основной язык:</h5>
                                    <span>{{$course->language->title}}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>Автор</h5>
                                    <span>{{$course->author->name}}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="uw_description">
                                    <h5>Последнее обновление:</h5>
                                    <span>{{\Illuminate\Support\Carbon::parse($course->updated_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div></div></div>
            <div class="col-md-8 ">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-blush">
                            <strong>Видеокурсы</strong> </h3>

                    </div>
                    <div class="boxs-body">
                        <ul class="tabs-menu">
                            @foreach($course->videos as $video)
                                @if (in_array($video->id,$video_ids))
                                    <li class="active">
                                        <a href="{{route("student.video.show",$video->alias)}}">
                                            <i class="fa fa-check-circle"></i>
                                            {{$video->count.".".$video->title}}
                                        </a>
                                    </li>
                                @else
                                <li>
                                    <a>
                                        <i class="fa fa-lock"></i>
                                        {{$video->count.".".$video->title}}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </section>
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-blush">
                            <strong>Информация о Курсе</strong> </h3>

                    </div>
                    <div class="boxs-body">
                        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#about" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">О курсе</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#advantage" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Навыки</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#requirement" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Требования</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active in" role="tabpanel" id="about" aria-labelledby="home-tab"
                                     style="overflow: scroll; height: auto"
                                >
                                    {!! $course->description !!}
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="advantage" aria-labelledby="profile-tab">
                                    @if (count($course->advantage))
                                        <h5 class="custom-font hb-blush">
                                            <strong>Чему ты научишься:</strong> </h5>
                                        <ul class="list-unstyled">
                                            @foreach($course->advantage as $advantage)
                                                <li>
                                                    <i class="fa fa-check"></i>{{$advantage}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="requirement" aria-labelledby="home-tab">
                                    {{$course->requirement}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>




        </div>


    </div>

    <!--/ CONTENT -->

@endsection
