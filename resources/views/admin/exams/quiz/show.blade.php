@extends('admin.layout')
@section('content')

    <div class="page dashboard-page">
        <!-- bradcome -->
        <div class="b-b mb-20">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="h3 m-0">Вопросы данного теста</h1>
                    <small class="text-muted">Здесь вы можете добавить тестовые вопросы</small>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            @foreach($questions as $question)
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <section class="boxs">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">
                                <strong>Вопросы  {{$loop->iteration}}</strong></h3>
                            <ul class="controls">
                                <li class="dropdown">
                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-cog"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <li>
                                            <a href="{{route("admin-question.edit",$question->id)}}">
                                            <i class="fa fa-pencil"></i> Изменить
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="boxs-body">
                            <h4>{{$question->question}}</h4>
                            <ul class="media-list feeds_widget m-0">
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
        </div>


    </div>
    <a href="{{route("admin-quiz.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>




@endsection



