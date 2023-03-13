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
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px">
          <h4 class="card-title">Data Masyarakat</h4>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModals">
            Tambah Admin
          </button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Nama
                </th>
                <th>
                  Role
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
                    <?php if ($row->role == 1){ ?> Admin <?php   } ?> 
                    <?php if ($row->role == 2){ ?> Petugas <?php   } ?> 
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
                        @if ($row->name == "Admin")
                            
                        @else                            
                        <button type="submit" style="border: none; background-color: transparent"><i class="bi bi-trash3"></i></button>
                        @endif
                        @csrf
                        @method('DELETE')
                      </form>
                    </div>
                  </td>
                </tr>
            </tbody>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <form action="{{route('admin.register')}}"  method="POST">
             @csrf
             <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body d-flex flex-column gap-3" style="border: none">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="nama">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>  
                    <div class="form-group">
                      <select class="form-control" name="role" id="exampleFormControlSelect1">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>                 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- Modal -->

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
                            <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" disabled value="<?php if ($row->role == 1){ ?> Admin <?php   } ?><?php if ($row->role == 2){ ?> Petugas <?php   } ?>" id="exampleFormControlSelect1">
                          <option value="1">Admin</option>
                          <option value="2">Petugas</option>    
                        </select>
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