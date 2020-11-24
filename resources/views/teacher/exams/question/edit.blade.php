@extends('teacher.layout')
@section('content')
    <a href="{{route("question.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.edit_question")}}</strong></h3>
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
                    <form id="my-form" action="{{route("question.update",$question->id)}}" method="post" enctype="multipart/form-data"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.quiz")}}</label>
                            <div class="col-sm-9">
                                <select name="quiz_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="{{$question->quiz_id}}">{{$question->quiz->title}}</option>
                                    @foreach($quizzes as $quiz)
                                        @if ($quiz->id != $question->quiz_id)
                                            <option value="{{$quiz->id}}">{{$quiz->title}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.questions")}}</label>
                            <div class="col-sm-9">
                                <textarea name="question" id="editor">
                                    {!! $question->question !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">A</label>
                            <div class="col-sm-9">
                                <input name="A" type="text" class="form-control" placeholder="Ответ А" maxlength="255" data-parsley-trigger="change" required value="{{$question->A}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">B</label>
                            <div class="col-sm-9">
                                <input name="B" type="text" class="form-control" placeholder="Ответ B" maxlength="255" data-parsley-trigger="change" required value="{{$question->B}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">C</label>
                            <div class="col-sm-9">
                                <input name="C" type="text" class="form-control" placeholder="Ответ C" maxlength="255" data-parsley-trigger="change" required value="{{$question->C}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">D</label>
                            <div class="col-sm-9">
                                <input name="D" type="text" class="form-control" placeholder="Ответ D" maxlength="255" data-parsley-trigger="change" required value="{{$question->D}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">E</label>
                            <div class="col-sm-9">
                                <input name="E" type="text" class="form-control" placeholder="Ответ E" maxlength="255" data-parsley-trigger="change" required value="{{$question->E}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.answer")}}</label>
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
                            <button type="submit" class="btn btn-raised btn-info">{{__("admin.save")}}</button>
                            <a href="{{route("question.index")}}" class="btn btn-raised btn-primary">{{__("admin.back")}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

