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
                            <h2 class="content-header-title float-left mb-0">Team</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">{{ __('labels.fields.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                         Contact Us
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
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.contact.update', $about->id) }}">
                                            @csrf
                                            @method('put')



                                            <div class="row">
                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"  name="name" id="name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Email
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"  name="email" id="email" class="form-control">
                                                    </div>
                                                </div>


                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Subject
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"  name="subject" id="subject" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-2" >
                                                    <div class="form-group" >
                                                        <label for="section">Message
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"  name="message" id="message" class="form-control">
                                                    </div>
                                                </div>

                                                        <div >
                                                            <button type="submit"class="btn btn-info">update</button>
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


