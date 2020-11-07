@extends('admin.layout')
@section('content')
    <a href="{{route("user.show",$id)}}" class="btn btn-raised btn-info">{{__('content.back')}}</a>
    @if(!$courses->isEmpty())
                    @foreach($courses as $course)
                    <div class="col-md-12 col-sm-12  course-item mt-20">
                      <div class="row">
                          <div class="col-md-3 bg-slategray course-item-header p-lg-40">
                              <div class="course-item-image bg-white p-sm-10 ">
                                  <img src="{{$img = $course->img !=null ? $course->img :"/images/no-image.png" }}" alt="">
                              </div>
                          </div>
                          <div class="col-md-9 course-title">
                              <div class="col-md-12">
                                  <h3 class="text-blush">{{$course->title}}</h3>
                                  <small class="text-blush">Автор:{{$course->author->name}}</small><br>
                                  <small class="text-blush">Создано {{$course->created_at->diffForHumans()}}</small> |
                                  <small class="text-blush">Обновлено {{$course->updated_at->diffForHumans()}}</small>
                                  <hr class="mt-0">
                              </div>
                              <div class="col-md-9">
                                  <h5>{{$course->subtitle}}</h5>
                              </div>
                              <div class="col-md-3 text-center">
                                  <a href="{{route("user.show",$id)}}" class="btn btn-success btn-raised btn-round btn-sm m-2">
                                      <i class="fa fa-eye"></i>
                                      <small class="sm-none">Просмотр</small>
                                  </a>
                                  <a href="{{route("user.edit",$id)}}" class="btn btn-warning btn-raised btn-round btn-sm m-2">
                                      <i class="fa fa-pencil-square">  </i>
                                      <small class="sm-none">Изменить</small>
                                  </a>
                                  <form action="{{route("user.destroy",$id)}}" class="m-2" method="post">
                                      @method("DELETE")
                                      @csrf
                                      <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger btn-raised btn-round btn-sm m-2">
                                          <i class="fa fa-bitbucket pr-2">  </i>
                                          <small class="sm-none">Удалить</small>
                                      </button>
                                  </form>
                              </div>


                          </div>



                      </div>
                    </div>
                    @endforeach
                        @endif
@endsection

    <!--/ CONTENT -->

