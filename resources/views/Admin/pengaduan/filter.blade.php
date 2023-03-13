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
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h4 class="card-title">Data Masyarakat</h4>
      </div>
      <div class="col">
        <form action="{{ route('filter') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-3 form-group">
              <input type="date" name="from" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-3 form-group">
              <input type="date" name="to" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-3">
              @if($data ?? '')
              <a href="{{ route('print', ['from' => $from, 'to' => $to]) }}" class="btn btn-danger">EXPORT PDF</a>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Masyarakat</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              Nama
            </th>
            <th>
              NIK
            </th>
            <th>
              Status
            </th>
            <th>
              Tanggal
            </th>
          </tr>
        </thead>
        @forelse ($data as $row)
        <tbody>
            <tr>
              <td>
                {{$row->user->name}}
              </td>
              <td>
                {{$row->user->nik}}
              </td>
              <td>
                <span class="badge me-1 <?php if  ($row->status == 'menunggu verifikasi'){ ?> bg-label-primary <?php   } ?> <?php if ($row->status == 'proses'){ ?> bg-label-warning <?php   } ?>  <?php if ($row->status == 'selesai'){ ?> bg-label-success <?php   } ?>">{{$row->status}}</span>
              </td>
              <td>
                {{$row->tgl_pengaduan}}
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                  Detail
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="text-center mb-3">
                          <img src="{{ Storage::url('foto/').$row->foto }}" width="300px" alt="">
                        </div>
                        <div>
                          <p>Isi Laporan :</p>
                          <p>{{$row->isi_laporan}}</p>
                        </div>
                        <div>
                          <p>Isi Tanggapan</p>
                          @if ($row->tanggapan)
                          <p>{{Str::limit($row->tanggapan->tanggapan,175)}}</p>
                          @else
                          <div class="alert alert-danger" role="alert">
                            Belum Di Tanggapi
                          </div>
                          @endif
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>


              <td>
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
              </td>
            </tr>
        </tbody>

        @empty
        <div class="alert alert-danger" role="alert">
            belum ada user
        </div>
        @endforelse

      </table>
    </div>
  </div>
</div>

@endsection