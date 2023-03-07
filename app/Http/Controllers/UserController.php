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
    public function store(request $request)
    {
        // dd(Auth::guard('web')->user());
        // if (Auth::guard('web')) {
        //     return redirect()->route('login')->with(['success' => 'Anda harus logon terlebih dahulu']);
        // } else {
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
                //redirect dengan pesan sukses
                return redirect()->route('user')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('user')->with(['error' => 'Data Gagal Disimpan!']);
            }   
        }
    }
// }
?>