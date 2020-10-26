@extends('student.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Мои курсы</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>Курс</th>
                                    <th>Наименование курса</th>
                                    <th>Время отправки запроса</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $subscriber)
                                    @if (!$subscriber->status)
                                        <tr>
                                            <td class="nowrap">
                                                <img src="{{$subscriber->course->img}}" alt="{{$subscriber->course->title}}" width="36" height="36">
                                                <strong>{{$subscriber->course->title}}</strong>
                                            </td>
                                            <td class="maw-320">
                                                <span class="truncate">{{$subscriber->course->title}}</span>
                                            </td>
                                            <td>{{$subscriber->created_at->diffForHumans()}}</td>
                                            <td>
                                                <span class="label label-{{$subscriber->status ? 'success' : 'warning'}} label-pill">{{$subscriber->status ? 'Одобрен' : 'Не одобрен'}}</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        @if (!$subscriber->status)
                                                            <li>
                                                                <a href="{{route('accessSubscriber', $subscriber->id)}}">Принять</a>
                                                            </li>
                                                        @endif
                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{route('deleteSubscriber', $subscriber->id)}}" method="post">
                                                                @csrf
                                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">Удалить</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($subscriber->status)
                                        <tr>
                                            <td class="nowrap">
                                                <img src="{{$subscriber->course->img}}" alt="{{$subscriber->course->title}}" width="36" height="36">
                                                <strong>{{$subscriber->course->title}}</strong>
                                            </td>
                                            <td class="maw-320">
                                                <span class="truncate">{{$subscriber->course->title}}</span>
                                            </td>
                                            <td>{{$subscriber->created_at->diffForHumans()}}</td>
                                            <td>
                                                <span class="label label-{{$subscriber->status ? 'success' : 'warning'}} label-pill">{{$subscriber->status ? 'Одобрен' : 'Не одобрен'}}</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a  href="{{route("student.course.show",$subscriber->course->alias)}}">
                                                                Смотреть видеоуроки
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{route('deleteSubscriber', $subscriber->id)}}" method="post">
                                                                @csrf
                                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">Отказаться от подписки</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
