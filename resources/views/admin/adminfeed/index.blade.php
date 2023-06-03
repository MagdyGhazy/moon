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
                            <h2 class="content-header-title float-left mb-0"> Admin Feedback</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.fields.dashboard')}}</a>
                                    </li>

                                    <li class="breadcrumb-item active">
                                        Admin Feedback
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
                                        <a title="{{__('messages.static.create')}}"  id="create-btn" href="{{route('admin.adminfeed.create')}}"
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
                                            <th scope="col"style="width: 10%">#</th>
                                            <th scope="col"style="width: 20%">name</th>
                                            <th scope="col"style="width: 20%">comment</th>
                                            <th scope="col"style="width: 10%">image</th>
                                            <th scope="col"style="width: 20%">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                        @foreach($users as $user)
                                                <?php $i++; ?>
                                            <td style="width: 10%">{{ $i }}</td>
                                            <td style="width: 20%">{{$user->name}}</td>
                                            <td style="width: 20%">{{$user->comment}}</td>
                                            <td style="width: 15%;align-content: center"><img style="width: 40%" src="{{asset('img/'.$user->image)}}" class="img-fluid" alt=""></td>
                                            <td style="width: 20%;align-content: center">
                                                <div class="row wow fadeInUp" style="justify-content: right ">
                                                    <span>
                                                    <form action="{{route('admin.adminfeed.destroy',$user->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"class="btn btn-danger"> <i class="mr-50 fas fa-trash"></i></button>
                                                    </form>
                                                        </span>
                                                </div>
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
