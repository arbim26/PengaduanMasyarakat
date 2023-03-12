@extends('layouts.user')

@section('content')
<div class="container" >
    <div class="d-flex justify-content-center  flex-column">
      <!-- Button trigger modal -->
      <div class="card mt-5 p-2 ms-auto me-auto" style="width: 45rem; border-radius: 20px; box-shadow: 0px 5px 30px #3C4048;">
        <div class="card-body ">
          <h5 class="card-title text-center mb-3" style="color: #6096B4;">Riwayat Pengaduan</h5>
          @foreach ( $data as $row )      
          <div class="card m-2 mb-4" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4 p-3">
                    <img class="img-thumbnail" style="border: none; border-radius: 10px" src="{{ Storage::url('foto/').$row->foto }}" />
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <div class="d-flex gap-3 mb-2">
                        <h6 class="cart-tittle text-secondary">{{ $row->tgl_pengaduan }}</h6>
                        <span class="badge <?php if  ($row->status == 'menunggu verifikasi'){ ?> bg-info <?php   } ?> <?php if ($row->status == 'proses'){ ?> bg-warning <?php   } ?>  <?php if ($row->status == 'selesai'){ ?> bg-success <?php   } ?>">{{ $row->status }}</span>
                    </div>
                    <p class="card-text" style="font-size: 12px">{{ Str::limit($row->isi_laporan,300) }}</p>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}" style="background-color: #6096B4; color: white">detail</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Modal -->
          <div class="modal fade modal-dialog-scrollable" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{$row->tgl_pengaduan}}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h6>Isi Laporan Anda :</h6>
                  <p>{{$row->isi_laporan}}</p>
                  <h6>Isi Tanggapan :</h6>
                  @if ($row->tanggapan)
                  <p>{{$row->tanggapan->tanggapan}}</p>
                  @else
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data belum ada tanggapan
                  </div>
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>  
      </div>  
  
  </div>
@endsection