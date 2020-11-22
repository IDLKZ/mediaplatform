<aside id="leftmenu">
    <div id="leftmenu-wrap">
        <div class="panel-group slim-scroll" role="tablist">
            <div class="panel panel-default">
                <div id="leftmenuNav" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <!--  NAVIGATION Content -->
                        <ul id="navigation">
                            {{--                            Главная--}}
                            <li>
                                <a href="/admin">
                                    <i class="fa fa-dashboard"></i>
                                    <span>{{__('website.main')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-users")}}">
                                    <i class="fa fa-users"></i>
                                    <span>Пользователи</span>
                                </a>
                            </li>
                            {{--                            Главная--}}
                            <li>
                                <a href="{{route("admin-media")}}">
                                    <i class="fa fa-film"></i>
                                    <span>Медиа</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-media-news")}}">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Новости</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-exams")}}">
                                    <i class="icon-puzzle"></i>
                                    <span>Экзамены</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-request")}}">
                                    <i class="fa fa-question-circle-o"></i>
                                    <span>Запросы</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-search")}}">
                                    <i class="fa fa-search"></i>
                                    <span>Поиск</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("forums")}}">
                                    <i class="fa fa-forumbee"></i>
                                    <span>Форум</span>
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
                        <!--/ NAVIGATION Content -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
