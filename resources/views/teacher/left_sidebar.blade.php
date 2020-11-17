<aside id="leftmenu">
    <div id="leftmenu-wrap">
        <div class="panel-group slim-scroll" role="tablist">
            <div class="panel panel-default">
                <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">

                        <ul id="navigation">
                            {{--                            Главная--}}
                            <li>
                                <a href="/teacher">
                                    <i class="fa fa-dashboard"></i>
                                    <span>{{__('website.main')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-users")}}">
                                    <i class="fa fa-users"></i>
                                    <span>{{__('website.subscribers')}}</span>
                                </a>
                            </li>
                            {{--                            Главная--}}
                            <li>
                                <a href="{{route("teacher-media")}}">
                                    <i class="fa fa-film"></i>
                                    <span>Медиа</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-exams")}}">
                                    <i class="icon-puzzle"></i>
                                    <span>Экзамены</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-request")}}">
                                    <i class="fa fa-question-circle-o"></i>
                                    <span>Запросы</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-search")}}">
                                    <i class="fa fa-search"></i>
                                    <span>Поиск</span>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{route("logout")}}">
                                    <i class="fa fa-power-off"></i>
                                    <span>Выход</span>
                                </a>
                            </li>



                        </ul>
{{--                        <!--  NAVIGATION Content -->--}}
{{--                        <ul id="navigation">--}}
{{--                            Главная--}}
{{--                            <li class="active open">--}}
{{--                                <a href="index.html">--}}
{{--                                    <i class="fa fa-dashboard"></i>--}}
{{--                                    <span>{{__('website.main')}}</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            Главная--}}

{{--                            Видеокурсы--}}
{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-users"></i>--}}
{{--                                    <span>{{__('website.subscribers')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("confirmed_subscribers")}}">--}}
{{--                                            <i class="fa fa-user"></i>{{__('website.access_subscribers')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("unconfirmed_subscribers")}}">--}}
{{--                                            <i class="icon-ghost"></i>{{__('website.request_subscribers')}}</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-video-camera"></i>--}}
{{--                                    <span>{{__('website.courses')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("course.create")}}">--}}
{{--                                            <i class="fa fa-user"></i>{{__('website.add_course')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("course.index")}}">--}}
{{--                                            <i class="icon-ghost"></i>{{__('website.list_course')}}</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-check-circle"></i>--}}
{{--                                    <span>{{__('website.tasks')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("teacher.checkedResult")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.check_task')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("teacher.uncheckedResult")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.uncheck_task')}}</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            Видеокурсы--}}
{{--                                                        Видео--}}

{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-film "></i>--}}
{{--                                    <span>{{__('website.video')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("video.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.add_video')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("video.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.list_video')}}</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-book"></i>--}}
{{--                                    <span>{{__('website.materials')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("material.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.add_material')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("material.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.list_material')}}</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-question"></i>--}}
{{--                                    <span>{{__('website.quizzes')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("quiz.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.add_quiz')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("quiz.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.list_quiz')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("question.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>Новый Вопрос</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("question.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>Список Вопросов</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("question.excel-create")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>Загрузить Вопросы</a>--}}
{{--                                    </li>--}}
{{--                                    <hr>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("review.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.add_review')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("review.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.list_review')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("review-question.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>Новый Вопрос</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("review-question.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>Список Вопросов</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a role="button" tabindex="0">--}}
{{--                                    <i class="fa fa-check-square-o"></i>--}}
{{--                                    <span>{{__('website.exam')}}</span>--}}
{{--                                </a>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("examination.create")}}">--}}
{{--                                            <i class="fa fa-plus-circle"></i>{{__('website.add_exam')}}</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route("examination.index")}}">--}}
{{--                                            <i class="fa fa-angle-right"></i>{{__('website.list_exam')}}</a>--}}
{{--                                    </li>--}}


{{--                                </ul>--}}
{{--                            </li>--}}

{{--                                                        Видео--}}



{{--                        </ul>--}}
{{--                        <!--/ NAVIGATION Content -->--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
