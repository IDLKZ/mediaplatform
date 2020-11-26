@extends('admin.layout')
@section('content')
    <a href="{{route("admin-review.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.review_questions")}}</h1>
                    <small class="text-muted">
                        {{__("admin.review_questions.description")}}
                    </small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @foreach($review_questions as $review_question)
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">
                                <strong>{{__("admin.questions")}}  {{$loop->iteration}}</strong></h3>
                            <ul class="controls">
                                <li class="dropdown">
                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-cog"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <li>
                                            <a href="{{route("admin-review-question.edit",$review_question->id)}}">
                                                <i class="fa fa-pencil"></i> {{__("admin.change")}}
                                            </a>
                                        </li>
                                        <li>
                                            <form  method="post" action="{{route('admin-review-question.destroy',$review_question->id)}}">
                                                @method("DELETE")
                                                @csrf
                                                <button onclick="return confirm('Вы уверены?')" role="button" tabindex="0" class="btn btn-a">
                                                    <i class="fa fa-bitbucket"></i> {{__("admin.delete")}} </button>
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="boxs-body">
                            <h5>{{__("admin.questions")}}:</h5>
                            <blockquote>
                                {!! $review_question->question !!}
                            </blockquote>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>


    </div>
    <a href="{{route("admin-review-question.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection




