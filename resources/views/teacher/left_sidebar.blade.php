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
                                    <span>{{__('content.sidebar.index')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-tasks")}}">
                                    <i class="fa fa-list-ol"></i>
                                    <span>{{__('content.sidebar.tasks')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-users")}}">
                                    <i class="fa fa-users"></i>
                                    <span>{{__('content.sidebar.users')}}</span>
                                </a>
                            </li>
                            {{--                            Главная--}}
                            <li>
                                <a href="{{route("teacher-media")}}">
                                    <i class="fa fa-film"></i>
                                    <span>{{__('content.sidebar.media')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-exams")}}">
                                    <i class="icon-puzzle"></i>
                                    <span>{{__('content.sidebar.examination')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-request")}}">
                                    <i class="fa fa-question-circle-o"></i>
                                    <span>{{__('content.sidebar.request')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("teacher-search")}}">
                                    <i class="fa fa-search"></i>
                                    <span>{{__('content.sidebar.search')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("forums")}}">
                                    <i class="fa fa-forumbee"></i>
                                    <span>{{__('content.sidebar.forum')}}</span>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{route("logout")}}">
                                    <i class="fa fa-power-off"></i>
                                    <span>{{__('content.sidebar.logout')}}</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>
