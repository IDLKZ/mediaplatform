@extends('Auth.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                <div class="card card-signup">
                    <form id="my-form" class="form" method="post" action="{{route("new-password")}}">
                        @csrf
                        <div class="header header-primary text-center">
                            <h4>Забыли пароль?</h4>
                        </div>
                        <h3 class="mt-0">JasQalam</h3>
                        <p class="help-block">Видеокурсы доступные всем</p>
                        <div class="content">
                            <input name="id"  type="hidden" class="form-control underline-input" placeholder="Ваша почта" value="{{$forget->id}}">
                            <div class="form-group">
                                <input  type="text" class="form-control underline-input" placeholder="Ваша почта" value="{{$forget->user->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <input  type="email" class="form-control underline-input" placeholder="Ваша почта" value="{{$forget->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Пароль..." class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="Пароль..." class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info btn-raised">Восстановить</button>
                        </div>
                        {{--                        <a href="" class="btn btn-wd">Забыли пароль?</a>--}}
                        <a href="{{route("login")}}" class="btn btn-wd">Вход</a>
                        <a href="{{route("register")}}" class="btn btn-wd">Регистрация</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-20">
        <div class="container">
            <div class="col-lg-12 text-center">
            </div>
        </div>
    </footer>
@endsection

