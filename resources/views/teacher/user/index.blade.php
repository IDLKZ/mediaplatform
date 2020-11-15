@extends('teacher.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Мои подписчики</h1>
                    <small class="text-muted">Здесь вы можете увидеть моих подписчиков</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h3>{{__("admin.user.students")}}</h3>
                        <i class="fa fa-group users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 border-right">
                                <div class="uw_description">
                                    <a href="{{route("confirmed_subscribers")}}" class="btn btn-success btn-raised btn-round ">
                                        <i class="icon-user-follow">  </i>
                                        <small class="sm-none">Активные</small>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <a href="{{route("unconfirmed_subscribers")}}" class="btn btn-warning btn-raised btn-round">
                                        <i class="icon-user-unfollow pr-2">  </i>
                                        <small class="sm-none">В заявке</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>



@endsection


