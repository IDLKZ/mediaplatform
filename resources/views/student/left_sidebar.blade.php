<aside>
    <div class="card mob-none" style="width: 18rem;">
        <img src="{{\Illuminate\Support\Facades\Auth::user()->img != null ? \Illuminate\Support\Facades\Auth::user()->img : '/images/no-image.png'}}" class="card-img-top" alt="avatar">
        <div class="card-body">
            <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <p class="card-text text-success">Online</p>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('userProfile')}}"><li class="list-group-item"><i class="far fa-user mr-4"></i>Мой профиль</li></a>
            <a href="{{route('student.course')}}"><li class="list-group-item"><i class="fas fa-photo-video mr-4"></i>Мои курсы</li></a>
{{--            <a href=""><li class="list-group-item"><i class="far fa-bell mr-4"></i>Уведомления</li></a>--}}
            <a href="{{route('student.checkedResult')}}"><li class="list-group-item"><i class="far fa-check-square mr-4"></i>Экзамены и тесты</li></a>
            <a href="{{route('forums')}}"><li class="list-group-item"><i class="far fa-comments mr-4"></i>Обсуждения</li></a>
            <a href="{{route('myCertificates')}}"><li class="list-group-item"><i class="fas fa-award mr-4"></i>Сертификаты</li></a>
            <a href="{{route('userProfileSettings')}}"><li class="list-group-item"><i class="fas fa-cog mr-4"></i>Настройки</li></a>
        </ul>
    </div>
</aside>

<div class="desk-none">
    <div class="margin-50"></div>
    <div class="card">
        <div class="row no-gutters">
            <div class="col-4">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" width="100" height="100" alt="{{\Illuminate\Support\Facades\Auth::user()->name}}">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title">{{Auth::user()->name}}</h5>
                    <p class="card-text text-success">Online</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="menu-btn">&#9776; Меню профиля</div>
        </div>
    </div>

    <nav class="pushy pushy-left" data-focus="#target">
        <div class="menu-btn close-btn">&#10005;</div>
        <ul>
            <a href="{{route('userProfile')}}"><li><i class="far fa-user mr-4"></i>Мой профиль</li></a>
            <a href="{{route('student.course')}}"><li><i class="fas fa-photo-video mr-4"></i>Мои курсы</li></a>
            {{--            <a href=""><li class="list-group-item"><i class="far fa-bell mr-4"></i>Уведомления</li></a>--}}
            <a href="{{route('student.checkedResult')}}"><li><i class="far fa-check-square mr-4"></i>Экзамены и тесты</li></a>
            <a href="{{route('forums')}}"><li><i class="far fa-comments mr-4"></i>Обсуждения</li></a>
            <a href=""><li><i class="fas fa-award mr-4"></i>Сертификаты</li></a>
            <a href="{{route('userProfileSettings')}}"><li><i class="fas fa-cog mr-4"></i>Настройки</li></a>
        </ul>
    </nav>
</div>


