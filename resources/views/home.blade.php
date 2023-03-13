@extends('layouts.user')

@section('content')  
{{-- {{dd(Auth::check())}} --}}
<div class="container" >
  <div class="d-flex justify-content-center  flex-column">
    <div class="card p-2 ms-auto me-auto" style="width: 45rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
      <div class="card-body">
        <h5 class="card-title text-center text-primary" >Masukkan Pengaduan Mu</h5>
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
                            <img id="image-preview" src="https://www.btklsby.go.id/images/placeholder/basic.png" alt="" style="height: 60px">
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
                <button type="submit" class="btn pull-right primary">Upload</button>
              </div>
            </div>
          </div>
        </form>
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
