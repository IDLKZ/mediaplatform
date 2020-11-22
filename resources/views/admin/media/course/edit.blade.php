@extends('admin.layout')
@section('content')
    <div class="page page-dashboard">

    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__("content.course_change")}}</strong></h3>
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
                    <form id="my-form"  method="post" action="{{route('admin-course.update',$course->alias)}}" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_author")}}</label>
                            <div class="col-sm-9">
                                <select class="course_author form-control" name="author_id"  data-parsley-trigger="change" required="" style="width: 100%!important;">
                                <option value="{{$course->author->id}}" selected>{{$course->author->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Наименование курса</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="Наименование курса" maxlength="255" data-parsley-trigger="change" required value="{{$course->title}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_subtitle")}}</label>
                            <div class="col-sm-9">
                                <input name="subtitle" type="text" class="form-control" placeholder="{{__("content.course_subtitle")}}" maxlength="500" data-parsley-trigger="change" required value="{{$course->subtitle}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_description")}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $course->description !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_advantages")}}</label>
                            <div class="col-sm-9">
                                <select name="advantage[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @if (count($course->advantage))
                                        @foreach($course->advantage as $advantage)
                                            <option value="{{$advantage}}">
                                                {{$advantage}}
                                            </option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_requirement")}}</label>
                            <div class="col-sm-9">
                                <input name="requirement" type="text" class="form-control" placeholder="{{__("content.course_requirement")}}" maxlength="500" data-parsley-trigger="change" required value="{{$course->requirement}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_lang")}}</label>
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
                            <label class="col-sm-3 control-label">{{__("content.img")}}</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>{{__("content.img")}}</span>
												<input type="file" name="img" >
								</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__("content.course_status")}}</label>
                            <div class="col-sm-9">

                                <input type="checkbox" name="status"><span class="checkbox-material"><span class="check"></span></span>

                            </div>
                        </div>
                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-info">{{__("content.change")}}</button>
                            <a href="{{route("admin-course.index")}}" class="btn btn-raised btn-primary">{{__("content.back")}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>
    </div>

@endsection

