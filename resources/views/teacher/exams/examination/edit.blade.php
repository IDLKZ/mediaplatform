@extends('teacher.layout')
@section('content')

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>ИЗМЕНИТЬ</strong> ЭКЗАМЕН</h3>
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
                    <form id="my-form" action="{{route("examination.update",$examination->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <select id="courses" name="course_id" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="{{$examination->course_id}}">{{$examination->course->title}}</option>
                                    @foreach($courses as $course)
                                        @if ($course->id != $examination->course_id)
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <select id="video_select" name="video_id" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option selected value="{{$examination->video_id}}">{{$examination->video->title}}</option>
                                    <option>Не выбрано</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group" >
                            <label class="col-sm-3 control-label">Тип экзамена</label>
                            <div class="col-sm-9">
                                <select id="exam_type" name="type" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>Не выбрано</option>
                                    <option {{$examination->quiz_id != null ? "selected" : ""}} value="test">Тест</option>
                                    <option  {{$examination->review_id != null ? "selected" : ""}}  value="review">Опрос</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">База вопросов</label>
                            <div class="col-sm-9">
                                <select id="examination_select"
                                        @if ($examination->quiz_id)
                                            name="quiz_id"
                                        @elseif ($examination->review_id)
                                        name="review_id"
                                        @endif

                                        class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @if ($examination->quiz_id)
                                        <option selected="selected" value="{{$examination->quiz_id}}">{{$examination->quiz->title}}</option>
                                    @elseif ($examination->review_id)
                                        <option selected="selected" value="{{$examination->review_id}}">{{$examination->review->title}}</option>
                                    @endif
                                    <option>Не выбрано</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование Экзамена</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование Экзамена" maxlength="255" data-parsley-trigger="change" required value="{{$examination->title}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Описание Экзамена</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $examination->description !!}
                                </textarea>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Материал к Экзамену</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Файл</span>
												<input type="file" name="file" >
								</span>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">Сохранить</button>
                            <a href="{{route("examination.index")}}" class="btn btn-raised btn-primary">Назад</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

