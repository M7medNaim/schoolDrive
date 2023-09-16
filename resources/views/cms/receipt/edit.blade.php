@extends('cms.layout')
@section('title', 'تعديل الوصولات ')
@section('title2', 'تعديل الوصولات ')
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
                    <h4 class="header-title">تعديل الوصولات </h4>
                    <div class="col-12">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">تعديل وصولات الطالب :-</p>
                            <select id="student_id" name="student_id" class="form-control" data-toggle="select2"
                            data-width="100%" disabled>
                        <option selected disabled></option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" @if ($student->id == $receipt->student_id) selected @endif>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            {{-- registration_receipt --}}
                            <div class="form-check mb-2 form-check-success">
                                <input class="form-check-input" type="checkbox" value="1" id="registration_receipt"
                                    @if ($receipt->registration_receipt == 1) checked @endif>
                                <label class="form-check-label" for="customckregistration_receipteck2">وصل التسجيل</label>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- program_receipt --}}
                            <div class="form-check mb-2 form-check-success">
                                <input class="form-check-input" type="checkbox" value="1" id="program_receipt"
                                    @if ($receipt->program_receipt == 1) checked @endif>
                                <label class="form-check-label" for="program_receipt">وصل برنامج الاشارات</label>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- signals_receipt --}}
                            <div class="mb-3">
                                <label for="signals_receipt" class="form-label">وصل الاشارات:</label>
                                <select id="signals_receipt" name="signals_receipt" class="form-select" required="">
                                    <option value="notPay" {{ $receipt->signals_receipt === 'notPay' ? 'selected' : '' }}>لم يدفع</option> 
                                    <option value="firstSignal" {{ $receipt->signals_receipt === 'firstSignal' ? 'selected' : '' }}>الاول</option> 
                                    <option value="secondSignal" {{ $receipt->signals_receipt === 'secondSignal' ? 'selected' : '' }}>التاني</option>
                                    <option value="thirdSignal" {{ $receipt->signals_receipt === 'thirdSignal' ? 'selected' : '' }}>الثالث</option>
                                    <option value="fourthSignal" {{ $receipt->signals_receipt === 'fourthSignal' ? 'selected' : '' }}>الرابع</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- test_receipt --}}
                            <div class="mb-3">
                                <label for="test_receipt" class="form-label">وصل الاختبار:</label>
                                <select id="test_receipt" name="test_receipt" class="form-select" required="">
                                    <option value="notPay" {{ $receipt->test_receipt === 'notPay' ? 'selected' : '' }}>لم يدفع</option>
                                    <option value="firstTest" {{ $receipt->test_receipt === 'firstTest' ? 'selected' : '' }}>الاختبار الاول</option>
                                    <option value="secondTest" {{ $receipt->test_receipt === 'secondTest' ? 'selected' : '' }}>الاختبار التاني</option>
                                    <option value="thirdTest" {{ $receipt->test_receipt === 'thirdTest' ? 'selected' : '' }}>الاختبار الثالث</option>
                                    <option value="fourthTest" {{ $receipt->test_receipt === 'fourthTest' ? 'selected' : '' }}>الاختبار الرابع</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="editreceipt({{ $receipt->id }})"
                            type="button">تعديل</button>
                        <a href="{{ route('receipts.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function editreceipt(id) {
            let data = {
                student_id: document.getElementById('student_id').value,
                test_receipt: document.getElementById('test_receipt').value,
                signals_receipt: document.getElementById('signals_receipt').value,
                program_receipt: document.getElementById('program_receipt').checked,
                registration_receipt: document.getElementById('registration_receipt').checked,
            };
            data._method = 'PUT';
            axios.post(`/cms/receipts/${id}`, data)
                .then(function(response) {
                    window.location.href = '/cms/receipts';
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
