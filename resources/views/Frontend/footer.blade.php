<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="margin-50"></div>
                <ul class="row text-left">
                    <div class="row desk-none footer-logos">
                        <a href="https://fnn.kz/ru/main/index"><img src="/frontend/images/nazarbaev_foundation.png" alt="" width="95" height="100"></a>
                        <a href="https://jascongress.kz/"><img src="/frontend/images/jascongress.png" alt="" width="75" height="100"></a>
                    </div>

                    <li class="mob-none">
                        <a href="https://fnn.kz/ru/main/index"><img src="/frontend/images/nazarbaev_foundation.png" alt="" width="95" height="100"></a>
                    </li>

                    <li class="mob-none">
                        <a href="https://jascongress.kz/"><img src="/frontend/images/jascongress.png" alt="" width="75" height="100"></a>
                    </li>

                    <li class="text-center">
                        <a href="{{route('student.course')}}">{{__('front.courses')}}</a>
                    </li>
                    <li class="">
                        <a href="{{route('student.checkedResult')}}">{{__('front.exam')}}</a>
                    </li>
{{--                    <li class="text-center">--}}
{{--                        <a href="{{route('frontDiscussion')}}">Отзывы</a>--}}
{{--                    </li>--}}
                    <li class="text-center">
                        <a href="{{route('forums')}}">{{__('front.discuss')}}</a>
                    </li>
                    <li class="text-center">
                        <a href="{{route('myCertificates')}}">{{__('front.certificate')}}</a>
                    </li>
                    <div class="row desk-none footer-logos mt-2 mr-3">
                        <a href="https://www.youtube.com/channel/UCh4-ssE18BF8J9MpjRJO-9A" class="social-icon">
                            <img src="/frontend/images/youtube-icon.png" alt="">
                        </a>
                        <a href="https://t.me/joinchat/AAAAAE3svOAMRAZa7DR06g" class="social-icon">
                            <img src="/frontend/images/telegram-icon.png" alt="">
                        </a>
                        <a href="https://instagram.com/jas.qalam?igshid=2tuqr1xe6j01" class="social-icon">
                            <img src="/frontend/images/instagram-icon.png" alt="">
                        </a>
                    </div>
                </ul>
            </div>
            <div class="col-md-3 mob-none">
                <div class="row justify-content-center">
                    <div class="margin-50"></div>
                    <a href="https://www.youtube.com/channel/UCh4-ssE18BF8J9MpjRJO-9A" class="social-icon">
                        <img src="/frontend/images/youtube-icon.png" alt="">
                    </a>
                    <a href="https://t.me/joinchat/AAAAAE3svOAMRAZa7DR06g" class="social-icon">
                        <img src="/frontend/images/telegram-icon.png" alt="">
                    </a>
                    <a href="https://instagram.com/jas.qalam?igshid=2tuqr1xe6j01" class="social-icon">
                        <img src="/frontend/images/instagram-icon.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="margin-25"></div>
        <div class="row">
            <div class="col-md-2 col-sm-12">
                © Jas Qalam
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="row justify-content-end pr-2">
                    <a href="#" class="footer-info">{{__('front.contract')}}</a>
{{--                    <a href="#" class="footer-info">{{__('front.payment')}}</a>--}}
                    <a href="#" class="footer-info">{{__('front.privacy_policy')}}</a>
                </div>
            </div>
        </div>
        <div class="margin-25"></div>
    </div>
</footer>
