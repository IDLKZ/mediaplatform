@extends('teacher.layout')
@section('content')
    <a href="{{route("video.index")}}" class="btn btn-raised btn-info">Назад</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>НОВОЕ</strong> ВИДЕО</h3>
                </div>
                <div class="boxs-body">

                    <form id="my-form" action="{{route("video.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <select id="courses" name="course_id" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>Не выбрано</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <select id="videos" name="video_id" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>Не выбрано</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group" >
                            <label class="col-sm-3 control-label">Тип экзамена</label>
                            <div class="col-sm-9">
                                <select name="type" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>Не выбрано</option>
                                    <option id="test">Тест</option>
                                    <option id="review">Опрос</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование видео</label>
                            <div class="col-sm-9">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Описание курса</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="col-sm-3 control-label">Ссылка на видео (Если есть)</label>--}}
                        {{--                            <div class="col-sm-9">--}}
                        {{--                                <input name="video_url" type="url" class="form-control" placeholder="Ссылка на видео" maxlength="255" data-parsley-trigger="change" required>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Номер видео</label>
                            <div class="col-sm-9">
                                <input name="count" type="number" min="1" class="form-control" placeholder="№ Видео" maxlength="500" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Разрешенный предпросмотр</label>
                            <div class="col-sm-9">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" checked="">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Видео курса</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Видео</span>
												<input type="file" name="video_url" id="uploadVideoFile" accept="video/*">
								</span>
                                <div id="videoSourceWrapper">
                                    <video style="width: 100%;" controls>
                                        <source id="videoSource"/>
                                    </video>
                                    <div id="uploadVideoProgressBar" style="height: 5px; width: 1%; background: #2781e9; margin-top: -5px;"></div>
                                </div>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">Сохранить</button>
                            <button type="reset" class="btn btn-raised btn-danger">Очистить поля</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

