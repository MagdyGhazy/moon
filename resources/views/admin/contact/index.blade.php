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
                            <h2 class="content-header-title float-left mb-0"> Contact Us</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.fields.dashboard')}}</a>
                                    </li>

                                    <li class="breadcrumb-item active">
                                        Contact Us
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
                                            <th scope="col"style="width: 5%;text-align: center">#</th>
                                            <th scope="col"style="width: 15%;text-align: center">name</th>
                                            <th scope="col"style="width: 20%;text-align: center">email</th>
                                            <th scope="col"style="width: 10%;text-align: center">subject</th>
                                            <th scope="col"style="width: 30%;text-align: center">message</th>
                                            <th scope="col"style="width: 20%;text-align: center">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                        @foreach($contacts as $contact)
                                                <?php $i++; ?>
                                            <td style="width: 5%;align-content: center">{{ $i }}</td>
                                            <td style="width: 15%;align-content: center">{{$contact->name}}</td>
                                            <td style="width: 20%;align-content: center">{{$contact->email}}</td>
                                            <td style="width: 10%;align-content: center">{{$contact->subject}}</td>
                                            <td style="width: 30%;align-content: center">{{$contact->message}}</td>
                                            <td style="width: 20%;align-content: center">
                                                <div class="row wow fadeInUp" style="justify-content: right ">



                                                    <span>
                                                    <form action="{{route('admin.contact.destroy',$contact->id)}}" method="post">

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
