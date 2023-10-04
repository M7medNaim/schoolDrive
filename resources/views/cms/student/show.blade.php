@extends('cms.layout')
@section('title', 'عرض بيانات الطالب')
@section('title2', 'عرض بيانات الطالب')
@section('styles')

@endsection
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">عرض بيانات طالب </h4>

                    <form class="parsley-examples">
                        <div class="row">
                            <div class="col-6">
                                {{-- name --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">الاسم<span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled name="student_name"
                                        placeholder="اسم الطالب" value="{{ old('name') ?? $student->name }}"
                                        class="form-control" id="student_name" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- id_number --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهوية <span
                                            class="text-danger">*</span></label>
                                    <input type="number" disabled name="id_number" parsley-trigger="change" required
                                        placeholder="رقم الهوية" value="{{ old('id_number') ?? $student->id_number }}"
                                        class="form-control" id="id_number" style="direction: rtl" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                {{-- phone --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهاتف <span
                                            class="text-danger">*</span></label>
                                    <input type="number" disabled name="phone" parsley-trigger="change" required
                                        placeholder="رقم الهاتف" class="form-control" id="phone" style="direction: rtl"
                                        value="{{ old('phone') ?? $student->phone }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- date_of_birth --}}
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">تاريخ الميلاد<span
                                            class="text-danger">*</span></label>
                                    <input type="date" disabled name="date_of_birth" parsley-trigger="change" required
                                        placeholder="تاريخ الميلاد"
                                        value="{{ old('date_of_birth') ?? $student->date_of_birth }}" class="form-control"
                                        id="date_of_birth" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                {{-- agreed_amount --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label"> المبلغ المتفق عليه <span
                                            class="text-danger">*</span></label>
                                    <input type="number" disabled name="agreed_amount" parsley-trigger="change" required
                                        placeholder="المبلغ المتفق عليه" class="form-control" id="agreed_amount"
                                        style="direction: rtl"
                                        value="{{ old('agreed_amount') ?? $student->agreed_amount }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                {{-- type_of_license --}}
                                <div class="mb-3">
                                    <label for="heard" class="form-label">نوع الرخصة:</label>
                                    <select id="type_of_license" class="form-select" required="" disabled>
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> عدد الفحوصات:</label>
                                    <select id="number_of_examination" class="form-select" required="" disabled>
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> التطبيق :</label>
                                    <select id="application" class="form-select" required="" disabled>
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> النتيجة :</label>
                                    <select id="result" class="form-select" required="" disabled>
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="heard" class="form-label"> نظام الرخصة :</label>
                                    <select id="license_system" class="form-select" required="" disabled>
                                        <option value="بالدرس"
                                            {{ old('license_system') == 'بالدرس' || $student->license_system == 'بالدرس' ? 'selected' : '' }}>
                                            بالدرس</option>
                                        <option value="مقاولة"
                                            {{ old('license_system') == 'مقاولة' || $student->license_system == 'مقاولة' ? 'selected' : '' }}>
                                            مقاولة</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="mb-3">
                                    <label for="student_status" class="form-label">نشاط الطالب:</label>
                                    <select id="student_status" name="student_status" class="form-select" disabled>
                                        <option value="active" {{ $student->student_status === 'active' ? 'selected' : '' }}>نشط</option>
                                        <option value="inactive" {{ $student->student_status === 'inactive' ? 'selected' : '' }}>غير نشط</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-center">
                                    @if($student->image)
                                    <img src="{{ asset('storage/' . $student->image) }}" alt="student-img" class="rounded-circle img-thumbnail" style="width:200px; height:200px" />
                                @else
                                    <img src="{{ asset('cms/assets/images/fakeImage.png') }}" alt="student-img" class="rounded-circle img-thumbnail" style="width:200px; height:200px" />
                                @endif
                                
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3 text-dark">المبلغ المتفق عليه : <span class="bg-danger p-1 text-white">{{ $student->agreed_amount }} شيكل</span></div>
                        <div class="mt-3 text-dark">مجموع الدفعات : <span class="bg-danger p-1 text-white">{{ $student->payments->where('student_id', $student->id)->sum('amount') }} شيكل</span></div>
                        <div class="mt-3 text-dark"> المبلغ المتبقي : <span class="bg-danger p-1 text-white">{{ ($student->agreed_amount)-($student->payments->where('student_id', $student->id)->sum('amount') ) }} شيكل</span></div>

                        <div class="text-end">
                           <a href="{{ route('students.index') }}" class="btn btn-info">رجوع</a>
                        </div>
                    </form>
                </div>
            </div> <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection

@section('scripts')
@endsection
@push('script')
@endpush
