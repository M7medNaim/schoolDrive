@extends('cms.layout')
@section('title', 'تعديل بيانات الطالب')
@section('title2', 'تعديل بيانات الطالب')
@section('styles')

@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">تعديل بيانات طالب </h4>

                    <form class="parsley-examples">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                {{-- name --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">الاسم<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="student_name" parsley-trigger="change" required
                                        placeholder="اسم الطالب" value="{{ old('name') ?? $student->name }}"
                                        class="form-control" id="student_name" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                {{-- id_number --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهوية <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="id_number" parsley-trigger="change" required
                                        placeholder="رقم الهوية" value="{{ old('id_number') ?? $student->id_number }}"
                                        class="form-control" id="id_number" style="direction: rtl" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                {{-- phone --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهاتف <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" parsley-trigger="change" required
                                        placeholder="رقم الهاتف" class="form-control" id="phone" style="direction: rtl"
                                        value="{{ old('phone') ?? $student->phone }}" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                {{-- date_of_birth --}}
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">تاريخ الميلاد<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" parsley-trigger="change" required
                                        placeholder="تاريخ الميلاد"
                                        value="{{ old('date_of_birth') ?? $student->date_of_birth }}" class="form-control"
                                        id="date_of_birth" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                {{-- agreed_amount --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label"> المبلغ المتفق عليه <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="agreed_amount" parsley-trigger="change" required
                                        placeholder="المبلغ المتفق عليه" class="form-control" id="agreed_amount"
                                        style="direction: rtl"
                                        value="{{ old('agreed_amount') ?? $student->agreed_amount }}" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                {{-- type_of_license --}}
                                <div class="mb-3">
                                    <label for="heard" class="form-label">نوع الرخصة:</label>
                                    <select id="type_of_license" class="form-select" required="">
                                        <option value="ملاكي عادي"
                                            {{ old('type_of_license') == 'ملاكي عادي' || $student->type_of_license == 'ملاكي عادي' ? 'selected' : '' }}>
                                            ملاكي عادي</option>
                                        <option value="تجاري"
                                            {{ old('type_of_license') == 'تجاري' || $student->type_of_license == 'تجاري' ? 'selected' : '' }}>
                                            تجاري</option>
                                        <option value="ملاكي أتوماتيك"
                                            {{ old('type_of_license') == 'ملاكي أتوماتيك' || $student->type_of_license == 'ملاكي أتوماتيك' ? 'selected' : '' }}>
                                            ملاكي أتوماتيك</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> عدد الفحوصات:</label>
                                    <select id="number_of_examination" class="form-select" required="">
                                        <option value="1"
                                            {{ old('number_of_examination') == '1' || $student->number_of_examination == '1' ? 'selected' : '' }}>
                                            الاول</option>
                                        <option value="2"
                                            {{ old('number_of_examination') == '2' || $student->number_of_examination == '2' ? 'selected' : '' }}>
                                            التاني</option>
                                        <option value="3"
                                            {{ old('number_of_examination') == '3' || $student->number_of_examination == '3' ? 'selected' : '' }}>
                                            الثالث</option>
                                        <option value="4"
                                            {{ old('number_of_examination') == '4' || $student->number_of_examination == '4' ? 'selected' : '' }}>
                                            الرابع</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> التطبيق :</label>
                                    <select id="application" class="form-select" required="">
                                        <option value="شفوي"
                                            {{ old('application') == 'شفوي' || $student->application == 'شفوي' ? 'selected' : '' }}>
                                            شفوي</option>
                                        <option value="تحريري"
                                            {{ old('application') == 'تحريري' || $student->application == 'تحريري' ? 'selected' : '' }}>
                                            تحريري</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> النتيجة :</label>
                                    <select id="result" class="form-select" required="">
                                        <option value="لم يقدم"
                                            {{ old('result') == 'لم يقدم' || $student->result == 'لم يقدم' ? 'selected' : '' }}>
                                            لم يقدم</option>
                                        <option value="ناجح"
                                            {{ old('result') == 'ناجح' || $student->result == 'ناجح' ? 'selected' : '' }}>
                                            ناجح</option>
                                        <option value="راسب"
                                            {{ old('result') == 'راسب' || $student->result == 'راسب' ? 'selected' : '' }}>
                                            راسب</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> نظام الرخصة :</label>
                                    <select id="license_system" class="form-select" required="">
                                        <option value="بالدرس"
                                            {{ old('license_system') == 'بالدرس' || $student->license_system == 'بالدرس' ? 'selected' : '' }}>
                                            بالدرس</option>
                                        <option value="مقاولة"
                                            {{ old('license_system') == 'مقاولة' || $student->license_system == 'مقاولة' ? 'selected' : '' }}>
                                            مقاولة</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    {{-- Image --}}
                                    <div class="mb-3">
                                        <label for="pass1" class="form-label">صورة الطالب<span
                                                class="text-danger">*</span></label>
                                        <input id="student_image" type="file" name="student_image"
                                            placeholder="تحميل صورة الطالب" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="student_status"
                                                @if ($student->student_status == 'active') checked @endif>
                                            <label class="form-check-label" for="student_status">حالة الطالب</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-light"
                                onclick="editstudent('{{ $student->id }}')" type="button">تعديل</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary waves-effect">رجوع</a>
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
        function editstudent(id) {
            let student_name = document.getElementById('student_name').value;
            let id_number = document.getElementById('id_number').value;
            let phone = document.getElementById('phone').value;
            let date_of_birth = document.getElementById('date_of_birth').value;
            let agreed_amount = document.getElementById('agreed_amount').value;
            let type_of_license = document.getElementById('type_of_license').value;
            let number_of_examination = document.getElementById('number_of_examination').value;
            let application = document.getElementById('application').value;
            let result = document.getElementById('result').value;
            let license_system = document.getElementById('license_system').value;
            let student_status = document.getElementById('student_status').checked ? 'active' : 'inactive';
            let imageInput = document.getElementById('student_image');
            let imageFile = imageInput.files[0];
            let formData = new FormData();
            formData.append('student_name', student_name);
            formData.append('id_number', id_number);
            formData.append('phone', phone);
            formData.append('date_of_birth', date_of_birth);
            formData.append('agreed_amount', agreed_amount);
            formData.append('type_of_license', type_of_license);
            formData.append('number_of_examination', number_of_examination);
            formData.append('application', application);
            formData.append('result', result);
            formData.append('license_system', license_system);
            formData.append('student_status', student_status);
            if (imageFile) {
                formData.append('student_image', imageFile);
            }

            formData.append('_method', 'put');

            axios.post(`/cms/students/${id}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(function(response) {
                    window.location.href = '/cms/students';
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
            })
        }
    </script>
@endsection
@push('script')
@endpush
