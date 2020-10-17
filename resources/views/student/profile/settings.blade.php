@extends('student.layout')
@section('content')
    <div class="page page-forms-common">
        <div class="row">
            <div class="col-md-8">
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
                                <div class="col-sm-10">
                                <span class="btn btn-raised btn-success fileinput-button">
												<i class="glyphicon glyphicon-plus"></i>
												<span>Аватар</span>
												<input type="file" name="avatar" >
								</span>
                                </div>
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
            <div class="col-md-4 col-sm-12 col-xs-12">
                <section class="boxs user_widget">
                    <div class="uw_header l-blush">
                        <h3>{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                        <h5>Студент</h5>
                    </div>
                    <div class="uw_image"><img class="img-circle" src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="User Avatar" width="120" height="120">
                    </div>
                    <div class="uw_footer">
                        <div class="text-center">
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                            <p class="mt-20">It is a long established fact that a reader will be content of a page</p>
                            <a href="#" class="btn btn-raised btn-info">Follow</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>3,521</h5>
                                    <span>SALES</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6 border-right">
                                <div class="uw_description">
                                    <h5>17,600</h5>
                                    <span>FOLLOWERS</span>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="uw_description">
                                    <h5>23</h5>
                                    <span>PRODUCTS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

