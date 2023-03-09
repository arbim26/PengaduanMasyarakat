@extends('layouts.user')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center  flex-column">
        <div class="card mt-5 p-2 ms-auto me-auto ps-5 pe-5" style="margin-bottom: 100px;   width: 30rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
          <div class="card-body">
            <h5 class="card-title text-center" style="color: #6096B4;">Selamat Datang !</h5>
            <p class="text-secondary text-center small" >Ayo Daftarkan Diri Mu, Kami Siap Menampung Kelauh Kesah Mu</p>
            @isset($route)
            <form method="POST" action="{{ $route }}">
                @else
            <form method="POST" action="{{ route('register') }}">
                @endisset
            @csrf
  
              <div class="mb-3">
                <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="NIK">
                @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div> 
                               
              <div class="mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>          

              <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col mb-3">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
  
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>      
  
                <div class="col mb-3">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>                  
    
            </div>
              <div class="mb-3">
                  <div class="col-md-6">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  
                          <label class="form-check-label small text-secondary" for="remember">
                              {{ __('Ingat Saya') }}
                          </label>
                      </div>
                  </div>
              </div>
  
              <div class="row mb-3">
                  <button type="submit" style="border-radius: 10px; background-color: #6096B4; color: white;" class="btn">
                      {{ __('Login') }}
                  </button>
              </div>

              <div class="mb-3 text-center">
                <p class="small text-secondary">Sudah punya akun?, <a href="{{ 'login' }}" style="color: #93BFCF; text-decoration: none">Silahkan Masuk</a></p>
              </div>
          </form>
          </div>
        </div>  
        </div>  
    
</div>
@endsection