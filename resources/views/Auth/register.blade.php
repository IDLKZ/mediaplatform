@extends('Auth.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                <div class="card card-signup">
                    <form class="form" method="" action="">
                        <div class="header header-primary text-center">
                            <h4>Заявка на регистрацию</h4>
                            <div class="social-line">
{{--                                <a href="#" class="btn btn-just-icon">--}}
{{--                                    <i class="fa fa-facebook-square"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#" class="btn btn-just-icon">--}}
{{--                                    <i class="fa fa-twitter"></i>--}}
{{--                                </a>--}}
                                <a href="#" class="btn btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="mt-0">Falcon</h3>
                        <p class="help-block">Вводите свои данные:</p>
                        <div class="content">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ваше имя">
                            </div>
                            <div class="form-group text-left">
                                <label for="role">Кто вы?</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1">Спикер</option>
                                    <option value="2">Слушатель</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control underline-input" placeholder="Почта">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Пароль..." class="form-control" />
                            </div>
{{--                            <div class="checkbox">--}}
{{--                                <label>--}}
{{--                                    <input type="checkbox" name="optionsCheckboxes" checked> I agree to the--}}
{{--                                    <a href="javascript:;">Terms of Service</a> &amp;--}}
{{--                                    <a href="javascript:;">Privacy Policy</a>--}}
{{--                                </label>--}}
{{--                            </div>--}}
                        </div>
                        <div class="footer text-center mb-20">
                            <a href="javascript:void (0)" class="btn btn-info btn-raised">Отправить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-20">
                    <a href="login.html" class="text-uppercase text-white">В главную</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
