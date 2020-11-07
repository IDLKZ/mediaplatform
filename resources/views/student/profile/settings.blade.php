@extends('student.layout')
@section('content')
    <div class="col-4">
        @include('student.left_sidebar')
    </div>
    <div class="col-8">
        <section class="boxs">
            <div class="boxs-header">
                <h3 class="custom-font hb-green">
                    <strong>Изменить </strong>данные</h3>
            </div>
            <div class="boxs-body">
                <form id="my-form" method="post" enctype="multipart/form-data" action="{{route('userProfileSettingsUpdate')}}" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group is-empty">
                        <label for="inputName" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName"
                                   placeholder="Имя" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                        </div>
                        <span class="material-input"></span>
                    </div>
                    <div class="form-group is-empty">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" disabled
                                   placeholder="Email Address" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                        </div>
                        <span class="material-input"></span>
                    </div>
                    <div class="form-group is-empty">
                        <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3"
                                   placeholder="Пароль">
                        </div>
                        <span class="material-input"></span>
                    </div>
                    <div class="form-group is-empty">
                        <label class="col-sm-2 control-label">Аватар</label>
                        <div class="customFile">
                            <span class="selectedFile">No file selected</span>
                            <input type="file" name="avatar">
                        </div>
                        <img style="margin-left: 40px; margin-top: 10px;" class="preview" src="{{\Illuminate\Support\Facades\Auth::user()->img}}" width="150" height="150"/>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-raised btn-primary">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

