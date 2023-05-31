@extends('admin.layouts.app')

@section('title', trans_choice('labels.models.category', 2))

@push('css')

@endpush

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Clients</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">{{ __('labels.fields.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Clients
                                    </li>

                                    <li class="breadcrumb-item active">
                                        Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row" id="table-head">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <button  title="{{__('messages.static.back')}}" onclick="document.location = '{{url()->previous()}}'" type="button" class="btn btn-icon btn-outline-info">
                                    <i data-feather='arrow-right'></i> back
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('messages.static.edit') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.client.update', $clients->id) }}" >
                                            @csrf
                                            @method('put')
                                            <div   class="col-12">
                                                <span style="width: 50%">
                                                    <label for="name" >Name
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <input type="text"   class="form-control " id="name" name="name" value="{{$clients->name}}">
                                                </span>
                                            </div>

                                            <br>
                                            <div class="col-12">
                                                <label for="logo">Logo
                                                    <span class="text-danger">*</span>
                                                </label>


                                                <div class="custom-file">
                                                    <label for="logo" class="custom-file-label"  >{{$clients->logo}} </label>
                                                    <input type="file" name="logo" id="file" class="custom-file-input"  >
                                                </div>
                                            </div><br><br>

                                            <div >
                                                <button type="submit"class="btn btn-info" >update</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


