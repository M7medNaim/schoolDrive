@extends('cms.layout')
@section('title', 'اضافة بيانات جديدة ')
@section('title2', 'اضافة بيانات جديدة ')
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
                    <h4 class="header-title">اضافة بيانات جديدة </h4>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">الاسم<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" parsley-trigger="change" required
                                    placeholder="الاسم" class="form-control" id="name" />
                            </div>
                        </div>
                        {{-- phone --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">رقم الجوال <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="phone" parsley-trigger="change" required
                                    placeholder="رقم الجوال" style="direction: rtl" class="form-control" id="phone" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createdatacontact()"
                            type="button">حفظ</button>
                        <a href="{{ route('datacontacts.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createdatacontact() {
            let data = {
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
            };
            axios.post('/cms/datacontacts', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('name').value = '';
                    document.getElementById('phone').value = '';

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
