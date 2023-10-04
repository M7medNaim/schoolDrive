@extends('cms.layout')
@section('title', 'اضافة ضريبة سنوية')
@section('title2', 'اضافة ضريبة سنوية')
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
                    <h4 class="header-title">اضافة ضريبة سنوية</h4>
                    <div class="row">
                        <div class="col-11 col-md-5">
                            <div class="mb-3">
                                <label for="taxe_year" class="form-label">سنة الضريبة <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="taxe_year" parsley-trigger="change" required
                                    placeholder="سنة الضريبة" style="direction: rtl" class="form-control" id="taxe_year" />
                            </div>
                        </div>
                        <div class="col-11 col-md-5">
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="amount" parsley-trigger="change" required
                                    placeholder="مبلغ الضريبة" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createannualtaxe()"
                            type="button">حفظ</button>
                        <a href="{{ route('annualtaxes.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
        function createannualtaxe() {
            let data = {
                taxe_year: document.getElementById('taxe_year').value,
                amount: document.getElementById('amount').value,
            };
            axios.post('/cms/annualtaxes', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('taxe_year').value = '';
                    document.getElementById('amount').value = '';

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
