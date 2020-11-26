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
                                <a href="{{route("main")}}">
                                    <i class="fa fa-dashboard"></i>
                                    <span>{{__('admin.sidebar.index')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-users")}}">
                                    <i class="fa fa-users"></i>
                                    <span>{{__('admin.sidebar.users')}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route("admin-media")}}">
                                    <i class="fa fa-film"></i>
                                    <span>{{__('admin.sidebar.media')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-media-news")}}">
                                    <i class="fa fa-list-alt"></i>
                                    <span>{{__('admin.sidebar.news')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-exams")}}">
                                    <i class="icon-puzzle"></i>
                                    <span>{{__('admin.sidebar.examination')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-request")}}">
                                    <i class="fa fa-question-circle-o"></i>
                                    <span>{{__('admin.sidebar.request')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("admin-search")}}">
                                    <i class="fa fa-search"></i>
                                    <span>{{__('admin.sidebar.search')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route("forums")}}">
                                    <i class="fa fa-forumbee"></i>
                                    <span>{{__('admin.sidebar.forum')}}</span>
                                </a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{route("logout")}}">
                                    <i class="fa fa-power-off"></i>
                                    <span>{{__('admin.sidebar.logout')}}</span>
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
