@include('headers.header2')
<x-auth-session-status class="mb-4" :status="session('status')" />
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="position-fixed top-50 start-50 translate-middle">
            <div class="card px-sm-6 px-0 w-100">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <span class="text-primary">
                    <img src="{{ asset('uploads/favicon.png') }}" style="width: 50px;height:auto;" alt="">
                  </span>
                </span>
                <span class="app-brand-text demo text-heading fw-bold mfp-wrap">{{ $generalSettings->CompanyName }}</span>
              </a>
            </div>
            <!-- /Logo -->
            {{-- <h4 class="mb-1">Welcome</h4> --}}
            <p class="my-3">Please sign-in to your account</p>

            <form method="POST" action="{{ route('login') }}" class="mb-6">
                    @csrf

              <div class="mb-6">
                <label for="email" class="form-label">Email or Username</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email or username"
                  autofocus />
              </div>
              <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="Enter Password"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-8">
                {{-- <div class="d-flex justify-content-between">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                  <a href="#">
                    <span>Forgot Password?</span>
                  </a>
                </div> --}}
              </div>
              <div class="mb-6">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>


          </div>
        </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  @include('footers.footer2')
