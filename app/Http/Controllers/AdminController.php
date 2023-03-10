<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function masyarakat()
    {

    }

    public function update_masyarakat(Request $request, $id)
    {

    }

    public function delete_masyarakat($id)
    {

    }

    public function admin()
    {
        $data = User::get();
        return view('Admin.masyarakat.index', compact('data'));
    }
}
?>
