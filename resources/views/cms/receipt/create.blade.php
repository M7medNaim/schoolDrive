@extends('cms.layout')
@section('title', 'اضافة وصل جديد')
@section('title2', 'اضافة وصل جديد')
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
                    <h4 class="header-title">اضافة وصل جديد</h4>
                    <div class="col-12">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">اختر الطالب :-</p>
                            <select id="student_id" name="student_id" class="form-control" data-toggle="select2"
                                data-width="100%">
                                <option selected disabled></option>
                                @foreach ($students as $student)
                                    @php
                                        $paidStudents = [];
                                    @endphp

                                    @foreach ($receipts as $receipt)
                                        @if ($receipt->student_id == $student->id)
                                            @php
                                                $paidStudents[] = $student->id;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @if (!in_array($student->id, $paidStudents))
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            {{-- registration_receipt --}}
                            <div class="form-check mb-2 form-check-success">
                                <input class="form-check-input" type="checkbox" value="0" id="registration_receipt">
                                <label class="form-check-label" for="customckregistration_receipteck2">وصل التسجيل</label>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- program_receipt --}}
                            <div class="form-check mb-2 form-check-success">
                                <input class="form-check-input" type="checkbox" value="0" id="program_receipt">
                                <label class="form-check-label" for="program_receipt">وصل برنامج الاشارات</label>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- signals_receipt --}}
                            <div class="mb-3">
                                <label for="heard" class="form-label">وصل الاشارات:</label>
                                <select id="signals_receipt" class="form-select" required="">
                                    <option value="notPay" selected>لم يدفع</option> 
                                    <option value="firstSignal">الاول</option> 
                                    <option value="secondSignal">التاني</option>
                                    <option value="thirdSignal">الثالث</option>
                                    <option value="fourthSignal">الرابع</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            {{-- test_receipt --}}
                            <div class="mb-3">
                                <label for="heard" class="form-label">وصل الاختبار:</label>
                                <select id="test_receipt" class="form-select" required="">
                                    <option value="notPay" selected>لم يدفع</option>
                                    <option value="firstTest">الاختبار الاول</option>
                                    <option value="secondTest">الاختبار التاني</option>
                                    <option value="thirdTest">الاختبار الثالث</option>
                                    <option value="fourthTest">الاختبار الرابع</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createreceipt()"
                            type="button">حفظ</button>
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
        function createreceipt() {
            let data = {
                student_id: document.getElementById('student_id').value,
                test_receipt: document.getElementById('test_receipt').value,
                signals_receipt: document.getElementById('signals_receipt').value,
                program_receipt: document.getElementById('program_receipt').checked,
                registration_receipt: document.getElementById('registration_receipt').checked,
            };
            axios.post('/cms/receipts', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('student_id').value = '';
                    document.getElementById('test_receipt').value = '';
                    document.getElementById('signals_receipt').value = '';
                    document.getElementById('program_receipt').checked = false;
                    document.getElementById('registration_receipt').checked = false;
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
