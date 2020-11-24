<div id="header">
    <header class="clearfix">
        <!-- Branding -->
        <div class="branding">
            <a class="brand" href="/teacher">
                <span>Jas Qalam</span>
            </a>
            <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <!-- Branding end -->

        <!-- Left-side navigation -->
        <ul class="nav-left pull-left list-unstyled list-inline">
            <li class="leftmenu-collapse">
                <a role="button" tabindex="0" class="collapse-leftmenu">
                    <i class="fa fa-outdent"></i>
                </a>
            </li>
            <li class="dropdown leftmenu-collapse">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-language"></i>
                </a>
                <div class="dropdown-menu pull-left panel-default pt-0 pb-0" role="menu">
                    <ul class="list-group mb-0">
                        <li class="list-group-item">
                            <a href="{{route('setlocale', ['lang' => 'kz'])}}" class="p-0 m-0" >Каз</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('setlocale', ['lang' => 'ru'])}}" class="p-0 m-0" >Рус</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown leftmenu-collapse">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus mr-5"></i>
                </a>
                <div class="dropdown-menu pull-left panel panel-default" role="menu">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route("course.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-video-camera"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_course")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("video.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-vimeo"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_video")}}</span>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route("material.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-book"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_material")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("examination.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-question-circle-o"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_examination")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("question.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-question-circle-o"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_question")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("review-question.create")}}" role="button" class="media">
                                        <span class="pull-left media-object">
                                            <i class="fa fa-question-circle-o"></i>
                                        </span>
                                <div class="media-body">
                                    <span class="block">{{__("admin.header.new_reviewquestion")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>


        <!-- Right-side navigation -->
        <ul class="nav-right pull-right list-inline">

            <li class="dropdown nav-profile mr-5">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="Ava" class="0 size-30x30"> </a>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <div class="user-info">
                            <div class="user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                            <div class="user-position online">{{__("content.user.teacher")}}</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('home')}}" role="button" tabindex="0">
                            {{--                                <span class="label label-success pull-right">80%</span>--}}
                            <i class="fa fa-user"></i>{{__("content.profile.my_profile")}}</a>
                    </li>
                    <li>
                        <a role="button" tabindex="0" href="{{route('teacherSubscribers')}}">
                            <span class="label label-info pull-right">{{$subscribers}}</span>
                            <i class="fa fa-check"></i>{{__("content.profile.request")}}</a>
                    </li>
                    <li>
                        <a href="{{route('teacherProfileSettings')}}" role="button" tabindex="0">
                            <i class="fa fa-cog"></i>{{__("admin.profile.settings")}}</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{route('logout')}}" role="button" tabindex="0">
                            <i class="fa fa-sign-out"></i>{{__("admin.profile.logout")}}</a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- Right-side navigation end -->
    </header>
</div>
