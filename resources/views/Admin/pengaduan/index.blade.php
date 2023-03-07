@extends('layouts.app')

@section('content')
@foreach ( $data as $row )    
<div class="card profile shadow">
  <div class="card-body my-4">
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
                <label class="badge badge-warning">{{ $row->status }}</label>
              </div>
              <div>
                <span class="small text-muted mb-0">{{$row->tgl_pengaduan}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
            <p class="text-muted">{{ Str::limit($row->isi_laporan,175) }}</p>
          </div>
          <div class="col-md-6">
            <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
            <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
            <p class="small mb-0 text-muted">(537) 315-1481</p>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col mb-2">
            
            @if ($row->status == "proses")
            <form action="/updatemapel/{{$row->id}}" method="POST">
              <button type="submit" class="btn btn-primary">Verifikasi</button>
            </form>
            @else
            <button type="button" class="btn btn-primary">Tanggapi</button>   
            @endif
            <button type="button" class="btn btn-secondary">Detail</button>
          </div>
        </div>
      </div>
    </div> <!-- / .row- -->
  </div> <!-- / .card-body - -->
</div> <!-- / .card- -->
@endforeach
@endsection