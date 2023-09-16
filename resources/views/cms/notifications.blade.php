@extends('cms.layout')
@section('title', 'عرض الاشعارات')
@section('title2', 'عرض الاشعارات')
@section('styles')

@endsection
@push('style')
    <link href="{{ asset('cms/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('cms/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('cms/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('cms/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">عرض الاشعارات</h4>
                    <p class="text-muted font-14 mb-3">
                        عرض كل اشعارات النظام
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <th>سبب الاشعار</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $notification->data['title'] }}</td>
                                    <td>{{ $notification->data['body'] }}</td>
                                    <td>{{ $notification->data['type'] == 'License Expiry' ? 'انتهاء ترخيص' : 'انتهاء تأمين' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection
@push('script')
    <!-- third party js -->
    <script src="{{ asset('cms/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ asset('cms/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script> --}}
    <script src="{{ asset('cms/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('cms/assets/js/pages/datatables.init.js') }}"></script>
@endpush
