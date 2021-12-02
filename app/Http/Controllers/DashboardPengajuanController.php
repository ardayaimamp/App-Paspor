<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardPengajuanController extends Controller
{
    public function index()
    {
        return view('dashboard.pengajuan.index',[
            'active'=>'pengajuan',
            'title'=>'Pengajuan',
            'sidebars' => ['listPemohon','dataAdmin'],
            'users'=>User::all()
        ]);
    }
}
