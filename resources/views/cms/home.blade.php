@extends('cms.layout')
@section('title', 'temp')
@section('title2', 'temp')
@section('styles')

@endsection
@push('style')
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 ">
        <div class="card" style="border-radius: 20px">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-4 text-center text-secondary fs-2 me-5">نسبة النجاح</h4>
                <div class="widget-chart-1 text-center">
                    <div class="widget-chart-box-1 " dir="ltr">
                        <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="150"
                                data-height="150" data-fgcolor="#10c469 " data-bgcolor="#eee"
                                value="{{ $successFraction }}" data-skin="tron" data-angleoffset="180"
                                data-readonly="true" data-thickness=".15" readonly="readonly"
                                style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(240, 80, 80); padding: 0px; appearance: none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row mt-3">
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class="fas fa-users me-4 text-success" style="font-size: 50px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $studentCount }}</p>
                        <h5 class="mt-0 mb-0 fs-4 text-secondary" >عدد الطلاب الكلي</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class="fas fa-user-friends me-4 text-success" style="font-size: 50px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $activeStudentsCount }}</p>
                        <h5 class="mt-0 mb-0 text-secondary">عدد الطلاب النشيطين</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class=" fas fa-user-check me-4 text-success" style="font-size: 50px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $passedStudents }}</p>
                        <h5 class="mt-0 mb-0 text-secondary">عدد الطلاب الناجحين</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class=" fas fa-user-tie me-4 text-success" style="font-size: 50px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $employeeCount }}</p>
                        <h5 class="mt-0 mb-0 text-secondary">عدد الموظفين</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class=" fas fa-chalkboard-teacher me-4 text-success" style="font-size: 50px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $trainerCount }}</p>
                        <h5 class="mt-0 mb-0 text-secondary">عدد المدربين</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2">
            <div class="card bg-white text-dark shadow" style="border-radius: 20px">
                <div class="card-body d-flex justifay-content-center align-items-center ms-5" >
                    <i class=" fas fa-car me-4 text-success" style="font-size: 55px"></i>
                    <div class="content">
                        <p class=" fw-bold mt-0 mb-0  fs-1 ">{{ $carCount }}</p>
                        <h5 class="mt-0 mb-0 text-secondary">عدد المركبات</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- end col -->
@endsection
@section('scripts')
@endsection
@push('script')
@endpush
