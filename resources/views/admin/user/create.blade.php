@extends('admin.layout')
@section('content')
    <a href="" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('content.new_user')}}</strong></h3>
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
                    <form id="my-form" action="{{route("user.store")}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_role')}}</label>
                            <div class="col-sm-9">
                                <select name="role_id" class="select-multi form-control mb-10" data-parsley-trigger="change" required="" style="width: 100%!important;">
                                    <option value="1">Администратор</option>
                                    <option value="2">Тьютор</option>
                                    <option value="3">Студент</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_name')}}</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" placeholder="{{__('content.user_name')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_email')}}</label>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" placeholder="{{__('content.user_email')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_phone')}}</label>
                            <div class="col-sm-9">
                                <input name="phone" type="phone" class="form-control" placeholder="{{__('content.user_phone')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_password')}}</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" class="form-control" placeholder="{{__('content.user_password')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('content.user_status')}}</label>
                            <div class="col-sm-9">
                                <div class="togglebutton">
                                    <label>
                                        <input name="status" type="checkbox" checked="">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group is-empty">
                            <label class="col-sm-2 control-label">{{__('content.user_img')}}</label>
                            <div class="customFile">
                                <span class="selectedFile">No file selected</span>
                                <input type="file" name="img">
                            </div>
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">

                            <button type="submit" id="btn-submit" class="btn btn-raised btn-default">{{__('content.save')}}</button>
                            <button type="reset" class="btn btn-raised btn-danger">{{__('content.clear')}}</button>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection

