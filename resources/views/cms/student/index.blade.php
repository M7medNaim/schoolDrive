@extends('cms.layout')
@section('title', 'عرض الطلاب')
@section('title2', 'عرض الطلاب')
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
                    <h4 class="mt-0 header-title">عرض الطلاب</h4>
                    <p class="text-muted font-14 mb-3">
                        عرض كل الطلاب المسجللين في المدرسة
                    </p>
                    <div class="row mb-3">
                        <div class="col-3">
                              <a href="{{ route('students.create') }}"
                        class="w-100 d-flex justify-content-center bg-info text-white p-1 d-block w-25 m-auto">اضافة طالب جديد</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('lessons.create') }}"
                        class="w-100 d-flex justify-content-center bg-success text-white p-1 d-block w-25 m-auto">اضافة درس جديد</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('payments.create') }}"
                            class="w-100 d-flex justify-content-center bg-secondary text-white p-1 d-block w-25 m-auto">اضافة دفعة جديدة</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('receipts.create') }}"
                        class=" w-100 d-flex justify-content-center bg-warning text-white p-1 d-block w-25 m-auto">اضافة وصل جديد</a>
                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الطالب</th>
                                <th>رقم الجوال</th>
                                <th>نوع الرخصة</th>
                                <th>نظام الرخصة</th>
                                <th>عدد الفحوصات</th>
                                <th>التطبيق</th>
                                <th>النتيجة</th>
                                <th>عدد الدروس</th>
                                <th>المبلغ المتفق عليه</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr id="student_{{ $student->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>
                                        {{ $student->type_of_license }}
                                    </td>
                                    <td>
                                        @if ($student->license_system == 'مقاولة')
                                            <span
                                                class="text-warning fw-bolder fs-5">{{ $student->license_system }}</span>
                                        @elseif($student->license_system == 'بالدرس')
                                            <span
                                                class="text-dark fs-5">{{ $student->license_system }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($student->number_of_examination == '1')
                                            <span class="text-success  fs-5">الفحص الأول</span>
                                        @elseif($student->number_of_examination == '2')
                                            <span class="text-success  fs-5">الفحص الثاني</span>
                                        @elseif($student->number_of_examination == '3')
                                            <span class="text-danger fs-5">الفحص الثالث</span>
                                        @elseif($student->number_of_examination == '4')
                                            <span class="text-danger  fs-5">الفحص الرابع</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($student->application == 'شفوي')
                                            <span
                                                class="text-danger ">{{ $student->application }}</span>
                                        @elseif($student->application == 'تحريري')
                                            <span
                                                class="text-secondary">{{ $student->application }}</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if ($student->result == 'ناجح')
                                            <span class="text-success fs-5">{{ $student->result }}</span>
                                        @elseif($student->result == 'راسب')
                                            <span class="text-danger fs-5">{{ $student->result }}</span>
                                        @elseif($student->result == 'لم يقدم')
                                            <span class="text-secondary fs-5">{{ $student->result }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->lessons->count() }}</td>
                                    <td>{{ $student->agreed_amount }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="me-2">
                                            <i class=" far fa-eye"></i></a>
                                        <a href="{{ route('students.edit', $student->id) }}">
                                            <i class="fas fa-pen"></i></a>
                                        <button class="text-danger ms-2 bg-transparent border-0 delete_btn" type="button"
                                            onclick="deletestudent('{{ $student->id }}')"><i
                                                class=" fas fa-trash-alt"></i></button>
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
        function deletestudent(id) {
            axios.delete('/cms/students/' + id).then(function(response) {
                document.getElementById(`student_${id}`).remove();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "تم الحذف بنجاح",
                    showConfirmButton: false,
                    timer: 1500
                });
            }).catch(function(error) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "هناك مشكلة في الحذف",
                    showConfirmButton: false,
                    timer: 1500
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
