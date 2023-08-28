@extends('cms.layout')
@section('title', 'اضافة ضريبة شهرية جديدة')
@section('title2', 'اضافة ضريبة شهرية جديدة')
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
                    <h4 class="header-title">اضافة ضريبة شهرية جديدة</h4>

                    <div class="row">
                         <div class="col-6">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">اختر سنة الضريبة :-</p>
                            <select id="annualtaxe_id" class="form-select" required="">
                                @foreach ($annualtaxes as $annualtaxe)
                                    <option value="{{ $annualtaxe->id }}">{{ $annualtaxe->taxe_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="amount" parsley-trigger="change" required
                                placeholder="المبلغ" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- taxe_month --}}
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="taxe_month" class="form-label">ضريبة شهر  <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="taxe_month" parsley-trigger="change" required
                                    placeholder="ضريبة شهر"  style="direction: rtl" class="form-control" id="taxe_month" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="taxe_day_month" class="form-label"> تاريخ دفع الضريبة <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="taxe_day_month" parsley-trigger="change" required
                                    placeholder="تاريخ  دفع الضريبة" class="form-control" id="taxe_day_month" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createmonthlytaxe()"
                            type="button">حفظ</button>
                        <a href="{{ route('monthlytaxes.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
                    </div>
                    </form>
                </div>
            </div> <!-- end carexpensed -->
        </div>
        <!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        function createmonthlytaxe() {
        let data = {
            annualtaxe_id: document.getElementById('annualtaxe_id').value,
            amount: document.getElementById('amount').value,
            taxe_month: document.getElementById('taxe_month').value,
            taxe_day_month: document.getElementById('taxe_day_month').value,
        };
        axios.post('/cms/monthlytaxes', data)
            .then(function(response) {
                showMessage('success', response.data.message);
                document.getElementById('annualtaxe_id').value = '';
                document.getElementById('amount').value = '';
                document.getElementById('taxe_month').value = '';
                document.getElementById('taxe_day_month').value = '';
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
