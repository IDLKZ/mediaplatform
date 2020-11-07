<aside>
    <div class="card" style="width: 18rem;">
        <img src="{{\Illuminate\Support\Facades\Auth::user()->img != null ? \Illuminate\Support\Facades\Auth::user()->img : '/images/no-image.png'}}" class="card-img-top" alt="avatar">
        <div class="card-body">
            <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <p class="card-text text-success">Online</p>
        </div>
        <ul class="list-group list-group-flush">
            <a href="{{route('userProfile')}}"><li class="list-group-item"><i class="far fa-user mr-4"></i>Мой профиль</li></a>
            <a href=""><li class="list-group-item"><i class="far fa-bell mr-4"></i>Уведомления</li></a>
            <a href=""><li class="list-group-item"><i class="far fa-comments mr-4"></i>Комментарии</li></a>
            <a href="{{route('student.course')}}"><li class="list-group-item"><i class="fas fa-photo-video mr-4"></i>Курсы</li></a>
            <a href=""><li class="list-group-item"><i class="fas fa-award mr-4"></i>Сертификаты</li></a>
            <a href="{{route('userProfileSettings')}}"><li class="list-group-item"><i class="fas fa-cog mr-4"></i>Настройки</li></a>
        </ul>
    </div>
</aside>
