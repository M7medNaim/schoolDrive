@extends('cms.layout')
@section('title', 'اضافة دفعة جديدة')
@section('title2', 'اضافة دفعة جديدة')
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
                <h4 class="header-title">اضافة دفعة جديدة</h4>
                <div class="col-12">
                    <div class="mb-3">
                        <p class="mb-1 fw-bold">اختر الطالب :-</p>
                        <select id="student_id" name="student_id" class="form-control" data-toggle="select2"
                            data-width="100%">
                            <option selected disabled></option>
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{-- payment_date --}}
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">تاريخ الدفعة<span
                                    class="text-danger">*</span></label>
                            <input type="date" name="payment_date" parsley-trigger="change" required
                                placeholder="تاريخ الدفعة" class="form-control" id="payment_date" />
                        </div>
                    </div>
                    <div class="col-6">
                        {{-- amount --}}
                        <div class="mb-3">
                            <label for="amount" class="form-label">المبلغ<span
                                    class="text-danger">*</span></label>
                            <input type="number" name="amount" parsley-trigger="change" required
                                placeholder="مبلغ الدفعة" class="form-control" id="amount" style="direction: rtl;" />
                        </div>
                    </div>
                </div>


                <div class="text-end">
                    <button class="btn btn-primary waves-effect waves-light" onclick="createpayment()"
                        type="button">حفظ</button>
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
    function createpayment() {
            let data = {
                student_id: document.getElementById('student_id').value,
                amount: document.getElementById('amount').value,
                payment_date: document.getElementById('payment_date').value,
            };
            axios.post('/cms/payments', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('student_id').value = '';
                    document.getElementById('payment_date').value = '';
                    document.getElementById('amount').value ='';


                })
                .catch(function(error) {
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