@extends('student.layout')
@section('content')
    {{Diglactic\Breadcrumbs\Breadcrumbs::render('showCourse', $course)}}
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h5>Автор: {{$course->author->name}}</h5>
                    </div>
                    <div class="uw_image"> <img class="img-circle" src="{{$course->img}}" alt="{{$course->title}}" style="width: 100%"></div>
                    <div class="text-center">
                        <p class="mt-3"><strong>{{$course->title}}</strong></p>
                    </div>
                    <div class="uw_footer text-center">
                        <div class="row mt-3 mb-3">
                            <div class="col-sm-6 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>{{$course->subscribers->count()}}</h5>
                                    <span>Подписчиков</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="uw_description">
                                    <h5>{{$course->videos->count()}}</h5>
                                    <span>Уроков</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">

                            <a href="{{$link['link']}}" class="btn btn-raised btn-{{$link['color']}}">{{$link['text']}}</a>
                        </div>
                    </div>
                </section>
                <section class="boxs mt-5">
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
        </div>
    </div>


@endsection
