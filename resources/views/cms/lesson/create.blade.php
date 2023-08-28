@extends('cms.layout')
@section('title', 'اضافة درس جديد')
@section('title2', 'اضافة درس جديد')
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
                    <h4 class="header-title">اضافة درس جديد</h4>

                    <div class="col-12">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">اختر الطالب :-</p>
                            <select id="student_id" name="student_id" class="form-control" data-toggle="select2"
                                data-width="100%">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    {{-- lesson_date --}}
                    <div class="mb-3">
                        <label for="lesson_date" class="form-label">تاريخ الدرس<span class="text-danger">*</span></label>
                        <input type="date" name="lesson_date" parsley-trigger="change" required placeholder="تاريخ الدرس"
                            class="form-control" id="lesson_date" />
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createlesson()"
                            type="button">حفظ</button>
                        <a href="{{ route('lessons.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createlesson() {
            let data = {
                student_id: document.getElementById('student_id').value,
                lesson_date: document.getElementById('lesson_date').value,
            };
            axios.post('/cms/lessons', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('student_id').value = '';
                    document.getElementById('lesson_date').value = '';

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
