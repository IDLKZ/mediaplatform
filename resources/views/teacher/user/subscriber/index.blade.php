@extends('teacher.layout')
@section('content')
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Список подписчиков</h1>
                    <small class="text-muted">Подписки на видеокурсы</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @foreach($subscribers as $subscriber)
                @if ($subscriber->status == 1)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-blush">
                                <h5>{{$subscriber->user->name}}</h5>
                                <div class="uw_image">
                                    <img class="img-circle" src="{{$img = $subscriber->user->img !=null ? $subscriber->user->img :"/images/no-image.png" }}" alt="User Avatar">
                                </div>

                            </div>
                            <div class="uw_footer">
                                <section class="boxs boxs-simple">
                                    <div class="boxs-header">
                                        <h3 class="custom-font hb-green">
                                            <strong>Подписка на:{{$subscriber->course->title}}</strong></h3>
                                    </div>

                                </section>
                                <div class="text-center">
                                    <a href="{{route("teacherSubscriber",$subscriber->user->id)}}" class="btn btn-raised btn-info">
                                        <i class="fa fa-info"> </i>
                                        <small class="sm-none"> О студенте</small>

                                    </a>
                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("cancelSubscriber",$subscriber->id)}}" class="btn btn-warning btn-raised btn-round">
                                                <i class="fa fa-close">  </i>
                                                <small class="sm-none">Отменить</small>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("deleteSubscriber",$subscriber->id)}}" class="btn btn-danger btn-raised btn-round">
                                                <i class="fa fa-close">  </i>
                                                <small class="sm-none">Удалить</small>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>

                @endif
                @if ($subscriber->status == 0)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section class="boxs user_widget">
                            <div class="uw_header l-blush">
                                <h5>{{$subscriber->user->name}}</h5>
                                <div class="uw_image">
                                    <img class="img-circle" src="{{$img = $subscriber->user->img !=null ? $subscriber->user->img :"/images/no-image.png" }}" alt="User Avatar">
                                </div>

                            </div>
                            <div class="uw_footer">
                                <section class="boxs boxs-simple">
                                    <div class="boxs-header">
                                        <h3 class="custom-font hb-green">
                                            <strong>Запрос на курс:{{$subscriber->course->title}}</strong></h3>
                                    </div>

                                </section>
                                <div class="text-center">
                                    <a href="{{route("teacherSubscriber",$subscriber->user->id)}}" class="btn btn-raised btn-info">
                                        <i class="fa fa-info"> </i>
                                        <small class="sm-none"> О студенте</small>

                                    </a>
                                </div>

                                <div class="row">

                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("accessSubscriber",$subscriber->id)}}" class="btn btn-success btn-raised btn-round">
                                                <i class="fa fa-check-circle-o">  </i>
                                                <small class="sm-none">Принять</small>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 col-xs-6 border-right">
                                        <div class="uw_description">
                                            <a href="{{route("deleteSubscriber",$subscriber->id)}}" class="btn btn-danger btn-raised btn-round">
                                                <i class="fa fa-close">  </i>
                                                <small class="sm-none">Удалить</small>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
                @endif

            @endforeach
            {{$subscribers->links()}}
        </div>


    </div>
@endsection
