@extends('admin.layout')
@section('content')
    <a href="{{route("admin-media-news")}}" class="btn btn-raised btn-info">{{__("content.back")}}</a>
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>Категории</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        @if ($categories->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th colspan="4">Наименование</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td colspan="4">{{$category->title}}</td>
                                            <td >
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a  href="{{route("admin-category.edit",$category->id)}}">
                                                                {{__('content.edit')}}
                                                            </a>
                                                        </li>

                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{route('admin-category.destroy',$category->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                                                    {{__('content.delete')}}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        @else
                            <h1>Категорий пока нет</h1>
                        @endif

                    </div>
                </section>
            </div>
        </div>
    </div>
    <a href="{{route("admin-category.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection


