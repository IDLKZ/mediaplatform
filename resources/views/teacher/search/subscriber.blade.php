@extends('teacher.layout')
@section('content')
    <a href="" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>Поиск подписчика</strong></h3>
                </div>
                <div class="boxs-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="my-form" action="{{route("teacher-search-subscriber-result")}}" method="get" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="boxs-body">
                            <div class="input-group search-bar">
                                <div class="form-group is-empty">
                                    <input type="text" class="form-control " name="query" placeholder="Введите ФИО..."><span class="material-input"></span></div>
                                <span class="input-group-btn">
										<button type="submit" class="btn btn-raised btn-default" type="button">
											<i class="fa fa-search"></i> Искать!</button>
									</span>
                            </div>
                        </div>

                    </form>
                </div>

            </section>
        </div>
    </div>
    @if (isset($searchResults) && isset($searchterm))
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font text-success">
                            <strong>Результаты поиска по слову "{{$searchterm}}"</strong></h3>
                    </div>
                    <div class="boxs-body">
                        @if ($searchResults->isNotEmpty())
                            <div class="body table-responsive members_profiles">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width:60px;">Изображение</th>
                                        <th>ФИО</th>
                                        <th>Роль</th>
                                        <th>Почта</th>
                                        <th>Телефон</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($searchResults as $result)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" src="{{$result->img != null ? $result->img : "/images/no-image.png"}}" alt="user" width="40"> </td>
                                            <td>
                                                <a>{{$result->name}}</a>
                                            </td>
                                            <td>
                                                <p>{{$result->role->title}}</p>
                                            </td>
                                            <td>
                                                <p>{{$result->email}}</p>
                                            </td>
                                            <td>
                                                <p>{{$result->phone}}</p>
                                            </td>
                                            <td>
                                                <p>{{$result->status == 1 ? "Верифицирован":"Не верифицирован"}}</p>
                                            </td>
                                            <td>
                                                <a href="{{route("teacherSubscriber",$result->id)}}"><i class="fa fa-eye"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{$searchResults->links()}}
                            </div>
                        @else
                            <h3 class="text-danger"> Ничего не найдено</h3>
                        @endif
                    </div>

                </section>
            </div>
        </div>
    @endif


@endsection


