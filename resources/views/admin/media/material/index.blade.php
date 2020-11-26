@extends('admin.layout')
@section('content')
    <a href="{{route("admin-media")}}" class="btn btn-raised btn-info">{{__('admin.back')}}</a>
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__('admin.materials')}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        @if ($materials->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>Видео</th>
                                        <th>{{__('admin.filename')}}</th>
                                        <th>{{__('admin.material_type')}}</th>
                                        <th>{{__('admin.links')}}</th>
                                        <th>{{__('admin.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($materials as $material)
                                        <tr>
                                            <td>{{$material->video->title}}</td>
                                            <td>{{$material->title}}</td>
                                            <td>{{$material->type}}</td>
                                            <td>
                                                @if ($material->links)
                                                    @foreach($material->links as $link)
                                                        <a href="{{$link}}" target="_blank">{{$link}}</a>
                                                    @endforeach
                                                @else
                                                    <p>{{__('material.not_links')}}</p>
                                                @endif
                                            </td>
                                            <td colspan="2">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a  href="{{route("material",$material->id)}}">
                                                                {{__('admin.download')}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a  href="{{route("admin-material.edit",$material->id)}}">
                                                                {{__('admin.edit')}}
                                                            </a>
                                                        </li>

                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{route('admin-material.destroy',$material->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('{{__("admin.question")}}')" type="submit" class="btn btn-danger">
                                                                    {{__('admin.delete')}}</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$materials->links()}}
                        @else
                            <h3>{{__("admin.no_materials")}}</h3>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
    <a href="{{route("admin-material.create")}}" class="btn btn-success btn-raised  btn-add" >
        <i class="fa fa-plus"></i>
    </a>
@endsection

