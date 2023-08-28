@extends('cms.layout')
@section('title', 'اضافة مستخدم')
@section('title2', 'اضافة مستخدم')
@section('styles')

@endsection
@push('style')
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">اضافة مستخدم جديد</h4>

                    <form class="parsley-examples">
                        {{-- name --}}
                        <div class="mb-3">
                            <label for="emailAddress" class="form-label">الاسم<span class="text-danger">*</span></label>
                            <input type="text" name="user_name" parsley-trigger="change" required
                                placeholder="اسم المستخدم" class="form-control" id="user_name" />
                        </div>
                        {{-- email --}}
                        <div class="mb-3">
                            <label for="emailAddress" class="form-label">الايميل<span
                                    class="text-danger">*</span></label>
                            <input type="email" name="user_email" parsley-trigger="change" required
                                placeholder="الايميل" class="form-control" id="user_email"  style="direction: rtl"/>
                        </div>
                        {{-- password --}}
                        <div class="mb-3">
                            <label for="pass1" class="form-label">كلمة المرور<span class="text-danger">*</span></label>
                            <input id="user_password" type="password" name="user_password" placeholder="كلمة المرور" required
                                class="form-control" />
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary waves-effect waves-light" onclick="createUser()"
                                type="button">حفظ</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary waves-effect">الرجوع</a>
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
     function createUser() {
    let name = document.getElementById('user_name').value;
    let email = document.getElementById('user_email').value;
    let password = document.getElementById('user_password').value;

    let formData = new FormData();
    formData.append('user_name', name);
    formData.append('user_email', email);
    formData.append('user_password', password);

    axios.post('/cms/users', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function(response) {
        showMessage('success', 'تم التخزين بنجاح');
        document.getElementById('user_name').value = '';
        document.getElementById('user_email').value = '';
        document.getElementById('user_password').value = '';
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
