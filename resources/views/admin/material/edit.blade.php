@extends('admin.layout')
@section('content')
    <a href="{{route("admin-material.index")}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('content.change')}}</strong></h3>
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
                    <form id="my-form" action="{{route("admin-material.update",$material->id)}}" method="post"  enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        @method("PUT")

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Видео</label>
                            <div class="col-sm-9">
                                <select class="material-video form-control" name="video_id"  data-parsley-trigger="change" required="" style="width: 100%!important;">
                                <option value="{{$material->video->id}}">{{$material->video->title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.filename')}}</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" class="form-control" placeholder="{{__('content.filename')}}" maxlength="255" data-parsley-trigger="change" required value="{{$material->title}}">
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.additional_links')}}</label>
                            <div class="col-sm-9">
                                <select name="links[]" multiple class="select2 form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    @if ($material->links)
                                        @foreach($material->links as $link)
                                            <option value="{{$link}}">{{$link}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.material_type')}}</label>
                            <div class="col-sm-9">
                                <select name="type" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="Документ">Документ</option>
                                    <option value="Изображение">{{__('content.img')}}</option>
                                    <option value="Аудиозапись">{{__('content.material_audio')}}</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Другое">{{__('content.material_other')}}</option>
                                </select>
                            </div>
                        </div>

                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.material_video')}}</label>
                            <div class="col-sm-9">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Файл</span>
												<input type="file" name="file" >
								</span>
                            </div>
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
                            <button type="submit" class="btn btn-raised btn-default">{{__('content.change')}}</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection
