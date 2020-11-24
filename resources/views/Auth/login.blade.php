@extends('Auth.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                <div class="card card-signup">
                    <form id="my-form" class="form" method="post" action="{{route("sign-in")}}">
                        @csrf
                        <div class="header header-primary text-center">
                            <h4>Вход в кабинет</h4>
                            <div class="social-line">
                                <a href="{{route("sign-in-google")}}" class="btn btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="mt-0">JasQalam</h3>
                        <p class="help-block">Видеокурсы доступные всем</p>
                        <div class="content">
                            <div class="form-group">
                                <input name="email"  type="email" class="form-control underline-input" placeholder="Ваша почта">
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" placeholder="Пароль..." class="form-control underline-input">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes"> Запомнить меня</label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info btn-raised">Вход</button>
                        </div>
                        <a href="" class="btn btn-wd">Забыли пароль?</a>
                        <a href="{{route("register")}}" class="btn btn-wd">Зарегистрироваться</a>
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
