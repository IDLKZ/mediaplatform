@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-cyan">
                    <strong>Ваши текущие задачи</strong></h3>
            </div>
            <!-- /boxs header -->

            <!-- boxs body -->
            <div class="boxs-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h4 class="custom-font hb-cyan">
                            <strong>Пользователи, задачи, запрос к видео</strong></h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge bg-red">{{$count["users"]}}</span> Заявка пользователей</li>
                            <li class="list-group-item">
                                <span class="badge bg-cyan">{{$count["results"]}}</span> Непроверенные задачи</li>
                            <li class="list-group-item">
                                <span class="badge bg-greensea">{{$count["userrequest"]}}</span> Заявок на открытие доступа к видео</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
