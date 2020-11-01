@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__('content.result_list')}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>{{__('content.listeners')}}</th>
                                    <th>{{__('content.course_title')}}</th>
                                    <th>{{__('content.video_title')}}</th>
                                    <th>{{__('content.result_time_pass')}}</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)

                                        <tr>
                                            <td class="nowrap">
                                                <img src="{{$result->student->img}}" alt="Jessica Brown" width="36" height="36">
                                                <strong>{{$result->student->name}}</strong>
                                            </td>
                                            <td class="maw-320">
                                                <span class="truncate">{{$result->course->title}}</span>
                                            </td>
                                            <td class="maw-320">
                                                <span class="truncate">{{$result->video->title}}</span>
                                            </td>
                                            <td>{{$result->passed_day}}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="{{route('teacher.showResult', $result->id)}}">{{__('content.watch')}}</a>
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
@endsection
