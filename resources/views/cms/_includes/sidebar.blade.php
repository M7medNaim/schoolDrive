        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('cms/assets/images/bg-pattern-2.png') }}" alt="user-img" title="Mat Helme"
                        class="rounded-circle img-thumbnail avatar-md">


                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                            aria-expanded="false">Eamil</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>

                    <p class="text-muted left-user-info">Eamil</p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted left-user-info">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">
                        <li>
                            <a href="index.html">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="badge bg-success rounded-pill float-end">9+</span>
                                <span> الرئيسية </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">المستخدمين</li>
                        <li>
                            <a href="#email" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> ادمن </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="email">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('users.index') }}">عرض</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('users.create') }}">اضافة</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">بيانات الموقع</li>
                        <li>
                            <a href="#students" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                <i class="mdi mdi-account-group-outline"></i>
                                <span> الطلاب </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="students" style="">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('students.index') }}">عرض الطلاب</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('students.create') }}">اضافة طالب</a>
                                    </li>
                                    <li class="menu-title mt-2">دفعات الطلاب </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('payments.index') }}">عرض الدفعات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('payments.create') }}">اضافة دفعة</a>
                                    </li>
                                    <li class="menu-title mt-2">دروس الطلاب</li>

                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('lessons.index') }}">عرض دروس</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('lessons.create') }}">اضافة دروس</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#employee" data-bs-toggle="collapse">
                                <i class="fas fa-user-tie"></i>
                                <span> الموظفيين </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="employee">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('employees.index') }}">عرض الموظفين</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('employees.create') }}">اضافة موظف</a>
                                    </li>
                                    <li class="menu-title mt-2">السلف</li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('AdvanceOfPays.index') }}">عرض السلف</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('AdvanceOfPays.create') }}">اضافة سلفة</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#trainer" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> المدربين </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="trainer">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('trainers.index') }}">عرض المدربين</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('trainers.create') }}">اضافة مدرب</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#car" data-bs-toggle="collapse">
                                <i class=" fas fa-car"></i>
                                <span> المركبات </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="car">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('cars.index') }}">عرض المركبات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('cars.create') }}">اضافة مركبة</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">المصاريف</li>
                        <li>
                            <a href="#schoolexpense" data-bs-toggle="collapse">
                                <i class=" fas fa-hand-holding-usd"></i>
                                <span> مصاريف المدرسة </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="schoolexpense">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('schoolexpenses.index') }}">عرض المصاريف</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('schoolexpenses.create') }}">اضافة مصروف</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#carexpenses" data-bs-toggle="collapse">
                                <i class="fas fa-money-bill-alt"></i>
                                <span> مصاريف المركبات </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="carexpenses">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('carexpenses.index') }}">عرض المصاريف</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('carexpenses.create') }}">اضافة مصروف</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">الضرائب</li>

                        <li>
                            <a href="#annualtaxe" data-bs-toggle="collapse">
                                <i class=" fas fa-money-check-alt"></i>
                                <span>الضرائب السنوية </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="annualtaxe">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('annualtaxes.index') }}">عرض الضرائب السنوية</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('annualtaxes.create') }}">اضافة الضرائب السنوية</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#monthlytaxes" data-bs-toggle="collapse">
                                <i class=" fas fa-money-check-alt"></i>
                                <span>الضرائب الشهرية </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="monthlytaxes">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('monthlytaxes.index') }}">عرض الضرائب الشهرية</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('monthlytaxes.create') }}">اضافة الضرائب الشهرية</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- Logout --}}
                        <li>
                            <a href="{{ route('cms.logout') }}" class="text-danger">
                                <i class="fe-log-out me-1"></i>
                                <span> تسجيل خروج </span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->
