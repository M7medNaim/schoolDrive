@extends('cms.layout')
@section('title', 'temp')
@section('title2', 'temp')
@section('styles')

@endsection
@push('style')
@endpush

@section('content')
        <!-- end col -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-4">نسبة النجاح</h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                        style="width: 70px; height: 70px;"></canvas><input data-plugin="knob"
                                        data-width="70" data-height="70" data-fgcolor="#f05050 " data-bgcolor="#F9B9B9"
                                        value="{{ $successFraction }}" data-skin="tron" data-angleoffset="180"
                                        data-readonly="true" data-thickness=".15" readonly="readonly"
                                        style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(240, 80, 80); padding: 0px; appearance: none;">
                                </div>
                            </div>

                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> {{ $passedStudents }} </h2>
                                <p class="text-muted mb-1">عدد الطلاب الناجحين</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3 pt-2">
                                <i class="mdi mdi-account-group-outline fs-1"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">عدد الطلاب النشيطين</h5>
                                <p class="text-danger fw-bold  mb-2 fs-3 text-truncate">{{ $activeStudentsCount }}</p>
                                <small class="text-success"><b>طالب</b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3 pt-2">
                                <i class="mdi mdi-account-group-outline fs-1"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">عدد الطلاب الكلي</h5>
                                <p class="text-danger fw-bold  mb-2 fs-3 text-truncate">{{ $studentCount }}</p>
                                <small class="text-success"><b>طالب</b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3 pt-2">
                                <i class="fas fa-user-tie fs-1"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">عدد الموظفين</h5>
                                <p class="text-danger fw-bold  mb-2 fs-3 text-truncate">{{ $employeeCount }}</p>
                                <small class="text-success"><b>موظف</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3 pt-2">
                                <i class="fas fa-user-nurse fs-1"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">عدد المدربين</h5>
                                <p class="text-danger fw-bold  mb-2 fs-3 text-truncate">{{ $trainerCount }}</p>
                                <small class="text-success"><b>مدرب</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3 pt-2">
                                <i class="fas fa-car fs-1"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">عدد المركبات</h5>
                                <p class="text-danger fw-bold  mb-2 fs-3 text-truncate">{{ $carCount }}</p>
                                <small class="text-success "><b>مركبة</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>

    @endsection

    @section('scripts')

    @endsection
    @push('script')
    @endpush
