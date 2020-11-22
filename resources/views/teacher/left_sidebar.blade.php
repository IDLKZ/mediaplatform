<aside id="leftmenu">
    <div id="leftmenu-wrap">
        <div class="panel-group slim-scroll" role="tablist">
            <div class="panel panel-default">
                <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">

                        <ul id="navigation">
                            {{--Главная--}}
                            <li>
                                <a href="/teacher">
                                    <i class="fa fa-dashboard"></i>
                                    <span>{{__('website.main')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-tasks")}}">
                                    <i class="fa fa-list-ol"></i>
                                    <span>Мои задачи</span>
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
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
