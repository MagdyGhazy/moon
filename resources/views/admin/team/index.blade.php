@extends('admin.layouts.app')

@section('title',trans_choice('labels.models.content',2))

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0"> Team</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.fields.dashboard')}}</a>
                                    </li>

                                    <li class="breadcrumb-item active">
                                     Team
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header ">
                                <div>
                                    @can('create-content')
                                        <a title="{{__('messages.static.create')}}"  id="create-btn" href="{{route('admin.team.create')}}"
                                           class="btn btn-icon btn-outline-primary">
                                            <i data-feather="plus"></i>  Add
                                        </a>
                                    @endcan
                                </div>


                            </div>

                            <div class="card-body">
                                <div class="card-tools">
                                    <form id="filter-form">
                                        <div class="row justify-content-end">
                                            @include('admin.layouts.partials.search')

                                            <div class="form-group mr-1 mt-2">
                                                <button type="submit"
                                                        class="btn btn-success">{{__('search')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">job</th>
                                            <th scope="col" >image</th>
                                            <th scope="col" >social</th>
                                            <th scope="col" style="text-align: center">handel</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                        @foreach($teams as $team)
                                        <tr>
                                                <?php $i++; ?>
                                            <td rowspan="4" style="width: 5%">{{ $i }}</td>
                                            <td rowspan="4" style="width: 15%">{{$team->name}}</td>
                                            <td rowspan="4" style="width: 15%">{{$team->job}}</td>
                                            <td rowspan="4" style="width: 15%">{{$team->image}}</td>
                                            <td style="width: 20%">{{$team->fb}}</td>
                                            <td rowspan="4" style="width: 20% ;align-content: center">
                                                <div class="row wow fadeInUp" style="justify-content: center ">
                                                        <span style="padding-left: 2%">
                                                               <a class="btn btn-primary" href="{{route('admin.team.edit', $team->id)}}" role="button"><i class="mr-50 fas fa-edit"></i></a>
                                                        </span>


                                                    <span  style="padding-left: 2%">
                                                    <form action="{{route('admin.team.destroy',$team->id)}}" method="post">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"class="btn btn-danger"> <i class="mr-50 fas fa-trash"></i></button>
                                                    </form>
                                                        </span>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td >{{$team->li}}</td>
                                        </tr>
                                        <tr>
                                            <td >{{$team->gm}}</td>
                                        </tr>
                                        <tr>
                                            <td >{{$team->ig}}</td>
                                        </tr>
                                        @endforeach
{{--                                        //////////////////////////////////////--}}

{{--                                        <tr>--}}
{{--                                            <td rowspan="4" >1</td>--}}
{{--                                            <td rowspan="4">Mark</td>--}}
{{--                                            <td rowspan="4">job</td>--}}
{{--                                            <td >fa</td>--}}

{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >tw</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >li</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >ig</td>--}}
{{--                                        </tr>--}}

{{--                                        //////////////////////////////////////--}}

{{--                                        <tr>--}}
{{--                                            <td rowspan="4" >1</td>--}}
{{--                                            <td rowspan="4">Mark</td>--}}
{{--                                            <td rowspan="4">job</td>--}}
{{--                                            <td >fa</td>--}}

{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >tw</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >li</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >ig</td>--}}
{{--                                        </tr>--}}

{{--                                        //////////////////////////////////////--}}

{{--                                        <tr>--}}
{{--                                            <td rowspan="4" >1</td>--}}
{{--                                            <td rowspan="4">Mark</td>--}}
{{--                                            <td rowspan="4">job</td>--}}
{{--                                            <td >fa</td>--}}

{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >tw</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >li</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td >ig</td>--}}
{{--                                        </tr>--}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@can('delete-content')
    @include('admin.layouts.partials.delete', ['route' => '/admin/contents/'])
@endcan
