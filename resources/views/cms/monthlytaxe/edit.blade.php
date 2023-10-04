@extends('cms.layout')
@section('title', 'تعديل ضريبة شهرية ')
@section('title2', 'تعديل ضريبة شهرية ')
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
                    <h4 class="header-title">تعديل ضريبة شهرية </h4>

                    <div class="row">
                         <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">اختر سنة الضريبة :-</p>
                            <select id="annualtaxe_id" class="form-select" required="">
                                @foreach ($annualtaxes as $annualtaxe)
                                    <option value="{{ $annualtaxe->id }}">{{ $annualtaxe->taxe_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="amount" parsley-trigger="change" required
                                placeholder="المبلغ" value="{{ $monthlytaxe->amount }}" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- taxe_month --}}
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="taxe_month" class="form-label">ضريبة شهر  <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="taxe_month" parsley-trigger="change" required
                                    placeholder="ضريبة شهر" value="{{ $monthlytaxe->taxe_day_month }}"  style="direction: rtl" class="form-control" id="taxe_month" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="taxe_day_month" class="form-label"> تاريخ دفع الضريبة <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="taxe_day_month" parsley-trigger="change" required
                                    placeholder="تاريخ  دفع الضريبة" value="{{ $monthlytaxe->taxe_month }}" class="form-control" id="taxe_day_month" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="editmonthlytaxe('{{ $monthlytaxe->id }}')"
                            type="button">تعديل</button>
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
        function editmonthlytaxe(id) {
            let data = {
                annualtaxe_id: document.getElementById('annualtaxe_id').value,
            amount: document.getElementById('amount').value,
            taxe_month: document.getElementById('taxe_month').value,
            taxe_day_month: document.getElementById('taxe_day_month').value,
            };
            data._method = 'PUT';
            axios.post(`/cms/monthlytaxes/${id}`, data)
                .then(function(response) {
                    window.location.href = '/cms/monthlytaxes';
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
