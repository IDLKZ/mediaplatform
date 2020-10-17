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
                    <form class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
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
                                <div id="editor"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Преимущества курса</label>
                            <div class="col-sm-9">
                                <select name="advantages" class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;"></select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />

                    </form>
                </div>
                <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                    <button type="submit" class="btn btn-raised btn-default" id="form4Submit">Сохранить</button>
                </div>
            </section>
        </div>
    </div>

@endsection