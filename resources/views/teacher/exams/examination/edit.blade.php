@extends('teacher.layout')
@section('content')
    <a href="{{route("teacher-exams")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("admin.exam")}}</strong></h3>
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
                            <label class="col-sm-3 control-label">{{__("admin.course")}}</label>
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
                            <label class="col-sm-3 control-label">{{__("admin.video")}}</label>
                            <div class="col-sm-9">
                                <select id="video_select" name="video_id" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option selected value="{{$examination->video_id}}">{{$examination->video->title}}</option>
                                    <option>{{__("admin.no_selected")}}</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group" >
                            <label class="col-sm-3 control-label">{{__("admin.exam_type")}}</label>
                            <div class="col-sm-9">
                                <select id="exam_type" name="type" class="form-control mb-10 select-multi" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option>{{__("admin.no_selected")}}</option>
                                    <option {{$examination->quiz_id != null ? "selected" : ""}} value="test">{{__("admin.quiz")}}</option>
                                    <option  {{$examination->review_id != null ? "selected" : ""}}  value="review">{{__("admin.review")}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="videos">
                            <label class="col-sm-3 control-label">{{__("admin.base_quiz")}}</label>
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
                                    <option>{{__("admin.no_selected")}}</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.exam_title")}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__("admin.exam_title")}}" maxlength="255" data-parsley-trigger="change" required value="{{$examination->title}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.exam_description")}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $examination->description !!}
                                </textarea>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("admin.materials")}}</label>
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
                            <a href="{{route("examination.index")}}" class="btn btn-raised btn-primary">{{__("admin.back")}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

