@extends('teacher.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.media")}}</h1>
                    <small class="text-muted"> {{__("admin.media_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-400">
                    <div class="uw_header l-violet-blush">
                        <h3>{{__("admin.courses")}}</h3>
                        <i class="fa fa-video-camera users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.course_description")}}                            </p>
                            <a href="{{route("course.index")}}" class="btn btn-raised btn-info">
                                <i class="icon-control-play"> </i>
                                <small class="sm-none">{{__("admin.courses_all")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-400">
                    <div class="uw_header l-dark-blue-blush">
                        <h3>{{__("admin.videos")}}</h3>
                        <i class="fa fa-graduation-cap users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.video_description")}}                            </p>
                            <a href="{{route("video.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-vimeo-square"> </i>
                                <small class="sm-none">{{__("admin.video_all")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-400">
                    <div class="uw_header l-dark-green-blush">
                        <h3>{{__("admin.materials")}}</h3>
                        <i class="fa fa-book users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.material_description")}}                            </p>
                            <a href="{{route("material.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-bookmark"> </i>
                                <small class="sm-none">{{__("admin.material_all")}}</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>



@endsection




