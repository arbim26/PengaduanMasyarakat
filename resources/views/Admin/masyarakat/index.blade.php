@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))    
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data berhasil di ubah
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif   
@if ($message = Session::get('destroy'))    
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data berhasil di hapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif   
@if ($message = Session::get('fail_destroy'))    
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Data gagal di hapus
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif   
<div class="col-lg-12 grid-margin stretch-card">
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
                  Email
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            @forelse ($data as $row)
            <tbody>
                <tr>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->nik}}
                  </td>
                  <td>
                    {{$row->email}}
                  </td>
                  <td>
                    <div class="d-flex" style="gap: 10px">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('masyarakat.destroy', $row->id) }}" method="POST">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                          <button type="submit" style="border: none; background-color: transparent"><i class="bi bi-trash3"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
            </tbody>

            <form action="{{ route('masyarakat.update', $row->id) }}" method="POST">  
              @method("PUT")
              @csrf
              <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="border: none">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$row->name}}">
                      </div>      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$row->nik}}">
                      </div>      

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$row->email}}">
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
            @empty
            <div class="alert alert-danger" role="alert">
                belum ada user
            </div>
            @endforelse

          </table>
        </div>
      </div>
    </div>
  </div>
@endsection