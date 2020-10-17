@extends('teacher.layout')
@section('content')
    <!--  CONTENT  -->

        <div class="page page-tables-footable">
            <!-- bradcome -->
            <div class="b-b mb-10">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="h3 m-0">Список ваших курсов</h1>
                        <small class="text-muted">Здесь публикуются ваши курсы</small>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="boxs ">
                        <div class="boxs-header">
                            <h3 class="custom-font hb-cyan">
                                <strong>Таблица</strong> Курсов</h3>

                        </div>
                        <div class="boxs-body">
                            <div class="form-group">
                                <label for="filter" style="padding-top: 5px">Поиск:</label>
                                <input id="filter" type="text" class="form-control rounded w-md mb-10 inline-block" />
                            </div>
                            <table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Автор</th>
                                    <th>Дата создания</th>
                                    <th>Дата обновления</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->title}}</td>
                                    <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                                    <td>{{$course->created_at}}</td>
                                    <td>{{$course->updated_at}}</td>
                                    <td>
                                        <a href="{{route("course.show",$course->alias)}}" class="mr-2 ml-2 btn btn btn-raised btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button  href="index.html" class="mr-2 ml-2 btn btn-raised btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button  href="index.html" class="mr-2 ml-2 btn btn-raised btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="hide-if-no-paging">
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <ul class="pagination">

                                        </ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    <!--/ CONTENT -->

@endsection
