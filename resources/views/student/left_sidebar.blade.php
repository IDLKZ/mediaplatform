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
                                <a href="{{route('user')}}">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Главная</span>
                                </a>
                            </li>
{{--                            Главная--}}

{{--                            Видеокурсы--}}

                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-video-camera"></i>
                                    <span>Мои Видеокурсы</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("student.course")}}">
                                            <i class="fa fa-plus-circle"></i>Мои видеокурсы</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-angle-right"></i>Неподтвержденные видеокурсы</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a role="button" tabindex="0">
                                    <i class="fa fa-check-circle"></i>
                                    <span>Мои Результаты</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route("student.course")}}">
                                            <i class="fa fa-plus-circle"></i>Проверенные</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-angle-right"></i>Непроверенные</a>
                                    </li>

                                </ul>
                            </li>

{{--                            Видеокурсы--}}



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
