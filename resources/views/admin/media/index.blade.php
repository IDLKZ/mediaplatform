@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Медиа</h1>
                    <small class="text-muted">Здесь вы можете добавить видеокурсы, видео и материалы к видео</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-violet-blush">
                        <h3>Курсы</h3>
                        <i class="fa fa-video-camera users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете увидеть список курсов, которые загружают преподаватели данного портала.
                            </p>
                            <a href="{{route("admin-course.index")}}" class="btn btn-raised btn-info">
                                <i class="icon-control-play"> </i>
                                <small class="sm-none">Все Курсы</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>Видеоуроки</h3>
                        <i class="fa fa-graduation-cap users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список видеоуроков прикрепленных к видеокурсу, которые вы можете посмотреть
                            </p>
                            <a href="{{route("admin-teachers","all")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-vimeo-square"> </i>
                                <small class="sm-none">Все видеоуроки</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-green-blush">
                        <h3>Материалы</h3>
                        <i class="fa fa-book users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список материалов, которые прикреплены к  видеоурокам
                            </p>
                            <a href="{{route("admin-students","all")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-bookmark"> </i>
                                <small class="sm-none">Все материалы</small>

                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>



@endsection



