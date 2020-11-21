@extends('admin.layout')
@section('content')
    <a href="{{route("admin-media-news")}}" class="btn btn-raised btn-info">{{__("content.back")}}</a>

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Новости</h1>
                    <small class="text-muted">Здесь вы можете добавить новости</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-violet-blush">
                        <h3>Категории</h3>
                        <i class="fa fa-paragraph users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете увидеть список категорий, которые загружают админы данного портала.
                            </p>
                            <a href="{{route("admin-category.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-paragraph"> </i>
                                <small class="sm-none">Все категории</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>Новости</h3>
                        <i class="fa fa-header users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                Здесь вы можете видеть список новостей прикрепленных к категориям, которые создает администратор
                            </p>
                            <a href="{{route("admin-news.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-header"> </i>
                                <small class="sm-none">Все новости</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>


        </div>


    </div>



@endsection



