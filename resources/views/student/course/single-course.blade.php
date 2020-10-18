@extends('student.layout')
@section('content')
    <div class="page dashboard-page">
        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h3>{{$course->author->name}}</h3>
                        <h5>Преподаватель</h5>
                    </div>
                    <div class="uw_image"> <img class="img-circle" src="{{$course->img}}" alt="Course Avatar"></div>
                    <div class="uw_footer">
                        <div class="text-center">
                            <p class="mt-20">{{$course->title}}</p>
                            <a href="{{$link['link']}}" class="btn btn-raised btn-{{$link['color']}}">{{$link['text']}}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>3,568</h5>
                                    <span>Завершившие</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>17,600</h5>
                                    <span>Подписчиков</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="uw_description">
                                    <h5>23</h5>
                                    <span>Уроков</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-cyan">
                            <strong>Этот курс </strong> включает:</h3>
                    </div>
                    <!-- /boxs header -->

                    <!-- boxs body -->
                    <div class="boxs-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="list-group">
                                    @foreach($course->advantage as $item)
                                    <li class="list-group-item"><i class="fa fa-check mr-5"></i>{{$item}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font">
                            <strong>{{$course->subtitle}}</strong></h3>

                    </div>
                    <div class="boxs-body">
                        <p>{!! $course->description !!}</p>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12"> </div>
        </div>
    </div>
@endsection
