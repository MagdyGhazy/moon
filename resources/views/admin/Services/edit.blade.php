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
                                        <a href="#"> about us</a>
                                    </li>

                                    <li class="breadcrumb-item active">
                                        {{ __('messages.static.edit') }}
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
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.servces.update',$Service->id )}}">
                                            @csrf
                                            @method('put')



                                            <div  style="margin: 5px ">
                                                <label for="Services">Services
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text"  style="width: max-content;" class="form-control " id="Services" name="Services" value="{{$Service->Services}}"required>
                                            </div>
                                            <div  style="margin: 5px ">
                                                <label for="icon">icon
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text"  style="width: max-content;" class="form-control " id="Services" name="icon" value="{{$Service->icon}}"required>
                                            </div>


                                            <div  style="margin: 5px">
                                                <label for="discription">discription
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control"rows="3" name="ServicesDiscription">{{$Service->ServicesDiscription}}</textarea>
                                            </div><br>

                                            <div >
                                                <button type="submit"class="btn btn-danger">update</button>
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



