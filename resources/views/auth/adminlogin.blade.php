@extends('layouts.auth')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <img src="../../assets_user/images/logo1(1).png" width="80px" alt="">
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Selamat Datang!</h4>
          <p class="mb-4">Masuk untuk melanjutkan</p>

          <form id="formAuthentication" class="mb-3" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label" >Email or Username</label>
              <input
                type="text"
                id="email"
                placeholder="Enter your email or username"
                autofocus
                class="form-control @error('email') is-invalid @enderror" name="email"
              />

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                  class="form-control @error('password') is-invalid @enderror" name="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

@endsection