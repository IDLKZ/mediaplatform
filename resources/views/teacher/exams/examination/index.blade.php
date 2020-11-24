@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <a href="{{route("teacher-exams")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__("admin.exams")}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        @if ($examinations->isNotEmpty())

                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>{{__("admin.course")}}</th>
                                        <th>{{__("admin.video")}}</th>
                                        <th>{{__("admin.quiz")}}</th>
                                        <th>{{__("admin.review")}}</th>
                                        <th>{{__("admin.file")}}</th>
                                        <th>{{__("admin.action")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($examinations as $examination)
                                        <tr>
                                            <td>{{$examination->course->title}}</td>
                                            <td>{{$examination->video->title}}</td>
                                            <td>{{$examination->quiz != null ?$examination->quiz->title :__("admin.no_selected")}}</td>
                                            <td>{{$examination->review != null ?$examination->review->title : __("admin.no_selected")}}</td>
                                            <td>{{$examination->file != null ?__("admin.download") :__("admin.no_selected")}}</td>
                                            <td colspan="2">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">

                                                        <li>
                                                            <a  href="{{route("examination.edit",$examination->id)}}">
                                                                {{__("admin.edit")}}
                                                            </a>
                                                        </li>

                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{route('examination.destroy',$examination->id)}}" method="post">
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
                            {{$examinations->links()}}
                        @else
                            <h3>{{__("admin.not_found")}}</h3>
                        @endif

                    </div>
                </section>
            </div>
        </div>
    </div>
    <a href="{{route("examination.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection

