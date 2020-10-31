@extends('student.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Мои результаты</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>Экзамен</th>
                                    <th>Наименование курса</th>
                                    <th>Наименование видео</th>
                                    <th>Автор курса</th>
                                    <th>Студент курса</th>
                                    <th>День Сдачи</th>
                                    <th>День Проверки</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                <tr>
                                    <td>
                                        {{$result->examination->title}}
                                    </td>
                                    <td class="nowrap">
                                        <img src="{{$result->course->img}}" alt="Jessica Brown" width="36" height="36">
                                        <strong>{{$result->course->title}}</strong>
                                    </td>
                                    <td class="nowrap">
                                       {{$result->video->title}}
                                    </td>
                                    <td class="nowrap">
                                        <strong>{{$result->author->name}}</strong>
                                    </td>
                                    <td class="nowrap">
                                       {{$result->student->name}}
                                    </td>
                                    <td class="nowrap">
                                        {{$result->passed_day}}
                                    </td>
                                    <td class="nowrap">
                                        {{$result->checked_day}}
                                    </td>
                                    <td>
                                        <span class="label label-{{$result->checked ? 'success' : 'warning'}} label-pill">{{$result->checked ? 'Проверено' : 'Не проверено'}}</span>
                                    </td>
                                    <td colspan="2">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <div class="ripple-container"></div></a>
                                            <ul class="dropdown-menu pull-right">

                                                <li>
                                                    <a href="{{route("student.showResult",$result->id)}}">
                                                        Детали
                                                    </a>
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
