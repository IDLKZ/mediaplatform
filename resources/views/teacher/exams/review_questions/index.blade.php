@extends('teacher.layout')
@section('content')
    <a href="{{route("teacher-exams")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__("admin.review_questions")}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            @if ($review_questions->isNotEmpty())
                                <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>{{__("admin.review")}}</th>
                                    <th>{{__("admin.questions")}}</th>
                                    <th>{{__("admin.action")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($review_questions as $review)
                                    <tr>
                                        <td>{{$review->review->title}}</td>
                                        <td>{{$review->question}}</td>
                                        <td colspan="2">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                    <div class="ripple-container"></div></a>
                                                <ul class="dropdown-menu pull-right">

                                                    <li>
                                                        <a  href="{{route("review-question.edit",$review->id)}}">
                                                            {{__("admin.edit")}}
                                                        </a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{route('review-question.destroy',$review->id)}}" method="post">
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
                                {{$review_questions->links()}}
                            @else
                                <h3>{{__("admin.not_found")}}</h3>

                            @endif

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


