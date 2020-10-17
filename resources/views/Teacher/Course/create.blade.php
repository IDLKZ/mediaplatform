@extends('Teacher.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>НОВЫЙ</strong> ВИДЕОКУРС</h3>
                </div>
                <div class="boxs-body">
                    <form id="my-form" action="{{route("course.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование курса</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование курса" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Подзаголовок курса</label>
                            <div class="col-sm-9">
                                <input name="subtitle" type="text" class="form-control" placeholder="Наименование курса" maxlength="500" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Описание курса</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Преимущества курса</label>
                            <div class="col-sm-9">
                                <select name="advantage[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;"></select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Требования</label>
                            <div class="col-sm-9">
                                <input name="requirement" type="text" class="form-control" placeholder="Наименование курса" maxlength="500" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Язык курса</label>
                            <div class="col-sm-9">
                                <select name="language_id" class="form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->title}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Изображение курса</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Изображение</span>
												<input type="file" name="img" >
								</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Курс готов к выпуску</label>
                            <div class="col-sm-9">

                                <input type="checkbox" name="status"><span class="checkbox-material"><span class="check"></span></span>

                            </div>
                        </div>
                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">Сохранить</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
