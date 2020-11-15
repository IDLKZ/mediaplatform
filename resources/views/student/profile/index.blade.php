@extends('student.layout')
@section('content')
    <div class="col-md-4 col-sm-12">
        @include('student.left_sidebar')
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Имя</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{\Illuminate\Support\Facades\Auth::user()->email}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Номер телефона</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{\Illuminate\Support\Facades\Auth::user()->phone}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Адрес</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{\Illuminate\Support\Facades\Auth::user()->description}}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form action="{{route('userUpdateProfile')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                <div class="col-sm-10 mb-4">
                    <input type="text" name="name" class="form-control" id="inputName">
                </div>
                <label for="inputPhone" class="col-sm-2 col-form-label">Номер телефона</label>
                <div class="col-sm-10 mb-4">
                    <input type="text" name="phone" class="form-control" id="inputPhone">
                </div>
                <label for="inputAddress" class="col-sm-2 col-form-label">Адрес</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="inputAddress">
                </div>
            </div>
            <input type="hidden" name="status" value="1">
            <button class="btn btn-primary mt-4 ml-auto">Сохранить</button>
        </form>
    </div>
@endsection
