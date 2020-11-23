@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.search")}}</h1>
                    <small class="text-muted">
                        {{__("admin.search_description")}}
                    </small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>{{__("admin.search_user")}}</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.search_user_description")}}
                            </p>
                            <a href="{{route("admin-search-user")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">{{__("admin.search")}}!</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-light-blue-blush">
                        <h3>{{__("admin.media")}}</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.search_media_description")}}
                            </p>
                            <a href="{{route("admin-search-media")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">{{__("admin.search")}}!</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-salad-blush">
                        <h3>{{__("admin.search_question")}}</h3>
                        <i class="fa fa-search users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.search_question_description")}}
                            </p>
                            <a href="{{route("admin-search-question")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-search"> </i>
                                <small class="sm-none">{{__("admin.search")}}!</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>




@endsection




