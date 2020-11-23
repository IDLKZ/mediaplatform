@extends('admin.layout')
@section('content')
    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.news")}}</h1>
                    <small class="text-muted">{{__("admin.news_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-violet-blush">
                        <h3>{{__("admin.categories")}}</h3>
                        <i class="fa fa-paragraph users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.category_description")}}
                            </p>
                            <a href="{{route("admin-category.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-paragraph"> </i>
                                <small class="sm-none">{{__("admin.all_categories")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>{{__("admin.news")}}</h3>
                        <i class="fa fa-header users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.news_description")}}
                            </p>
                            <a href="{{route("admin-news.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-header"> </i>
                                <small class="sm-none">{{__("admin.all_news")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>


        </div>


    </div>



@endsection



