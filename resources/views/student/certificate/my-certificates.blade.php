@extends('student.layout')
@section('content')

    <div class="col-md-4 col-sm-12">
        @include('student.left_sidebar')
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="p-4 row">
            @if (count($certificates) > 0)
                @foreach($certificates as $certificate)
                    <div class="col-md-6 text-center">
                        <img src="{{$certificate->course->img}}" alt="{{$certificate->course->title}}" style="width: 85%; height: 85%">
                        <a href="{{route('getCertificate', $certificate->course->id)}}" class="btn btn-raised btn-info">Получить сертификат</a>
                    </div>
                @endforeach
            @else
                Сертификатов нет
            @endif

        </div>
    </div>

@endsection
