@extends('admin.layout')
@section('content')
    <a href="{{route("admin-examination.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.new_exam")}}</strong></h3>
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
                    <form id="my-form" action="{{route("admin-examination.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.course")}}</label>
                            <div class="col-sm-9">
                                <select class="course_admin form-control" name="course_id"  data-parsley-trigger="change" required="" style="width: 100%!important;"></select>

                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">{{__("admin.video")}}</label>
                            <div class="col-sm-9">
                                <select id="video_select" name="video_id" class="video_admin form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>{{__("admin.no_selected")}}</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group" >
                            <label class="col-sm-3 control-label">{{__("admin.exam_type")}}</label>
                            <div class="col-sm-9">
                                <select id="exam_type2" name="type" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>{{__("admin.no_selected")}}</option>
                                    <option value="test">{{__("admin.quiz")}}</option>
                                    <option value="review">{{__("admin.review")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">{{__("admin.base_quiz")}}</label>
                            <div class="col-sm-9">
                                <select id="examination_select"  class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>{{__("admin.no_selected")}}</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.exam_title")}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__("admin.exam_title")}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.exam_description")}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.material")}}</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>{{__("admin.file")}}</span>
												<input type="file" name="file" >
								</span>
                            </div>
                        </div>


                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__("admin.save")}}</button>
                            <a href="{{route('admin-examination.index')}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

