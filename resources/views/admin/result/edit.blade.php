@extends('admin.layout')
@section('content')
    <a href="" class="btn btn-raised btn-info">Назад</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>Результаты</strong></h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="boxs-body">
                    <form id="my-form" action="{{route("admin-result.update",$result->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование экзамена</label>
                            <div class="col-sm-9">
                                <input disabled value="{{$result->examination->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Автор экзамена</label>
                            <div class="col-sm-9">
                                <input disabled value="{{$result->author->name}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Студент сдавший экзамен</label>
                            <div class="col-sm-9">
                                <input disabled value="{{$result->student->name}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс </label>
                            <div class="col-sm-9">
                                <input disabled value="{{$result->course->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <input disabled value="{{$result->video->title}}" type="text" class="form-control" placeholder="Наименование файла" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Комментарии от студента</label>
                            <div class="col-sm-9">
                                {!! $result->student_comments !!}
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Время сдачи</label>
                            <div class="col-sm-9">
                                {{$result->passed_day}}
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <section class="boxs">
                            <div class="boxs-header">
                                <h3 class="custom-font">
                                    <strong>Результаты </strong></h3>
                            </div>
                            <div class="boxs-body p-0">
                                <table class="table table-condensed table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Вопрос</th>
                                        <th>Ответ</th>
                                        <th>Верный ответ</th>
                                        <th>Балл</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result->answers as $answer)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {!! $answer["question"] !!}
                                            </td>
                                            <td>
                                                {!! $answer["answer"]  !!}
                                            </td>
                                            @if (isset($answer["right"]))
                                                <td>
                                                    <p>{{$answer["right"]}}</p>
                                                </td>
                                                <td>
                                                    <p>{{$answer["answer"] == $answer["right"] ? 1 : 0}}</p>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <td colspan="4">
                                        Итого:
                                    </td>
                                    <td>
                                        {{$result->result}}
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <div class="boxs-header">
                            <h3 class="custom-font hb-blush">
                                <strong>Ваша оценка</strong></h3>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ваш комментарий </label>
                            <div class="col-sm-9">
                                <textarea name="teacher_comments" id="editor">
                                    {{$result->teacher_comments}}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ваш комментарий </label>
                            <div class="col-sm-9">
                                <input name="result" value="{{$result->result}}" type="number" min="0" max="10" class="form-control" placeholder="Ваш рейтинг" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="1">Успешно сдал!</option>
                                    <option value="-1">Пересдача!</option>

                                </select>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">Проверено!</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

