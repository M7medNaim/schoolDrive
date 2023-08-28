@extends('cms.layout')
@section('title', 'اضافة طالب جديد')
@section('title2', 'اضافة طالب جديد')
@section('styles')

@endsection
@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">اضافة طالب جديد</h4>

                    <form class="parsley-examples">
                        <div class="row">
                            <div class="col-6">
                                {{-- name --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">الاسم<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="student_name" parsley-trigger="change" required
                                        placeholder="اسم الطالب" class="form-control" id="student_name" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- id_number --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهوية <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="id_number" parsley-trigger="change" required
                                        placeholder="رقم الهوية" class="form-control" id="id_number"
                                        style="direction: rtl" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                {{-- phone --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهاتف <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" parsley-trigger="change" required
                                        placeholder="رقم الهاتف" class="form-control" id="phone"
                                        style="direction: rtl" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- date_of_birth --}}
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">تاريخ الميلاد<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" parsley-trigger="change" required
                                        placeholder="تاريخ الميلاد" class="form-control" id="date_of_birth" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                {{-- agreed_amount --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label"> المبلغ المتفق عليه <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="agreed_amount" parsley-trigger="change" required
                                        placeholder="المبلغ المتفق عليه" class="form-control" id="agreed_amount"
                                        style="direction: rtl" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- type_of_license --}}
                                <div class="mb-3">
                                    <label for="heard" class="form-label">نوع الرخصة:</label>
                                    <select id="type_of_license" class="form-select" required="">
                                        <option value="ملاكي عادي" selected>ملاكي عادي</option>
                                        <option value="تجاري">تجاري</option>
                                        <option value="ملاكي أتوماتيك">ملاكي أتوماتيك</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> عدد الفحوصات:</label>
                                    <select id="number_of_examination" class="form-select" required="">
                                        <option value="1" selected>الاول</option>
                                        <option value="2">التاني</option>
                                        <option value="3">الثالث</option>
                                        <option value="4">الرابع</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> التطبيق :</label>
                                    <select id="application" class="form-select" required="">
                                        <option value="شفوي" selected>شفوي</option>
                                        <option value="تحريري">تحريري</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> النتيجة :</label>
                                    <select id="result" class="form-select" required="">
                                        <option value="لم يقدم" selected>لم يقدم</option>
                                        <option value="ناجح">ناجح</option>
                                        <option value="راسب">راسب</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> نظام الرخصة :</label>
                                    <select id="license_system" class="form-select" required="">
                                        <option value="بالدرس" selected>بالدرس</option>
                                        <option value="مقاولة">مقاولة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-light" onclick="createStudent()"
                                type="button">حفظ</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createStudent() {
            let data = {
                student_name: document.getElementById('student_name').value,
                id_number: document.getElementById('id_number').value,
                phone: document.getElementById('phone').value,
                date_of_birth: document.getElementById('date_of_birth').value,
                agreed_amount: document.getElementById('agreed_amount').value,
                type_of_license: document.getElementById('type_of_license').value,
                number_of_examination: document.getElementById('number_of_examination').value,
                application: document.getElementById('application').value,
                result: document.getElementById('result').value,
                license_system: document.getElementById('license_system').value,
            };
            axios.post('/cms/students', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    let studentName = document.getElementById('student_name').value = '';
                    let idNumber = document.getElementById('id_number').value = '';
                    let phone = document.getElementById('phone').value = '';
                    let dateOfBirth = document.getElementById('date_of_birth').value = '';
                    let agreedAmount = document.getElementById('agreed_amount').value = '';
                    let typeOfLicense = document.getElementById('type_of_license').value = '';
                    let numberOfExamination = document.getElementById('number_of_examination').value = '';
                    let application = document.getElementById('application').value = '';
                    let result = document.getElementById('result').value = '';
                    let licenseSystem = document.getElementById('license_system').value = '';
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
@endpush
