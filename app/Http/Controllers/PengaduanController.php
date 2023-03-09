<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengaduan::get();
        $data2 = Tanggapan::get();
        return view('admin.pengaduan.index', compact('data','data2'));
    }

    public function verifikasi($id)
    {
        $data = Pengaduan::find($id);
        $data->update(['status' => 'proses']);
        return redirect()->back()->with(['success' => 'Data berhasil di verifikasi!']);
    }

    public function tanggapan(request $request, $id)
    {
        $this->validate($request, [
            'tanggapan'   => 'required',
        ]);
        
        $user = Auth::guard('admin')->user()->id;
        $date = Carbon::now();
        $today = $date->format('Y-m-d');

        $data = Tanggapan::create([
            'id_pengaduan'     => $id,
            'id_admin'         => $user,
            'tgl_tanggapan'    => $date,
            'tanggapan'        => $request->tanggapan,
        ]);

        if($data){
            return redirect()->back()->with(['success' => 'Pengaduan Berhasil Disimpan!']);
        }else{
            return redirect()->back()->with(['error' => 'Pengaduan Gagal Disimpan!']);
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
?>
