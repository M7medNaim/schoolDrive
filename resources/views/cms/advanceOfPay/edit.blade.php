@extends('cms.layout')
@section('title', 'اضافة سلفة جديدة')
@section('title2', 'اضافة سلفة جديدة')
@section('styles')

@endsection
@push('style')
    <link href="{{ asset('cms/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">اضافة سلفة جديدة</h4>

                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">اختر الموظف :-</p>
                            <select id="employee_id" name="employee_id" class="form-control" data-toggle="select2" data-width="100%">
                                <option disabled selected value="">اختر موظفًا ...</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $AdvanceOfPay->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-6">
                            {{-- advance_date --}}
                            <div class="mb-3">
                                <label for="advance_date" class="form-label">تاريخ السلفة<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="advance_date" parsley-trigger="change" required
                                    placeholder="تاريخ السلفة" value="{{ $AdvanceOfPay->advance_date }}" class="form-control" id="advance_date" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            {{-- amount --}}
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="amount" parsley-trigger="change" required
                                    placeholder="المبلغ" value="{{ $AdvanceOfPay->amount }}" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="editAdvanceOfPay('{{ $AdvanceOfPay->id }}')"
                            type="button">تعديل</button>
                        <a href="{{ route('AdvanceOfPays.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
                    </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection


@section('scripts')
    <script>
        function editAdvanceOfPay(id) {
            let data = {
                employee_id: document.getElementById('employee_id').value,
                advance_date: document.getElementById('advance_date').value,
                amount: document.getElementById('amount').value,
            };
            data._method = 'PUT';
            axios.post(`/cms/AdvanceOfPays/${id}`, data)
                .then(function(response) {
                    window.location.href = '/cms/AdvanceOfPays';
                }).catch(function(error) {
                    showMessage('error', error.response.data.message);
                });
        }
        function showMessage(icon, message) {
            Swal.fire({
                position: 'center',
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endsection
@push('script')
    <script src="{{ asset('cms/assets/libs/select2/js/select2.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ asset('cms/assets/js/pages/form-advanced.init.js') }}"></script>
@endpush
