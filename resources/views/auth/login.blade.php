@extends('layouts.user')

@section('content')
<div class="container" >
    <div class="d-flex justify-content-center  flex-column">
      <div class="card mt-5 p-2 ms-auto me-auto ps-5 pe-5" style="margin-bottom: 100px; width: 30rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
        <div class="card-body">
          <h5 class="card-title text-center" style="color: #6096B4;">Selamat Datang Kembali !</h5>
          <p class="text-secondary text-center small" >Masuk Untuk Melanjutkan</p>
          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-dismissible fade show">
            <p>Anda Harus Login Terlebih Dahulu</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
          @endif
          <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <div class="form-floating mb-3">
                <input style="border-radius: 10px" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required autocomplete="email" >
                <label for="floatingInput">Alamat Email</label>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div> 
                             
            <div class="form-floating mb-3">
                <input  style="border-radius: 10px" id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required autocomplete="password" >
                <label for="floatingInput">Password</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>                  

            <div class="row mb-3">
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
                <p class="small text-secondary">Sudah punya akun?, <a href="{{ 'register' }}" style="color: #93BFCF; text-decoration: none">Silahkan Masuk</a></p>
              </div>
        </form>
        </div>
      </div>  
      </div>  

@endsection