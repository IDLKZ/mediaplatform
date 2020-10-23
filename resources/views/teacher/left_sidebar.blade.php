<aside id="leftmenu">
    <div id="leftmenu-wrap">
        <div class="panel-group slim-scroll" role="tablist">
            <div class="panel panel-default">
                <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <!--  NAVIGATION Content -->
                        <ul id="navigation">
{{--                            Главная--}}
                            <li class="active open">
                                <a href="index.html">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Главная</span>
                                </a>
                            </li>
{{--                            Главная--}}

{{--                            Видеокурсы--}}

                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-video-camera"></i>
                                    <span>Видеокурсы</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("course.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый видеокурс</a>
                                    </li>
                                    <li>
                                        <a href="{{route("course.index")}}">
                                            <i class="fa fa-angle-right"></i>Список видеокурсов</a>
                                    </li>

                                </ul>
                            </li>

{{--                            Видеокурсы--}}
                            {{--                            Видео--}}

                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-film "></i>
                                    <span>Видео</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("video.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новое видео</a>
                                    </li>
                                    <li>
                                        <a href="{{route("video.index")}}">
                                            <i class="fa fa-angle-right"></i>Список видео</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-book"></i>
                                    <span>Материалы</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("material.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый материал</a>
                                    </li>
                                    <li>
                                        <a href="{{route("material.index")}}">
                                            <i class="fa fa-angle-right"></i>Список Материалов</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-question"></i>
                                    <span>База тестов</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("quiz.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый Тест</a>
                                    </li>
                                    <li>
                                        <a href="{{route("quiz.index")}}">
                                            <i class="fa fa-angle-right"></i>Список Тестов</a>
                                    </li>
                                    <li>
                                        <a href="{{route("question.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый Вопрос</a>
                                    </li>
                                    <li>
                                        <a href="{{route("question.index")}}">
                                            <i class="fa fa-angle-right"></i>Список Вопросов</a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a href="{{route("review.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый Опрос</a>
                                    </li>
                                    <li>
                                        <a href="{{route("review.index")}}">
                                            <i class="fa fa-angle-right"></i>Список Опросов</a>
                                    </li>
                                    <li>
                                        <a href="{{route("review-question.create")}}">
                                            <i class="fa fa-plus-circle"></i>Новый Вопрос</a>
                                    </li>
                                    <li>
                                        <a href="{{route("review-question.index")}}">
                                            <i class="fa fa-angle-right"></i>Список Вопросов</a>
                                    </li>

                                </ul>
                            </li>

                            {{--                            Видео--}}



                        </ul>
                        <!--/ NAVIGATION Content -->
                    </div>
                </div>
            </div>
{{--            <div class="panel settings panel-default">--}}
{{--                <div class="panel-heading" role="tab">--}}
{{--                    <h4 class="panel-title">--}}
{{--                        <a data-toggle="collapse" href="#leftmenuControls">General Settings--}}
{{--                            <i class="fa fa-angle-up"></i>--}}
{{--                        </a>--}}
{{--                    </h4>--}}
{{--                </div>--}}
{{--                <div id="leftmenuControls" class="panel-collapse collapse in" role="tabpanel">--}}
{{--                    <div class="panel-body">--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <label class="col-xs-8">Switch ON</label>--}}
{{--                                <div class="col-xs-4 control-label">--}}
{{--                                    <div class="togglebutton">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" checked="">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <label class="col-xs-8">Switch OFF</label>--}}
{{--                                <div class="col-xs-4 control-label">--}}
{{--                                    <div class="togglebutton">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="milestone-sidbar">--}}
{{--                    <div class="text-center-folded">--}}
{{--                        <span class="pull-right pull-none-folded">60%</span>--}}
{{--                        <span class="hidden-folded">Milestone</span>--}}
{{--                    </div>--}}
{{--                    <div class="progress progress-xxs m-t-sm dk">--}}
{{--                        <div class="progress-bar progress-bar-info" style="width: 60%;"> </div>--}}
{{--                    </div>--}}
{{--                    <div class="text-center-folded">--}}
{{--                        <span class="pull-right pull-none-folded">35%</span>--}}
{{--                        <span class="hidden-folded">Release</span>--}}
{{--                    </div>--}}
{{--                    <div class="progress progress-xxs m-t-sm dk">--}}
{{--                        <div class="progress-bar progress-bar-primary" style="width: 35%;"> </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</aside>
