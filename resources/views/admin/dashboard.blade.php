@extends('admin.master')
@section('title', 'Dashboard')
@section('main-content')

        <!-- Container fluid -->
        <div class="bg-primary pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <!-- Page header -->
              <div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">School Managment System</h3>
                  </div>
                  {{-- <div>
                    <a href="#" class="btn btn-white">Create New Project</a>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0">Student</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                      <i class="bi bi-people fs-4"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h1 class="fw-bold">@if(isset($students)){{$students->count()}}@endif</h1>
                    {{-- <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p> --}}
                  </div>
                </div>
              </div>

            </div>
            
          </div>
        </div>
@endsection

