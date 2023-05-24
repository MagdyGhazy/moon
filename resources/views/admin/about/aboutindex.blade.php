@extends('admin.layouts.app')

@section('title', trans_choice('labels.models.notification', 2))

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">


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
                    <th scope="row">{{$about->id}}</th>
                    <td>{{$about->title}}</td>
                    <td>{{$about->discribtion}}</td>
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
                <br>

            </table>


        </div>
        </div>
    </div>

@endsection

@push('js')

    <script src="{{ asset('assets/admin/app-assets/js/scripts/pages/app-user-edit.js') }}"></script>

    @can('delete-admin-notification')
        @include('admin.layouts.partials.delete', ['route' => '/admin/notifications/'])
    @endcan

    <script>
        const sendNotification = id => {
            Swal.fire({
                title: '{{ __('messages.static.delete_confirm_title') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('messages.static.delete_btn_yes') }}',
                cancelButtonText: '{{ __('messages.static.delete_btn_cancel') }}'
            }).then((result) => {
                if (result.value) {
                    let f = document.createElement("form");
                    f.setAttribute('method', "post");
                    f.setAttribute('action', `/admin/notifications/${id}/send`);

                    let i1 = document.createElement("input"); //input element, text
                    i1.setAttribute('type', "hidden");
                    i1.setAttribute('name', '_token');
                    i1.setAttribute('value', '{{ csrf_token() }}');

                    f.appendChild(i1);
                    document.body.appendChild(f);
                    f.submit();
                }
            });
        }
    </script>


@endpush
