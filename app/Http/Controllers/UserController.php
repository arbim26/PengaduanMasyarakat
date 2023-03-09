<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    public function riwayat()
    {
        $user = User::find(Auth::user()->id);
        $data = Pengaduan::where('user_id', $user->id)->paginate(3);
        return view('riwayat',['user' => $user], compact('data'));
    }

    public function store(request $request)
    {
        if (!Auth::guard('web')->user()) {
            return redirect()->route('login')->with(['error' => 'Anda harus logon terlebih dahulu']);
        } else {
            $this->validate($request, [
                'laporan'   => 'required',
                'image'     => 'required|image|mimes:png,jpg,jpeg',
            ]);
            
            $image = $request->file('image');
            $image->storeAs('public/foto', $image->hashName());
            $user = Auth::guard('web')->user()->id;
            $date = Carbon::now();
            $today = $date->format('Y-m-d');
    
            $data = Pengaduan::create([
                'tgl_pengaduan'     => $today,
                'user_id'             => $user,
                'isi_laporan'       => $request->laporan,
                'foto'             => $image->hashName(),
                'status'            => 1,
            ]);
    
            if($data){
                return redirect()->route('riwayat')->with(['success' => 'Pengaduan Berhasil Disimpan!']);
            }else{
                return redirect()->route('riwayat')->with(['error' => 'Pengaduan Gagal Disimpan!']);
            }   
        }
    }
}
?>