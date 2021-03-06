@extends('teacher.layout')
@section('content')
    <div class="page static-page-tables">
        <div class="row">
            <div class="col-md-12">
                <section class="boxs">
                    <div class="boxs-header">
                        <h3 class="custom-font hb-green">
                            <strong>{{__("admin.open_access")}}</strong></h3>
                    </div>
                    <div class="boxs-body p-0">
                        @if ($userrequest->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>{{__("admin.subscriber")}}</th>
                                        <th>{{__("admin.video")}}</th>
                                        <th>{{__("admin.action")}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userrequest as $request)
                                        <tr>
                                            <td>{{$request->user->name}}</td>
                                            <td>{{$request->video->title}}</td>
                                            <td colspan="2">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-simple dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                        <div class="ripple-container"></div></a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a  href="{{route("requestVideo",$request->id)}}">
                                                                <i class="fa fa-eye"></i>
                                                                {{__("admin.watch")}}
                                                            </a>
                                                        </li>


                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
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

                        @else
                            <h3>{{__("admin.no_request")}}</h3>
                        @endif

                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection


