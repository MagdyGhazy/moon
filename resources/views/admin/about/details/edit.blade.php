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
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.details.update', $about->id) }}">
                                            @csrf
                                            @method('put')



                                            <div class="col-12 mb-2">
                                                <label for="title_ar">Title
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text"  style="width: max-content;" class="form-control " id="title_ar" name="title" value="{{$about->title}}"required>
                                            </div>

                                            <div class="col-12 mb-2" >
                                                <div class="form-group" >
                                                    <label  for="settings.has_margins">Icon</label>
                                                    <select class="form-control " name="icon" id="settings.has_margins">

                                                        <option @if($about->icon =="shopping-bag") selected @endif><i class="fa fa-shopping-bag">shopping-bag</i></option>
                                                        <option @if($about->icon =="shopping-cart") selected @endif><i class="fa fa-shopping-cart">shopping-cart</i></option>
                                                        <option @if($about->icon =="photo") selected @endif><i class="fa fa-photo">photo</i></option>
                                                        <option @if($about->icon =="plane") selected @endif><i class="fa fa-plane">plane</i></option>
                                                    </select>

                                                </div>
                                            </div>


                                          <div  class="col-12 mb-2">
                                              <label for="description_ar">Discription
                                                  <span class="text-danger">*</span>
                                              </label>
                                              <textarea class="form-control"rows="3" name="discription">{{$about->discription}}</textarea>
                                          </div><br>
                                            <div class="col-sm-9 offset-sm-3 mt-2">
                                                <button type="submit" class="btn btn-primary mr-1">{{__('messages.static.save')}}</button>
                                                <button type="reset" class="btn btn-outline-secondary">{{__('messages.static.reset')}}</button>
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


