@extends('teacher.layout')
@section('content')
    <a href="{{route("video.index")}}" class="btn btn-raised btn-info">Назад</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>ИЗМЕНИТЬ</strong> ВИДЕО</h3>
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
                    <form id="my-form" action="{{route("video.update",$video->alias)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс</label>
                            <div class="col-sm-9">
                                <select name="course_id" class="form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование курса</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование курса" maxlength="255" data-parsley-trigger="change" required value="{{$video->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Описание курса</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $video->description !!}
                                </textarea>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Номер видео</label>
                            <div class="col-sm-9">
                                <input name="count" type="number" min="1" class="form-control" placeholder="№ Видео" maxlength="500" data-parsley-trigger="change" required value="{{$video->count}}">
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
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Видео</span>
												<input type="file" name="video_url" >
								</span>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">Изменить курс</button>
                            <button type="reset" class="btn btn-raised btn-danger">Очистить поля</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
