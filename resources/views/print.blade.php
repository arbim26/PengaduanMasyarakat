<style>
h3{
    font-family: arial, sans-serif;    
}

p{
    font-family: arial, sans-serif;  
    font-size: 10px  
}

table {
  font-family: arial, sans-serif;
  font-size: 10px;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<h3 style="text-align: center">Laporan Pengaduan</h3>
<p>Periode Pengaduan: {{$request->from}} / {{$request->to}}</p>
<table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Tanggal Pengaduan</th>
        <th>NIK Pengguna</th>
        <th>Isi Laporan</th>
        <th>Petugas Menggapil</th>
        <th>Tanggapan</th>
      </tr>
    </thead>
    @foreach ($data as $row)
    <tbody>
        <tr>
          <td>{{$row->id}}
          </td>
          <td>
            {{$row->tgl_pengaduan}}
          </td>
          <td>
            {{$row->user->nik}}
          </td>
          <td>
            {{$row->isi_laporan}}
          </td>
          @if ($row->tanggapan)           
          <td>
            {{$row->tanggapan->id}}
          </td>
          @else
          <td>
            Belum DI Tanggapi
          </td>
          @endif
          @if ($row->tanggapan)           
          <td>
            {{$row->tanggapan->tanggapan}}
          </td>
          @else
          <td>
            Belum DI Tanggapi
          </td>
          @endif
        </tr>
    </tbody>
    @endforeach
</table>