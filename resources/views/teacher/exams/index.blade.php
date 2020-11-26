@extends('teacher.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.exams")}}</h1>
                    <small class="text-muted">{{__("admin.exam_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-dark-violet-blush">
                        <h3>{{__("admin.exams")}}</h3>
                        <i class="icon-note users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.exam_description")}}                            </p>
                            <a href="{{route("examination.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-th"> </i>
                                <small class="sm-none">{{__("admin.all_exams")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-light-blue-blush">
                        <h3>{{__("admin.quizzes")}}</h3>
                        <i class="fa fa-list-ol users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.quiz_description")}}
                            </p>
                            <a href="{{route("quiz.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-list-ul"> </i>
                                <small class="sm-none">{{__("admin.quizzes")}}</small>

                            </a>
                        </div>


                    </div>
                </section>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget md-mh-350">
                    <div class="uw_header l-dark-salad-blush">
                        <h3>{{__("admin.reviews")}}</h3>
                        <i class="fa fa-question-circle users-icon"></i>
                    </div>
                    <div class="uw_footer pt-20">
                        <div class="text-center">
                            <p class="mt-20">
                                {{__("admin.review_description")}}
                            </p>
                            <a href="{{route("review.index")}}" class="btn btn-raised btn-info">
                                <i class="fa fa-question"> </i>
                                <small class="sm-none">{{__("admin.reviews")}}</small>
                            </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>


    </div>




@endsection



