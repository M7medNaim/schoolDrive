@extends('cms.layout')
@section('title', 'عرض المدربين')
@section('title2', 'عرض المدربين')
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
                <h4 class="mt-0 header-title">عرض المدربين</h4>
                <p class="text-muted font-14 mb-3">
                    عرض جميع المدربين 
                </p>
                <a href="{{ route('trainers.create') }}" class="d-flex justify-content-center bg-info text-white p-1 d-block w-25 m-auto">اضافة مدرب جديد</a>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المدرب</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجوال</th>
                            <th>رخصة القيادة</th>
                            <th>درجة الرخصة</th>
                            <th>تاريخ انتهاء الرخصة</th>
                            <th>رقم التدريب</th>
                            <th>الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainers as $trainer)
                        <tr id="trainer_{{ $trainer->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $trainer->name }}</td>
                            <td>{{ $trainer->id_number }}</td>
                            <td>{{ $trainer->phone }}</td>
                            <td>{{ $trainer->driving_license }}</td>
                            <td>{{ $trainer->license_degree }}</td>
                            <td>{{ $trainer->license_expiration_date }}</td>
                            <td>{{ $trainer->training_number }}</td>
                            <td>
                                <a href="{{ route('trainers.edit', $trainer->id) }}">
                                    <i class="fas fa-pen"></i></a>
                                <button class="text-danger ms-2 bg-transparent border-0 delete_btn" type="button" onclick="deletetrainer('{{ $trainer->id }}')"><i class=" fas fa-trash-alt"></i></button>
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
    function deletetrainer(id) {
        axios.delete('/cms/trainers/' + id).then(function(response) {
            document.getElementById(`trainer_${id}`).remove();
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
