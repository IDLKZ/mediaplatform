@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Мои материалы</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        <div class="table-responsive">
                            <table class="table table-middle">
                                <thead>
                                <tr>
                                    <th>Видео</th>
                                    <th>Наименование материала</th>
                                    <th>Тип файла</th>
                                    <th>Ссылки</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materials as $material)
                                    <tr>
                                        <td>{{$material->video->title}}</td>
                                        <td>{{$material->title}}</td>
                                        <td>{{$material->type}}</td>
                                        <td>
                                            @if ($material->links)
                                            @foreach($material->links as $link)
                                                <a href="{{$link}}" target="_blank">{{$link}}</a>
                                            @endforeach
                                            @else
                                                <p>Ссылок нет</p>
                                            @endif
                                        </td>
                                        <td colspan="2">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                    <div class="ripple-container"></div></a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a  href="{{route("material",$material->id)}}">
                                                            Скачать
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a  href="{{route("material.edit",$material->id)}}">
                                                            Редактировать
                                                        </a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{route('material.destroy',$material->id)}}" method="post">
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

