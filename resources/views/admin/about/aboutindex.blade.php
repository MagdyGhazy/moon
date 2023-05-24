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
                            <h2 class="content-header-title float-left mb-0"> About Us</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.fields.dashboard')}}</a>
                                    </li>

                                    <li class="breadcrumb-item active">
                                      about us
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
                                        <a title="{{__('messages.static.create')}}"  id="create-btn" href="{{route('admin.about.create')}}"
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
                                            <th scope="col">title</th>
                                            <th scope="col">discription</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($abouts as $about)
                                            <tr>
                                                <td>
                                                    {{$about->id}}
                                                </td>

                                                <td>
                                                    <ul>
                                                        @foreach(getLangs() as $lang => $config)
                                                            <li>
                                                                {{$about->title}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>

                                                <td>
                                                    <ul>
                                                        @foreach(getLangs() as $lang => $config)
                                                            @if($about->discription)
                                                                <li>
                                                                    {{$about->discription}}
                                                                </li>

                                                            @else
                                                                /
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>

                                                <td>
                                                    @can('edit-category')
                                                        <a title="{{__('messages.static.edit')}}"
                                                           href="{{route('admin.about.edit',$about->id)}}">
                                                            <i class="mr-50 fas fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete-category')
                                                        <a title="{{__('messages.static.delete')}}"
                                                           onclick="deleteItem({{$about->id}})" href="{{route('admin.about.destroy',$about->id)}}">
                                                            <i class="mr-50 fas fa-trash"></i>
                                                        </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
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
