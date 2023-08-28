@extends('cms.layout')
@section('title', 'تعديل مركبة ')
@section('title2', 'تعديل مركبة ')
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
                    <h4 class="header-title">تعديل مركبة </h4>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="heard" class="form-label"> نوع المركبة :</label>
                                <select id="type_car" class="form-select" required="">
                                    <option value="تجاري" {{ $car->type_car === 'تجاري' ? 'selected' : '' }}>تجاري</option>
                                    <option value="ملاكي عادي" {{ $car->type_car === 'ملاكي عادي' ? 'selected' : '' }}>ملاكي عادي</option>
                                    <option value="ملاكي" {{ $car->type_car === 'ملاكي أتوماتيك' ? 'selected' : '' }}>ملاكي أتوماتيك</option>
                                </select>
                            </div>
                        </div>
                        {{-- car_number --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="car_number" class="form-label">رقم المركبة <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="car_number" parsley-trigger="change" required
                                    placeholder="رقم المركبة" value="{{ $car->car_number }}" style="direction: rtl" class="form-control" id="car_number" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="license_expiry" class="form-label">انتهاء الترخيص <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="license_expiry" parsley-trigger="change" required
                                    placeholder="انتهاء الترخيص" value="{{ $car->license_expiry }}" class="form-control" id="license_expiry" />
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="Insurance_expiry" class="form-label">انتهاء التأمين <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="Insurance_expiry" parsley-trigger="change" required
                                    placeholder="انتهاء التأمين" value="{{ $car->Insurance_expiry }}" class="form-control" id="Insurance_expiry" />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="model" class="form-label"> الموديل <span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $car->model }}" name="model" parsley-trigger="change" required
                                    placeholder="الموديل" class="form-control" style="direction: rtl" id="model" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="editcar('{{ $car->id }}')"
                            type="button">تعديل</button>
                        <a href="{{ route('cars.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function editcar(id) {
            let data = {
                type_car: document.getElementById('type_car').value,
                car_number: document.getElementById('car_number').value,
                license_expiry: document.getElementById('license_expiry').value,
                Insurance_expiry: document.getElementById('Insurance_expiry').value,
                model: document.getElementById('model').value,
            };
            data._method = 'PUT';
            axios.post(`/cms/cars/${id}`, data)
                .then(function(response) {
                    window.location.href = '/cms/cars';
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
