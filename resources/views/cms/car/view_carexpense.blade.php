@extends('cms.layout')
@section('title', 'مصاريف المركبة')
@section('title2', 'مصاريف المركبة')
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
                    <h4 class="mt-0 header-title">عرض المصاريف</h4>
                    <p class="text-muted font-14 mb-3">
                        عرض مصاريف المركبة : <span class="fw-bold text-black">{{ $car->type_car }}</span>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تاريخ الصرف</th>
                                <th>وقت الصرف</th>
                                <th>سبب الصرف</th>
                                <th>مبلغ الصرف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @foreach ($carexpenses as $carexpense)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $carexpense->expense_date }}</td>
                                    <td>{{ $carexpense->created_at->format('H:i:s') }}</td>
                                    <td>{{ $carexpense->reason }}</td>
                                    <td>{{ $carexpense->amount }}</td>
                                </tr>
                                @php
                                    $totalAmount += $carexpense->amount
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="total mt-3 ">
                        <p class="mt-3">مجموع مبالغ المصاريف: <span class="bg-danger text-white p-1 ">{{ $totalAmount }} شيكل</span></p>
                    </div>
                </div>
            </div>
            <div class="link d-flex justify-content-end">
                <a href="{{ route('cars.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function deletepayment(id) {
            axios.delete('/cms/carexpenses/' + id).then(function(response) {
                document.getElementById(`payment_${id}`).remove();
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

        function viewcarexpense(carId) {
            window.location.href = '/cms/cars/' + carId + '/carexpense';
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
