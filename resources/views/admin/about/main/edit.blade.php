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
                            <h2 class="content-header-title float-left mb-0">{{ __('messages.static.edit') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">{{ __('labels.fields.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                         About Us
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
                                        <form class="form form-horizontal" method="post" action="{{ route('admin.main.update', $about->id) }}" enctype="multipart/form-data">
                                            @csrf

                                            @method('put')
                                            <div class="row">
                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Title
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"  name="title" id="category_id" class="form-control" value="{{$about->title}}">

                                                    </div>
                                                </div>


                                                <div class="col-12 mb-2">
                                                    <label for="section">Image
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="custom-file">
                                                        <label for="" class="custom-file-label">{{$about->image}}</label>
                                                        <input type="file" name="image" id="file" class="custom-file-input">
                                                    </div>
                                                </div>




                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Discription
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <textarea name="discription" id="category_id" class="form-control" >{{$about->discription}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9 offset-sm-3 mt-2">
                                                    <button type="submit" class="btn btn-primary mr-1">{{__('messages.static.save')}}</button>
                                                    <button type="reset" class="btn btn-outline-secondary">{{__('messages.static.reset')}}</button>
                                                </div>
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


