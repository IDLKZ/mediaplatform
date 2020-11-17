@extends('teacher.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Поисковик</h1>
                    <small class="text-muted">Здесь вы можете найти пользователей, медиа, материалы, экзамены, вопросы</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>Поиск подписчика</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете найти подписчиков данного портала.
                            </p>
                            <a href="{{route("teacher-search-subscriber")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">Искать!</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-light-blue-blush">
                        <h3>Медиа</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете найти курсы, видеоуроки, материалы, экзамены
                            </p>
                            <a href="{{route("teacher-search-media")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">Искать!</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-salad-blush">
                        <h3>Вопросы</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете найти вопросы к тестам и опросам
                            </p>
                            <a href="{{route("teacher-search-question")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">Искать!</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>




@endsection




