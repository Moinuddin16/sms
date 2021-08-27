
<!DOCTYPE html>
<html lang="en">

<head>
  @include("admin.partials.head")
  <title>Admin | Log In </title>
  <style>
    body {
        background-image: url("public/assets/images/login-bg.jpg");
        background-color: #cccccc;
        }
</style>
</head>



<body>
  <!-- container -->
  <div class="container d-flex flex-column ">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4 text-center">
              {{-- <a href="../index.html"><img src="{{asset('public/assets/images/brand/logo/logo-primary.svg')}}" class="mb-2" alt=""></a> --}}
              <h3 class="mb-6">School Managment System</h3>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required="true">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="true">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center
                  mb-4">
                <div class="form-check custom-checkbox">
                  <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="rememberme">Remember
                      me</label>
                </div>

              </div>
              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Log in</button>
                </div>

                <div class="d-md-flex justify-content-between mt-4">
                  <div class="mb-2 mb-md-0">
                    {{-- <a href="sign-up.html" class="fs-5">Create An
                        Account </a> --}}
                  </div>
                  <div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    {{-- <a href="forget-password.html" class="text-inherit
                        fs-5">Forgot your password?</a> --}}
                  </div>

                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  @include("admin.partials.scripts")
</body>

</html>
