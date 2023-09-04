@extends('cms.layout')
@section('title', 'عرض الوصولات')
@section('title2', 'عرض الوصولات')
@section('styles')

@endsection
@push('style')
<link href="{{ asset('cms/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('cms/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">عرض الوصولات</h4>
                <p class="text-muted font-14 mb-3">
                    عرض الوصولات لجميع الطلاب
                </p>
                <a href="{{ route('receipts.create') }}" class="d-flex justify-content-center bg-info text-white p-1 d-block w-25 m-auto">اضافة وصل جديد</a>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الطالب</th>
                            <th>وصل التسجيل</th>
                            <th>برنامج الاشارات</th>
                            <th>وصل الاشارات</th>
                            <th>وصل الاختبار</th>
                            <th>الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                        <tr id="receipt_{{ $receipt->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $receipt->student->name }}</td>
                            <td>
                                @if ($receipt->registration_receipt == 1)
                                <span class="text-success">تم الدفع</span>
                                @elseif ($receipt->registration_receipt == 0)
                                <span class="text-danger">لم يتم الدفع</span>
                                @endif
                            </td>
                            <td>
                                @if ($receipt->program_receipt == 1)
                                <span class="text-success">تم الدفع</span>
                                @elseif ($receipt->program_receipt == 0)
                                <span class="text-danger">لم يتم الدفع</span>
                                @endif
                            </td>
                            <td>
                                @if ($receipt->signals_receipt == 1)
                                <span class="text-success">تم الدفع</span>
                                @elseif ($receipt->signals_receipt == 0)
                                <span class="text-danger">لم يتم الدفع</span>
                                @endif
                            </td>
                            <td>
                                @if ($receipt->test_receipt == 1)
                                <span class="text-success">تم الدفع</span>
                                @elseif ($receipt->test_receipt == 0)
                                <span class="text-danger">لم يتم الدفع</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('receipts.edit', $receipt->id) }}">
                                    <i class="fas fa-pen"></i></a>
                                <button class="text-danger ms-2 bg-transparent border-0 delete_btn" type="button" onclick="deletereceipt('{{ $receipt->id }}')"><i class=" fas fa-trash-alt"></i></button>
                            </td>
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
<script>
    function deletereceipt(id) {
        axios.delete('/cms/receipts/' + id).then(function(response) {
            document.getElementById(`receipt_${id}`).remove();
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: "تم الحذف بنجاح"
                , showConfirmButton: false
                , timer: 1500
            });
        }).catch(function(error) {
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: "هناك مشكلة في الحذف"
                , showConfirmButton: false
                , timer: 1500
            });
        });

    }

</script>
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
