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
                                         Team
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
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.team.update', $about->id) }}"  >
                                            @csrf
                                            @method('put')



                                            <div  style="margin: 5px " class="row wow fadeInUp">
                                                <span style="width: 50%">
                                                <label for="name">Name
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text"  style="width: max-content;" class="form-control " id="name" name="name" value="{{$about->name}}">
                                                </span>
                                                <span style="width: 50%">
                                                <label for="job">Job
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text"  style="width: max-content;" class="form-control " id="job" name="job" value="{{$about->job}}">
                                                </span>
                                            </div>
<br>
                                            <div  style="margin: 5px " class="row wow fadeInUp">
                                                <span style="width: 50%">
                                                    <label for="fb">FaceBook
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"  style="width: max-content;" class="form-control " id="fb" name="fb" value="{{$about->fb}}">
                                                </span>
                                                <span style="width: 50%">
                                                    <label for="li">Linked In
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"  style="width: max-content;" class="form-control " id="li" name="li" value="{{$about->li}}">
                                                </span>
                                            </div>
                                            <br>

                                            <div  style="margin: 5px " class="row wow fadeInUp">
                                                <span style="width: 50%">
                                                <label for="gm">Gmail
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"  style="width: max-content;" class="form-control " id="gm" name="gm" value="{{$about->gm}}">

                                                </span>
                                                <span style="width: 50%">
                                                    <label for="ig">Instagram
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <input type="text"  style="width: max-content;" class="form-control " id="ig" name="ig" value="{{$about->ig}}">
                                                </span>
                                            </div>

                                            <br>

                                            <div class="col-6">
                                                <label for="ig">Photo
                                                    <span class="text-danger">*</span>
                                                </label>


                                                    <div class="custom-file">
                                                        <label for="" class="custom-file-label"  >{{$about->image}} </label>
                                                        <input type="file" name="image" id="file" class="custom-file-input"  >
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


