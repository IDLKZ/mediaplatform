@extends('admin.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>НОВЫЙ</strong> ВОПРОС</h3>
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
                    <form id="my-form" action="{{route("admin-question.store")}}" method="post" enctype="multipart/form-data"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Тест</label>
                            <div class="col-sm-9">
                                <select name="quiz_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($quizzes as $quiz)
                                        <option value="{{$quiz->id}}">{{$quiz->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Вопрос</label>
                            <div class="col-sm-9">
                                <textarea name="question" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">A</label>
                            <div class="col-sm-9">
                                <input name="A" type="text" class="form-control" placeholder="Ответ А" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">B</label>
                            <div class="col-sm-9">
                                <input name="B" type="text" class="form-control" placeholder="Ответ B" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">C</label>
                            <div class="col-sm-9">
                                <input name="C" type="text" class="form-control" placeholder="Ответ C" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">D</label>
                            <div class="col-sm-9">
                                <input name="D" type="text" class="form-control" placeholder="Ответ D" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">E</label>
                            <div class="col-sm-9">
                                <input name="E" type="text" class="form-control" placeholder="Ответ E" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ответ</label>
                            <div class="col-sm-9">
                                <select name="answer" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>


                        <hr class="line-dashed full-witdh-line" />


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">Сохранить</button>
                            <a href="{{route('admin-question.index')}}" class="btn btn-raised btn-primary">{{__('content.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection


