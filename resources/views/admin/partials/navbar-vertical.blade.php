 <!-- Sidebar -->
 <style>
     .active{
        font-weight: 900;
     }
 </style>
 <nav class="navbar-vertical navbar">
     <div class="nav-scroller">
         <!-- Brand logo -->
         <a class="navbar-brand" href="{{url('admin/dashboard')}}">
            <h3 style="color: white">SMS</h3>
             {{-- <img src="{{ asset('public/assets/images/brand/logo/logo.svg') }}" alt="" /> --}}
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
             <li class="nav-item active">
                 <a class="nav-link " href="{{url('admin/dashboard')}}">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                 </a>

             </li>

             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link has-arrow " href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navStudent" aria-expanded="false"
                     aria-controls="navStudent">
                     <i data-feather="layers" class="nav-icon icon-xs me-2">
                     </i> Student
                 </a>

                 <div id="navStudent" class="collapse" data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link" href="{{url('admin/student/create')}}">
                                 Add Student
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " href="{{url('admin/student')}}">
                                 List of Students
                             </a>
                         </li>
                     </ul>
                 </div>

             </li>
             <li class="nav-item">
                <a class="nav-link has-arrow" href="" data-bs-toggle="collapse" data-bs-target="#navFees" aria-expanded="false"
                    aria-controls="navFees">
                    <i data-feather="layers" class="nav-icon icon-xs me-2">
                    </i> Fees
                </a>

                <div id="navFees" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/fees')}}">
                               Add Fees
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('admin/fees-setup/create')}}">
                                Setup Fees
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/generate-fees-book')}}">
                               Generate Fees Book
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{url('admin/fees-book')}}">
                               Fees Book
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

     
     
           


         </ul>

     </div>
 </nav>
