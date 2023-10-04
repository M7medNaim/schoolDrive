@extends('cms.layout')
@section('title', 'اضافة مصاريف جديدة')
@section('title2', 'اضافة مصاريف جديدة')
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
                    <h4 class="header-title">اضافة مصاريف جديدة</h4>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">المبلغ <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="amount" parsley-trigger="change" required
                                placeholder="المبلغ" style="direction: rtl" class="form-control" id="amount" />
                            </div>
                        </div>
                        {{-- schoolexpense_number --}}
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="reason" class="form-label">سبب الصرف  <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="reason" parsley-trigger="change" required
                                    placeholder="سبب الصرف"  class="form-control" id="reason" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="expense_date" class="form-label"> تاريخ الصرف <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="expense_date" parsley-trigger="change" required
                                    placeholder="تاريخ الصرف" class="form-control" id="expense_date" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="note" class="form-label">اضافة ملاحظة <span class="text-danger">*</span></label>
                                <textarea name="note" class="form-control" id="note" placeholder="اضافة ملاحظة" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary waves-effect waves-light" onclick="createschoolexpense()"
                            type="button">حفظ</button>
                        <a href="{{ route('schoolexpenses.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
                    </div>
                    </form>
                </div>
            </div> <!-- end schoolexpensed -->
        </div>
        <!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        function createschoolexpense() {
            let data = {
                amount: document.getElementById('amount').value,
                reason: document.getElementById('reason').value,
                expense_date: document.getElementById('expense_date').value,
                note: document.getElementById('note').value,
            };
            axios.post('/cms/schoolexpenses', data)
                .then(function(response) {
                    showMessage('success', response.data.message);
                    document.getElementById('amount').value = '';
                    document.getElementById('reason').value = '';
                    document.getElementById('expense_date').value = '';
                    document.getElementById('note').value = '';

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
