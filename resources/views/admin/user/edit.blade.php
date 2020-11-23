@extends('admin.layout')
@section('content')
    <!-- bradcome -->
    <div class="row">
        <div class="col-md-12">
            <section class="boxs">
                <div class="boxs-header">
                    <h3 class="custom-font hb-blush">
                        <strong>{{__('admin.edit_user')}}</strong></h3>
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
                    <form id="my-form" action="{{route("user.update",$user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="form4" role="form" id="form4" data-parsley-validate>
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_role')}}</label>
                            <div class="col-sm-9">
                                <input disabled type="text" class="form-control" value="{{$user->role->title}}" required>
                            </div>
                        </div>
                        <hr class="line-dashed full-witdh-line" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_name')}}</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" placeholder="{{__('admin.user_name')}}" maxlength="255" data-parsley-trigger="change" value="{{$user->name}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_email')}}</label>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" placeholder="{{__('admin.user_email')}}" maxlength="255" data-parsley-trigger="change" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_phone')}}</label>
                            <div class="col-sm-9">
                                <input name="phone" type="phone" class="form-control" placeholder="{{__('admin.user_phone')}}" maxlength="255" data-parsley-trigger="change" value="{{$user->phone}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_password')}}</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" class="form-control" placeholder="{{__('admin.user_password')}}" maxlength="255" data-parsley-trigger="change" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="editor">
                                    {!! $user->description  !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{__('admin.user_status')}}</label>
                            <div class="col-sm-9">
                                <div class="togglebutton">
                                    <label>
                                        <input name="status" type="checkbox" checked="{{$user->status == 1 ? true : false}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group is-empty">
                            <label class="col-sm-2 control-label">{{__('admin.user_img')}}</label>
                            <div class="customFile">
                                <span class="selectedFile">{{__('admin.no_img')}}</span>
                                <input type="file" name="img">
                            </div>
                            <img src="{{$img = $user->img != null ? $user->img : "/images/no-image.png"}}" height="150px" width="150px">
                        </div>

                        <div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">

                            <button type="submit" id="btn-submit" class="btn btn-raised btn-info">{{__('admin.save')}}</button>
                            <a href="{{route("admin-users")}}" class="btn btn-raised btn-primary">{{__('admin.back')}}</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
    </div>

@endsection


