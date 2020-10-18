@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Мои видеоуроки</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>Курс</th>
                                    <th>Наименование курса</th>
                                    <th>№ Видео</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                    <td>{{$video->course->title}}</td>
                                    <td>{{$video->title}}</td>
                                    <td>{{$video->count}}</td>
                                    <td>
                                        <span class="label label-{{$video->available ? 'success' : 'warning'}} label-pill">{{$video->available ? 'Превью' : 'Не превью'}}</span>
                                    </td>
                                    <td colspan="2">
                                        <a href="{{route("video.show",$video->alias)}}" class="mr-2 ml-2 btn btn btn-raised btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a  href="{{route("video.edit",$video->alias)}}" class="mr-2 ml-2 btn btn-raised btn-warning btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form  method="post" action="{{route('video.destroy',$video->alias)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Вы уверены')"  href="index.html" class="mr-2 ml-2 btn btn-raised btn-danger btn-sm">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>
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

