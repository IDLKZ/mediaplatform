@extends('admin.layout')
@section('content')

        <div class="page dashboard-page">
            <!-- bradcome -->
            <div class="b-b mb-20">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="h3 m-0">Dashboard</h1>
                        <small class="text-muted">Welcome to Falcon application</small>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs user_widget">
                        <div class="uw_header l-green-blush">
                            <h3>Менеджеры</h3>
                            <i class="fa fa-user-circle users-icon"></i>
                        </div>
                        <div class="uw_footer pt-20">
                            <div class="text-center">
                                <p class="mt-20">
                                    Здесь вы можете видеть список администраторов, которые занимаются поддержкой платформы
                                </p>
                                <a href="{{route("admin-managers","all")}}" class="btn btn-raised btn-info">
                                    <i class="fa fa-group"> </i>
                                    <small class="sm-none">Все администраторы</small>

                                </a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                    <a href="{{route("admin-managers","confirmed")}}" class="btn btn-success btn-raised btn-round ">
                                        <i class="icon-user-follow">  </i>
                                        <small class="sm-none">Активные</small>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <a href="{{route("admin-managers","unconfirmed")}}" class="btn btn-warning btn-raised btn-round">
                                            <i class="icon-user-unfollow pr-2">  </i>
                                            <small class="sm-none">В заявке</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs user_widget">
                        <div class="uw_header l-blue-blush">
                            <h3>Тьюторы</h3>
                            <i class="fa fa-graduation-cap users-icon"></i>
                        </div>
                        <div class="uw_footer pt-20">
                            <div class="text-center">
                                <p class="mt-20">
                                    Здесь вы можете видеть список тьюторов, которые ведут свои видеоуроки
                                </p>
                                <a href="{{route("admin-teachers","all")}}" class="btn btn-raised btn-info">
                                    <i class="fa fa-group"> </i>
                                    <small class="sm-none">Все тьюторы</small>

                                </a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                    <a href="{{route("admin-teachers","confirmed")}}" class="btn btn-success btn-raised btn-round ">
                                        <i class="icon-user-follow">  </i>
                                        <small class="sm-none">Активные</small>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <a href="{{route("admin-teachers","unconfirmed")}}" class="btn btn-warning btn-raised btn-round">
                                            <i class="icon-user-unfollow pr-2">  </i>
                                            <small class="sm-none">В заявке</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs user_widget">
                        <div class="uw_header l-blush">
                            <h3>Слушатели</h3>
                            <i class="fa fa-group users-icon"></i>
                        </div>
                        <div class="uw_footer pt-20">
                            <div class="text-center">
                                <p class="mt-20">
                                    Здесь вы можете видеть список слушателей, которые проходят видеоуроки
                                </p>
                                <a href="#" class="btn btn-raised btn-info">
                                    <i class="fa fa-group"> </i>
                                    <small class="sm-none">Все слушатели</small>

                                </a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-6 border-right">
                                    <div class="uw_description">
                                    <button class="btn btn-success btn-raised btn-round ">
                                        <i class="icon-user-follow">  </i>
                                        <small class="sm-none">Активные</small>
                                    </button>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6 border-right">
                                    <div class="uw_description">
                                        <button class="btn btn-warning btn-raised btn-round">
                                            <i class="icon-user-unfollow pr-2">  </i>
                                            <small class="sm-none">В заявке</small>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


        </div>
        <a href="{{route("user.create")}}" class="btn btn-success btn-raised  btn-add" >
            <i class="fa fa-plus"></i>
        </a>


@endsection

