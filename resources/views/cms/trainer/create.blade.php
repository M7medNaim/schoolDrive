@extends('cms.layout')
@section('title', 'اضافة مدرب جديد ')
@section('title2', 'اضافة مدرب جديد ')
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
                    <h4 class="header-title">اضافة مدرب جديد </h4>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المدرب <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" parsley-trigger="change" required
                                    placeholder="اسم المدرب " class="form-control" id="name" />
                            </div>
                        </div>
                        {{-- id_number --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="id_number" class="form-label">رقم هوية المدرب <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="id_number" parsley-trigger="change" required
                                    placeholder="رقم هوية المدرب" style="direction: rtl" class="form-control" id="id_number" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- phone --}}
                        <div class="col-6">
                          <div class="mb-3">
                              <label for="phone" class="form-label">رقم الجوال <span
                                      class="text-danger">*</span></label>
                              <input type="number" name="phone" parsley-trigger="change" required
                                  placeholder="رقم الجوال" style="direction: rtl" class="form-control" id="phone" />
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="mb-3">
                              <label for="training_number" class="form-label">رقم التدريب<span
                                      class="text-danger">*</span></label>
                              <input type="number" name="training_number" parsley-trigger="change" required
                                  placeholder="رقم التدريب " style="direction: rtl" class="form-control" id="training_number" />
                          </div>
                      </div>
                  </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="driving_license" class="form-label">رقم رخصة القيادة<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="driving_license" parsley-trigger="change" required
                                    placeholder="رقم رخصة القيادة " style="direction: rtl" class="form-control" id="driving_license" />
                            </div>
                        </div>
                        {{-- license_degree --}}
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="license_degree" class="form-label">درجة الرخصة <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="license_degree" parsley-trigger="change" required
                                    placeholder="درجة الرخصة" style="direction: rtl" class="form-control" id="license_degree" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="license_expiration_date" class="form-label">تاريخ انتهاء الرخصة <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="license_expiration_date" parsley-trigger="change" required
                                    placeholder="تاريخ انتهاء الرخصة" style="direction: rtl" class="form-control" id="license_expiration_date" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createtrainer()"
                            type="button">حفظ</button>
                        <a href="{{ route('trainers.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createtrainer() {
            let data = {
                name: document.getElementById('name').value,
                id_number: document.getElementById('id_number').value,
                phone: document.getElementById('phone').value,
                driving_license: document.getElementById('driving_license').value,
                license_degree: document.getElementById('license_degree').value,
                license_expiration_date: document.getElementById('license_expiration_date').value,
                training_number: document.getElementById('training_number').value,
            };
            axios.post('/cms/trainers', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('name').value = '';
                    document.getElementById('id_number').value = '';
                    document.getElementById('phone').value = '';
                    document.getElementById('driving_license').value = '';
                    document.getElementById('license_degree').value = '';
                    document.getElementById('license_expiration_date').value = '';
                    document.getElementById('training_number').value = '';

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
