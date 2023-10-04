@extends('cms.layout')
@section('title', 'اضافة موظف جديد')
@section('title2', 'اضافة موظف جديد')
@section('styles')

@endsection
@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">اضافة موظف جديد</h4>

                    <form class="parsley-examples">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                {{-- name --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">الاسم<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" parsley-trigger="change" required
                                        placeholder="اسم الموظف" class="form-control" id="name" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
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
                            <div class="col-12 col-md-6">
                                {{-- phone --}}
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">رقم الهاتف <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" parsley-trigger="change" required
                                        placeholder="رقم الهاتف" class="form-control" id="phone"
                                        style="direction: rtl" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                {{-- salary --}}
                                <div class="mb-3">
                                    <label for="salary" class="form-label">الراتب<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="salary" parsley-trigger="change" required
                                        placeholder="الراتب" class="form-control" style="direction: rtl;" id="salary" />
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-light" onclick="createemployee()"
                                type="button">حفظ</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createemployee() {
            let data = {
                name: document.getElementById('name').value,
                id_number: document.getElementById('id_number').value,
                phone: document.getElementById('phone').value,
                salary: document.getElementById('salary').value,
            };
            axios.post('/cms/employees', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('name').value = '';
                    document.getElementById('id_number').value = '';
                    document.getElementById('phone').value = '';
                    document.getElementById('salary').value = '';
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
