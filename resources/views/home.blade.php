@extends('layouts.user')

@section('content')  
{{-- {{dd(Auth::check())}} --}}
<div class="container" >
  <div class="d-flex justify-content-center  flex-column">
    <div class="card mt-5 p-2 ms-auto me-auto" style="width: 45rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
      <div class="card-body">
        <h5 class="card-title text-center" style="color: #6096B4;">Masukkan Pengaduan Mu</h5>
        <form action="{{ route('user.store') }}" class="mt-4" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <textarea class="form-control" placeholder="Masukkan Keluh Kesah Mu Di Sini" style="border-radius: 10px" id="exampleFormControlTextarea1" name="laporan" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <div class="image-upload">
                    <input type="file" name="image" id="logo" onchange="fileValue(this)" >
                    <label for="logo" class="upload-field" id="file-label">
                        <div class="file-thumbnail">
                            <img id="image-preview" src="https://www.btklsby.go.id/images/placeholder/basic.png" alt="">
                            <h3 id="filename" class="mt-2">
                                Upload Bukti Laporan
                            </h3>
                            <p >Supports JPG, PNG, SVG</p>
                        </div>
                    </label>
                </div>
              </div>
            </div>
      
            <div class="row mt-3">
              <div class="col-md-12">
                <button type="submit" class="btn pull-right" style="background-color: #6096B4; color: white;">Upload</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>  
    </div>  

    <div class="process-wrap active-step1">
      <div class="process-main">
        <div class="col-3 ">
          <div class="process-step-cont">
            <div class="process-step step-1"></div>
            <span class="process-label">Step 1</span>
          </div>
        </div>
        <div class="col-3 ">
          <div class="process-step-cont">
            <div class="process-step step-2"></div>
            <span class="process-label">Step 2</span>
          </div>
        </div>
        <div class="col-3">
          <div class="process-step-cont">
            <div class="process-step step-3"></div>
            <span class="process-label">Step 3</span>
          </div>
        </div>
        <div class="col-3">
          <div class="process-step-cont">
            <div class="process-step step-4"></div>
            <span class="process-label">Step 4</span>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
function fileValue(value) {
      var path = value.value;
      var extenstion = path.split('.').pop();
      if(extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png"|| extenstion == "gif"){
          document.getElementById('image-preview').src = window.URL.createObjectURL(value.files[0]);
          var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
          document.getElementById("filename").innerHTML = filename;
      }else{
          alert("File not supported. Kindly Upload the Image of below given extension ")
      }
  }
</script>

@endsection

@section('js')

<script type="module">
  import Autogrow from "https://cdn.jsdelivr.net/npm/vanilla-autogrow@1.0.0/autogrow.min.js";
  var inst = new Autogrow();
</script>
@endsection
