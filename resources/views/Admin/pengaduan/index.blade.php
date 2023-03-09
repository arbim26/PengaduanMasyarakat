@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))    
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data berhasil di verifikasi
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif   
@foreach ( $data as $row ) 
<div class="card profile shadow mb-5">
  <div class="card-body">
    <div class="row align-items-center">
      <div class="col-md-3 text-center mb-5">
          <img src="{{ Storage::url('foto/').$row->foto }}" class="img-thumbnail" width=
          "300px" height="200px" alt="Cinque Terre">
        </a>
      </div>
      <div class="col">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h4 class="mb-1">{{$row->user->name}}</h4>
            <div class="d-flex" style="gap: 10px">
              <div>
                <label class="badge <?php if  ($row->status == 'menunggu verifikasi'){ ?> badge-info <?php   } ?> <?php if ($row->status == 'proses'){ ?> badge-warning <?php   } ?>  <?php if ($row->status == 'selesai'){ ?> badge-success <?php   } ?> ">{{ $row->status }}</label>
              </div>
              <div>
                <span class="small text-muted mb-0">{{$row->tgl_pengaduan}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-6">
            <p class="text-muted m-0">{{ Str::limit($row->isi_laporan,175) }}</p>
          </div>
          @if ($row->tanggapan)
          <div class="col-md-6">
            <p class="small mb-0 text-muted">{{Str::limit($row->tanggapan->tanggapan,175)}}</p>
          </div>
          @else
          <div class="alert alert-danger" role="alert">
            Belum Di Tanggapi
          </div>
          @endif
        </div>
        <div class="row align-items-center">
          <div class="col mb-2">
            @if ($row->status == "menunggu verifikasi")
            <form class="btn p-0" action="/verifikasi/{{$row->id}}" method="POST">
              @method('PUT')
              @csrf
              <button type="submit" class="btn btn-primary">Verifikasi</button>
            </form>
            @endif

            @if ($row->status == "proses")
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals{{$row->id}}">
              Tanggapi
            </button>
            @endif

            <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
               Detail
             </button>
             
             <!-- Modal -->
             <form action="/tanggapan/{{$row->id}}"  method="POST">
              {{-- {{dd($row->id)}} --}}
              @method("PUT")
              @csrf
               <div class="modal fade" id="exampleModals{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header" style="border: none">
                       <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body" style="border: none">
                      <div class="form-group">
                        <textarea name="tanggapan" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                      </div>                  
                     </div>
                     <div class="modal-footer" style="border: none">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                       <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                   </div>
                 </div>
               </div>
             </form>
             <!-- Modal -->
             <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                    <h6>Isi Laporan :</h6>
                    <p>{{$row->id}}</p>
                    <p>{{$row->isi_laporan}}</p>
                    <h6>Isi Tanggapan :</h6>
                    @if ($row->tanggapan)
                    <p class="small mb-0 text-muted">{{Str::limit($row->tanggapan->tanggapan,175)}}</p>
                    @else
                    <div class="alert alert-danger" role="alert">
                      Belum Di Tanggapi
                    </div>
                    @endif
                   </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div> <!-- / .row- -->
  </div> <!-- / .card-body - -->
</div> <!-- / .card- -->
@endforeach
@endsection