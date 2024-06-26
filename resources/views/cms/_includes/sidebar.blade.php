        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('cms/logo.jpg') }}" alt="user-img" title="Mat Helme"
                        class="rounded-circle img-thumbnail avatar-md">


                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                            aria-expanded="false">مدرسة الريفي</a>
                    </div>
                    <p class="text-muted left-user-info">لتعليم قيادة السيارات</p>

                    <ul class="list-inline">

                        <li class="list-inline-item">
                            <a href="{{ route('cms.logout') }}">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">
                        <li>
                            <a href="{{ route('cms.home') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
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
                        <li class="menu-title mt-2">الطلاب</li>
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
                                </ul>
                            </div>
                        </li>
                              <li>
                            <a href="#pyayment" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> الدفعات </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="pyayment">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('payments.index') }}">عرض الدفعات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('payments.create') }}">اضافة دفعة</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#lossen" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> الدروس </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="lossen">
                                <ul class="nav-second-level">
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
                            <a href="#receipt" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> الوصولات </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="receipt">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('receipts.index') }}">عرض الوصولات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('receipts.create') }}">اضافة وصل</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">الموظفين</li>
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
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#advanceofpay" data-bs-toggle="collapse">
                                <i class="fas fa-user"></i>
                                <span> السلف </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="advanceofpay">
                                <ul class="nav-second-level">
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
                                <i class=" fas fa-user-nurse"></i>
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
                        <li class="menu-title mt-2">المركبات</li>
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
                            <a href="#dailyexpenses" data-bs-toggle="collapse">
                                <i class=" fas fa-hand-holding-usd"></i>
                                <span>المصاريف اليومية</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="dailyexpenses">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('dailyexpenses.indexInputs') }}">عرض الدخل</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('dailyexpenses.index') }}">عرض المصروفات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('dailyexpenses.create') }}">اضافة مصروف</a>
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

                        <li class="menu-title mt-2">بيانات اضافية</li>
                        <li>
                            <a href="{{ route('cms.dataSchool') }}" class="text-primary">
                                <i class=" fas fa-passport me-1"></i>
                                <span>بيانات المدرسة</span>
                            </a>
                        </li>
                        <li>
                            <a href="#datacontacts" class="text-success" data-bs-toggle="collapse">
                                <i class="fas fa-phone-square-alt"></i>
                                <span>بيانات الاتصال</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="datacontacts">
                                <ul class="nav-second-level">
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-tasks"></i>
                                        <a href="{{ route('datacontacts.index') }}">عرض البيانات</a>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-start">
                                        <i class="fas fa-plus"></i>
                                        <a href="{{ route('datacontacts.create') }}">اضافة بيانات</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- notification --}}
                        <li>
                            <a href="{{ route('cms.notifications') }}" class="text-danger">
                                <i class="fas fa-bell me-1"></i>
                                <span>عرض الاشعارات</span>
                            </a>
                        </li>
                        <hr>
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
