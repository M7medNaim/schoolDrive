@extends('cms.layout')
@section('title', 'عرض المدخلات اليومية')
@section('title2', 'عرض المدخلات اليومية')
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
                    <h4 class="mt-0 header-title">عرض المدخلات اليومية</h4>
                    <p class="text-muted font-14 mb-3">
                        عرض المدخلات اليومية
                    </p>
                    <a href="{{ route('dailyexpenses.create') }}"
                        class="d-flex justify-content-center bg-info text-white p-1 d-block w-25 m-auto">اضافة دخل
                        جديد</a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المبلغ</th>
                                <th>التاريخ </th>
                                <th>سبب الدخل</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @foreach ($dailyexpenses as $dailyexpense)
                                @if ($dailyexpense->type == 'inputs')
                                    <tr id="dailyexpense_{{ $dailyexpense->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $dailyexpense->amount }}</td>
                                        <td>{{ $dailyexpense->date }}</td>
                                        <td>{{ $dailyexpense->reason_exchange }}</td>
                                        <td>
                                            <a href="{{ route('dailyexpenses.edit', $dailyexpense->id) }}">
                                                <i class="fas fa-pen"></i></a>
                                            <button class="text-danger ms-2 bg-transparent border-0 delete_btn"
                                                type="button" onclick="deletedailyexpense('{{ $dailyexpense->id }}')"><i
                                                    class=" fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    @php
                                        $totalAmount += $dailyexpense->amount;
                                    @endphp
                                @else
                                    لا يوجد مدخلات جديدة
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                    <form method="POST" action="{{ route('dailyexpenses.deleteByType') }}">
                        @csrf
                        <input type="hidden" name="type" value="inputs">
                        <button type="submit" class="btn btn-success float-end mt-2">حذف كل المدخلات</button>
                    </form>
                    <div class="total mt-3 ">
                        <p class="mt-3">مجموع مبالغ المدخلات: <span class="bg-danger text-white p-1 ">{{ $totalAmount }} شيكل</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deletedailyexpense(id) {
            axios.delete('/cms/dailyexpenses/' + id).then(function(response) {
                document.getElementById(`dailyexpense_${id}`).remove();
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
