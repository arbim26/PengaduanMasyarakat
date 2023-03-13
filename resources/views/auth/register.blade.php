<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
    <div class="container" >
        <div class="d-flex justify-content-center  flex-column">
            <div class="card mt-5 p-2 ms-auto me-auto ps-5 pe-5" style="margin-bottom: 100px;   width: 30rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
                <div style="text-align: center">
                    <img src="../../assets_user/images/logo1(1).png"  width="150px" alt="">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center text-primary">Selamat Datang !</h5>
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
                        <button type="submit" style="border-radius: 10px;" class="btn btn-primary">
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
        </div> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>