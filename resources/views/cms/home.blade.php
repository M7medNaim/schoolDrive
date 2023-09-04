@extends('cms.layout')
@section('title' , 'temp')
@section('title2' , 'temp')
@section('styles')

@endsection
@push('style')

@endpush

@section('content')
<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">عدد الطلاب</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-center">
                        <h2 class="fw-normal mb-1"> {{ $studentCount }} </h2>
                        <p class="text-muted mb-3">طالب</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">عدد الموظفين</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-center">
                        <h2 class="fw-normal mb-1"> {{ $employeeCount }} </h2>
                        <p class="text-muted mb-3">موظف</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">عدد المدربين</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-center">
                        <h2 class="fw-normal mb-1"> {{ $trainerCount }} </h2>
                        <p class="text-muted mb-3">مدرب</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">عدد المركبات</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-center">
                        <h2 class="fw-normal mb-1"> {{ $carCount }} </h2>
                        <p class="text-muted mb-3">مركبة</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">نسبة النجاح</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-center">
                        <h2 class="fw-normal mb-1"> {{ $successFraction }} % </h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->
<!-- end col -->

</div>
@endsection

@section('scripts')

@endsection
@push('script')

@endpush