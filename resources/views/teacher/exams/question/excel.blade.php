@extends('teacher.layout')
@section('content')
    <a href="{{route("question.index")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.new_question")}}</strong>(EXCEL)</h3>
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
                    <form id="my-form" action="{{route("question.excel-store")}}" method="post" enctype="multipart/form-data"  class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.quiz")}}</label>
                            <div class="col-sm-9">
                                <select name="quiz_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @foreach($quizzes as $quiz)
                                        <option value="{{$quiz->id}}">{{$quiz->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.file")}} EXCEL</label>
                            <div class="col-sm-9">
                                <div class="customFile">
                                    <span class="selectedFile">{{__("admin.no_selected")}}</span>
                                    <input type="file" name="file">
                                </div>
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

