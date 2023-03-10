<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $data = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('data'));
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

        $pengaduan = Pengaduan::find($id);
        $pengaduan -> update(['status' => 'selesai']);

        if($data){
            return redirect()->back()->with(['success' => 'Pengaduan Berhasil Disimpan!']);
        }else{
            return redirect()->back()->with(['error' => 'Pengaduan Gagal Disimpan!']);
        }  
    }

    public function filter_tanggal(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';
        
        $data = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        // dd($data);

        return view('admin.pengaduan.filter', ['data' => $data, 'from' => $from, 'to' => $to]);
    }

    public function print(Request $request, $from, $to)
    {
        $data = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        $pdf = PDF::loadView('print', ['data' => $data, 'request' =>  $request]);
      
        return $pdf->stream();
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
