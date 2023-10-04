@extends('cms.layout')
@section('title', 'اضافة مصروف يومي جديد')
@section('title2', 'اضافة مصروف يومي جديد')
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
                    <h4 class="header-title">اضافة مصروف يومي جديد</h4>

                    <div class="row">
                         <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">ادخل النوع :</label>
                                <select id="type" class="form-select" required="">
                                    <option value="inputs" selected>دخل</option>
                                    <option value="expenses">مصروف</option>
                                </select>
                            </div>
                    </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="amount" parsley-trigger="change" required
                                placeholder="المبلغ" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- reason_exchange --}}
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="reason_exchange" class="form-label"> السبب <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="reason_exchange" parsley-trigger="change" required
                                    placeholder=" السبب "  class="form-control" id="reason_exchange" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">التاريخ<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date" parsley-trigger="change" required
                                    placeholder="التاريخ" class="form-control" id="date" />
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createdailyexpense()"
                            type="button">حفظ</button>
                        {{-- <a href="{{ route('dailyexpenses.index') }}" class="btn btn-secondary waves-effect">الرجوع</a> --}}
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
        function createdailyexpense() {
        let data = {
            type: document.getElementById('type').value,
            amount: document.getElementById('amount').value,
            date: document.getElementById('date').value,
            reason_exchange: document.getElementById('reason_exchange').value,
        };
        axios.post('/cms/dailyexpenses', data)
            .then(function(response) {
                showMessage('success', response.data.message);
                document.getElementById('type').value = '';
                document.getElementById('amount').value = '';
                document.getElementById('date').value = '';
                document.getElementById('reason_exchange').value = '';
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
