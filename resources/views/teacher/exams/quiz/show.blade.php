@extends('teacher.layout')
@section('content')
    <a href="{{route("quiz.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__("admin.questions")}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>{{__("admin.questions")}}</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>E</th>
                                    <th>{{__("admin.right_answer")}}</th>
                                    <th>{{__("admin.action")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quiz["questions"] as $question)
                                    <tr>

                                        <td>{!! $question->question !!}</td>
                                        <td>{{$question->A}}</td>
                                        <td>{{$question->B}}</td>
                                        <td>{{$question->C}}</td>
                                        <td>{{$question->D}}</td>
                                        <td>{{$question->E}}</td>
                                        <td>{{$question->answer}}</td>

                                        <td colspan="2">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                    <div class="ripple-container"></div></a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a  href="{{route("question.edit",$question->id)}}">
                                                            {{__("admin.edit")}}
                                                        </a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{route('quiz.destroy',$question->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm({{__("admin.question")}})" type="submit" class="btn btn-danger">{{__("admin.delete")}}</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <a href="{{route("question.excel-create")}}" class="btn btn-success btn-raised  btn-add"  style="position:fixed;bottom:90px">
        <i class="fa fa-file-excel-o"></i>
    </a>
    <a href="{{route("question.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection


