@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.requests")}}</h1>
                    <small class="text-muted">{{__("admin.request_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-light-orange-blush">
                        <h3>{{__("admin.requests")}}</h3>
                        <i class="icon-question  users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.request_description")}}
                            </p>
                            <a href="{{route("admin-request-user")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-question-circle-o"> </i>
                                <small class="sm-none">{{__("admin.all_requests")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>{{__("admin.tasks")}}</h3>
                        <i class="icon-note users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.task_description")}}
                            </p>
                            <a href="{{route("admin-request-result")}}" class="btn btn-raised btn-info">
                                <i class="icon-note"> </i>
                                <small class="sm-none">{{__("admin.all_tasks")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>{{__("admin.access")}}</h3>
                        <i class="fa fa-unlock users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.access_description")}}
                            </p>
                            <a href="{{route("admin-request-video")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-unlock"> </i>
                                <small class="sm-none">{{__("admin.all_tasks")}}</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>



@endsection



