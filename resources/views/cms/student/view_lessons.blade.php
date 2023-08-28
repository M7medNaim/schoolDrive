@extends('cms.layout')
@section('title', 'دروس الطالب')
@section('title2', 'دروس الطالب')
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
                <h4 class="mt-0 header-title">عرض الدروس</h4>
                <p class="text-muted font-14 mb-3">
                   عرض دروس الطالب : {{ $student->name }}
                </p>
                <a href="{{ route('lessons.create') }}" class="d-flex justify-content-center bg-info text-white p-1 d-block w-25 m-auto">اضافة درس جديد</a>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تاريخ الدرس</th>
                            <th>وقت الدرس</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $lesson->lesson_date }}</td>
                            <td>{{ $lesson->created_at->format('H:i:s') }}</td>
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
    function deletelesson(id) {
        axios.delete('/cms/lessons/' + id).then(function(response) {
            document.getElementById(`lesson_${id}`).remove();
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

    function viewLessons(studentId) {
    window.open('/cms/students/' + studentId + '/lessons', '_blank', 'width=800,height=600');
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
<script src="{{ asset('cms/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
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
