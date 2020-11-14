@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Экзамены</h1>
                    <small class="text-muted">Здесь вы можете добавить экзамены, тесты и опросы</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>Экзамены</h3>
                        <i class="icon-note users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете увидеть список экзаменов, которые прикреплены к видео.
                            </p>
                            <a href="{{route("admin-examination.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-th"> </i>
                                <small class="sm-none">Все экзамены</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-light-blue-blush">
                        <h3>Тесты</h3>
                        <i class="fa fa-list-ol users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список тестов
                            </p>
                            <a href="{{route("admin-quiz.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-list-ul"> </i>
                                <small class="sm-none">Все Тесты</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-salad-blush">
                        <h3>Опросы</h3>
                        <i class="fa fa-question-circle users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список опросов
                            </p>
                            <a href="{{route("admin-material.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-question"> </i>
                                <small class="sm-none">Все материалы</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>




@endsection



