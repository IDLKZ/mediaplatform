@extends('admin.layout')
@section('content')
    <a href="{{route("admin-quiz.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">{{__("admin.questions")}}</h1>
                    <small class="text-muted">{{__("admin.quiz_description")}}</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @if ($questions->isNotEmpty())
                @foreach($questions as $question)
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <section  class="boxs">
                            <div class="boxs-header">
                                <h5 class="custom-font hb-cyan">
                                    <strong>Вопросы  {{$loop->iteration}}</strong></h5>
                                <ul class="controls">
                                    <li class="dropdown">
                                        <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-cog"></i>
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li>
                                                <a href="{{route("admin-question.edit",$question->id)}}">
                                                    <i class="fa fa-pencil"></i> {{__("admin.change")}}
                                                </a>
                                            </li>
                                            <li>
                                                <form  method="post" action="{{route('admin-question.destroy',$question->id)}}">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button onclick="return confirm({{__("admin.question")}})" role="button" tabindex="0" class="btn btn-a">
                                                        <i class="fa fa-bitbucket"></i> {{__('admin.delete')}} </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div style="overflow-y: scroll; height: 250px; max-height: 250px" class="boxs-body">
                                <h4>{!! $question->question !!}</h4>
                                <ul class="media-list feeds_widget m-0" >
                                    <li class="media">
                                        <div class="media-img">A</div>
                                        <div class="media-body">
                                            <div class="media-heading">{{$question->A}}
                                                <small class="pull-right text-muted"><i class="{{"A" == $question->answer ? "icon-check text-success" : "icon-close text-danger"}}"></i> </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-img">B</div>
                                        <div class="media-body">
                                            <div class="media-heading">{{$question->B}}
                                                <small class="pull-right text-muted"><i class="{{"B" == $question->answer ? "icon-check text-success" : "icon-close text-danger"}}"></i> </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-img">C</div>
                                        <div class="media-body">
                                            <div class="media-heading">{{$question->B}}
                                                <small class="pull-right text-muted"><i class="{{"C" == $question->answer ? "icon-check text-success" : "icon-close text-danger"}}"></i> </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-img">D</div>
                                        <div class="media-body">
                                            <div class="media-heading">{{$question->D}}
                                                <small class="pull-right text-muted"><i class="{{"D" == $question->answer ? "icon-check text-success" : "icon-close text-danger"}}"></i> </small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-img">E</div>
                                        <div class="media-body">
                                            <div class="media-heading">{{$question->E}}
                                                <small class="pull-right text-muted"><i class="{{"E" == $question->answer ? "icon-check text-success" : "icon-close text-danger"}}"></i> </small>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </section>
                    </div>
                @endforeach
                {{$questions->links()}}
            @else
                {{__("admin.not_found")}}
            @endif

        </div>


    </div>
    <a href="{{route("admin-question.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection



