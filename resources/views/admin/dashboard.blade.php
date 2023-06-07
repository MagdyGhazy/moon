@extends('admin.layouts.app')

@section('title', __('labels.fields.dashboard'))

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/style-rtl.css')}}">

@endpush

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->



                <!-- Stats Horizontal Card -->


                <!--/ Stats Horizontal Card -->


            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="{{asset('assets/admin/app-assets/vendors/js/charts/chart.min.js')}}"></script>
@endpush
