@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Мои экзамены</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>Курс</th>
                                    <th>Видео</th>
                                    <th>Тест</th>
                                    <th>Опрос</th>
                                    <th>Файл</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($examinations as $examination)
                                    <tr>
                                        <td>{{$examination->course->title}}</td>
                                        <td>{{$examination->video->title}}</td>
                                        <td>{{$examination->quiz != null ?$examination->quiz->title :"Не выбрано"}}</td>
                                        <td>{{$examination->review != null ?$examination->review->title : "Не выбрано"}}</td>
                                        <td>{{$examination->file != null ?"Скачать" :"Не выбрано"}}</td>
                                        <td colspan="2">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                    <div class="ripple-container"></div></a>
                                                <ul class="dropdown-menu pull-right">

                                                    <li>
                                                        <a  href="{{route("examination.edit",$examination->id)}}">
                                                            Редактировать
                                                        </a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{route('examination.destroy',$examination->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">Удалить</button>
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
@endsection

