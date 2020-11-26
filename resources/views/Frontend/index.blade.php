@extends('Frontend.layout')
@section('content')
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h1>{{__('front.title_1')}} <span>{{__('front.title_2_span')}}</span>
                        {{__('front.title_3')}} <span>{{__('front.title_4_span')}}</span>
                    </h1>
                    <p>Миссия: {{__('front.sub_title')}}</p>
                </div>
            </div>
        </div>

{{--        <div class="bottom-block">--}}
{{--            <div class="inner-bottom-block">--}}

{{--                <a href="{{route('frontAbout')}}">--}}
{{--                    <span class="material-icons">groups</span>--}}
{{--                    {{__('front.about')}}--}}
{{--                </a> </div>--}}
{{--            <div class="inner-bottom-block"><a href="#">--}}
{{--                    <a href="{{route('frontCourses')}}">--}}
{{--                        <span class="material-icons">cast</span>--}}
{{--                        {{__('front.courses')}}--}}
{{--                    </a>--}}
{{--                </a> </div>--}}
{{--            <div class="inner-bottom-block"><a href="{{route('frontExam')}}">--}}
{{--                    <span class="material-icons">attach_file</span>--}}
{{--                {{__('front.exam')}}--}}
{{--                </a> </div>--}}
{{--            <div class="inner-bottom-block"><a href="{{route('frontDiscussion')}}">--}}
{{--                    <span class="material-icons">comment</span>--}}
{{--                {{__('front.discuss')}}--}}
{{--                </a> </div>--}}
{{--            <div class="inner-bottom-block"><a href="{{route('frontCertificate')}}">--}}
{{--                    <span class="material-icons">verified</span>--}}
{{--                {{__('front.certificate')}}--}}
{{--                </a> </div>--}}
{{--        </div>--}}
    </section>
    <section id="main-second">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 text-center">
                    <img src="/frontend/images/dnn.png" alt="">
                </div>
                <div class="col-md-7 col-sm-12">
                    @if (\Illuminate\Support\Facades\App::getLocale() == 'kz')
                        <h2>
                            <span>«Jas Qalam»</span> форумында <br>
                            Д. Н. Назарбаеваның <br>
                            үндеуі
                        </h2>
                    @else
                        <h2>Обращение <br>
                            Назарбаевой Д.Н. <br>
                            на форуме <span>«Jas Qalam»</span></h2>
                    @endif

                    <div class="jumbotron">
                        «{{__('front.second_text')}}»
                    </div>
                    <p>- {{__('front.second_sub_text')}}</p>
                </div>
            </div>
        </div>
    </section>
    <section id="main-third">
        <div class="container">
            @if (\Illuminate\Support\Facades\App::getLocale() == 'kz')
            <h1><span>Jas Qalam</span> курстары</h1>
            @else
                <h1>Курсы в <span>Jas Qalam</span></h1>
                @endif
            <small><i>{{__('front.third_text')}}.</i></small><br>
            <hr>
            <b>{{__('front.third_text_2')}}:</b>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h5>{{__('front.blog_1')}}</h5>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background: #D6F0C9!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h5>{{__('front.blog_2')}}</h5><br>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #FBBFD0!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h5>{{__('front.blog_3')}}</h5>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #FFBFBF!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h5>{{__('front.blog_4')}}</h5>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background: #C0E6F8!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h5>{{__('front.blog_5')}}</h5>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <b>{{__('front.third_text_3')}}:</b>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #90CAF9!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h6><strong>{{__('front.blog_6')}}</strong></h6> <br>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #F9E299!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h6><strong>{{__('front.blog_7')}}</strong></h6> <br>
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-7.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #B4D7F6!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h6><strong>{{__('front.blog_8')}}</strong></h6> <br><br class="mob-none">
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-8.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="skill-blocks" style="background-color: #E5C0A8!important;">
                        <div class="row">
                            <div class="col-8">
                                <small>Блогер</small><br><br>
                                <h6><strong>{{__('front.blog_9')}}</strong></h6> <br> <br class="mob-none">
{{--                                <small>{{__('front.more_details')}}</small>--}}
                            </div>
                            <div class="col-4 row align-items-center">
                                <div class="circle">
                                    <img src="/frontend/images/skill-9.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section id="main-four">
        <div class="container">
            @if (\Illuminate\Support\Facades\App::getLocale() == 'kz')
                <h1><span>Jas Qalam</span> туралы пікірлер</h1>
            @else
                <h1>Отзывы о <span>Jas Qalam</span></h1>
            @endif

            <small><i>{{__('front.four_text')}}</i></small><br><br>
{{--                @if (\Illuminate\Support\Facades\App::getLocale() == 'kz')--}}
{{--                    <b>Біздің 30 дан 3 пікірлеріміз</b><br>--}}
{{--                @else--}}
{{--                    <b>Наши отзывы 3 из 30</b><br>--}}
{{--                @endif--}}

            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="demo mb-2" data-ytb-video="_IwSJFRnJvM"></div>
{{--                    <div class="review">--}}
{{--                        <div class="col-7">--}}
{{--                            <small>Блогер</small>--}}
{{--                            <h5>Ахматова Алина</h5>--}}
{{--                            <i>@instagram</i>--}}
{{--                        </div>--}}
{{--                        <div class="col-5"></div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="demo mb-2" data-ytb-video="5V1a3cz8ddA"></div>
{{--                    <div class="review">--}}
{{--                        <div class="col-7">--}}
{{--                            <small>Блогер</small>--}}
{{--                            <h5>Ахматова Алина</h5>--}}
{{--                            <i>@instagram</i>--}}
{{--                        </div>--}}
{{--                        <div class="col-5"></div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="demo mb-2" data-ytb-video="LDV4PYKtWSM"></div>
{{--                    <div class="review">--}}
{{--                        <div class="col-7">--}}
{{--                            <small>Блогер</small>--}}
{{--                            <h5>Ахматова Алина</h5>--}}
{{--                            <i>@instagram</i>--}}
{{--                        </div>--}}
{{--                        <div class="col-5"></div>--}}
{{--                    </div>--}}
                </div>
            </div>
{{--            <div class="text-center">--}}
{{--                <button class="btn btn-outline-info mt-4">{{__('front.all_reviews')}}</button>--}}
{{--            </div>--}}
        </div>
    </section>
    <section id="main-five">
        <div class="container">
            @if (\Illuminate\Support\Facades\App::getLocale() == 'kz')
                <h1><span>Jas Qalam</span> жаңалықтары</h1>
            @else
                <h1>Новости <span>Jas Qalam</span></h1>
            @endif

            <small><i>{{__('front.five_text')}}</i></small><br><br>
            <b>{{__('front.five_news')}}</b><br>
            <div class="row">
                @foreach($news as $new)
                <div class="col-md-4 col-sm-12">
                    <div class="blog">
                        <div class="col-8">
                            <div class="small">{{$new->category->title}}</div>
                            <h5><a class="text-white" href="{{route('frontSinglePost', $new->alias)}}">{{Str::substr($new->title, 0, 70)}}...</a></h5>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-md-4 col-sm-12">--}}
{{--                    <div class="blog" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/frontend/images/blog-2.png')">--}}
{{--                        <div class="col-8">--}}
{{--                            <div class="small">Подборка от Jas Qalam</div>--}}
{{--                            <h5>Главные тренды--}}
{{--                                Казахстана--}}
{{--                                2020 года</h5>--}}
{{--                        </div>--}}
{{--                        <div class="col-4"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-sm-12">--}}
{{--                    <div class="blog" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/frontend/images/blog-3.png')">--}}
{{--                        <div class="col-8">--}}
{{--                            <div class="small">Прямая речь</div>--}}
{{--                            <h5>Прямая речь--}}
{{--                                от основателя--}}
{{--                                Jas Qalam</h5>--}}
{{--                        </div>--}}
{{--                        <div class="col-8"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
{{--            <div class="text-center">--}}
{{--                <button class="btn btn-outline-info mt-4">{{__('front.all_news')}}</button>--}}
{{--            </div>--}}
        </div>
    </section>
    <section id="main-six">
        <div class="container">
            <div class="contact">
                <h2>{{__('front.six_text')}}</h2>
                <p>{{__('front.six_text_2')}}</p>
                <a href="{{route('login')}}" class="btn btn-info" id="button-auth">Авторизация</a>
            </div>
        </div>
    </section>
@endsection
