@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Заявки</h1>
                    <small class="text-muted">Здесь вы можете добавить заявки, открыть доступ к видео, задания</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-light-orange-blush">
                        <h3>Заявки</h3>
                        <i class="icon-question  users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете увидеть список пользователей, которые ждут очереди для одобрения заявки.
                            </p>
                            <a href="{{route("admin-request-user")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-question-circle-o"> </i>
                                <small class="sm-none">Все Заявки</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>Задачи</h3>
                        <i class="icon-note users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список непроверенных задач, которые вы можете проверить
                            </p>
                            <a href="{{route("admin-request-result")}}" class="btn btn-raised btn-info">
                                <i class="icon-note"> </i>
                                <small class="sm-none">Все Задачи</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>Доступ</h3>
                        <i class="fa fa-unlock users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете открыть доступ к видео для пользователей, которые отправили заявку
                            </p>
                            <a href="{{route("admin-material.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-unlock"> </i>
                                <small class="sm-none">Все заявки</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>



@endsection



