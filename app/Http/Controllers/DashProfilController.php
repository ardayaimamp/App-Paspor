<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardProfilController extends Controller
{
    public function index()
    {
        return view('dashboard.profil.index',[
            'active'=>'profil',
            'title'=>'Profil',
            'sidebars' => ['listPemohon','dataAdmin']
        ]);
    }
    public function update(Request $request, User $user)
    {
        dd($request);
    }
}
