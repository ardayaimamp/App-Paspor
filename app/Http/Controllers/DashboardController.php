<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard/index',[
            'title'=>'Dashboard',
            'active'=>'dashboard',
            'now' => Carbon::now()->setTimezone('Asia/Phnom_Penh'),
            'sidebars' => ['listPemohon','dataAdmin'],
            'pengajuan'=> Pengajuan::where('status','pending')->get(),
            'pengajuan_user'=> Pengajuan::where('status','pending')->where('pemohon_id', auth()->user()->id)->get(),
            'pemohon' => User::all(),
            'shift' => Shift::all(),
            'hitungBaris_user' => Pengajuan::where('status','pending')->where('pemohon_id', auth()->user()->id)->count(),
            'hitungBaris' => Pengajuan::where('status','pending')->count(),
            'userTolak' => Pengajuan::where('status','ditolak')->where('pemohon_id', auth()->user()->id)->get(),
            'userTolak_count' => Pengajuan::where('status','ditolak')->where('pemohon_id', auth()->user()->id)->count(),
            'userTerima' => Pengajuan::where('status','diterima')->where('pemohon_id', auth()->user()->id)->get(),
            'adminTerima' => Pengajuan::where('status','diterima')->get(),
            'adminTerima_count' => Pengajuan::where('status','diterima')->count(),
            'adminTolak' => Pengajuan::where('status','ditolak')->get(),
            'adminTolak_count' => Pengajuan::where('status','ditolak')->count(),
            'userTerima_count' => Pengajuan::where('status','diterima')->where('pemohon_id', auth()->user()->id)->count(),
        ]);
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
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $dashboard)
    {
        $rules = [
            'shift_id'=>'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['status'] = "diterima";

        Pengajuan::where('id', $dashboard->id)->update($validatedData);

        return redirect('/dashboard')->with('success','Permohonan sudah di accept!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function tolak($id_pengajuan)
    {

        //ieu teh anu hijian ulah poho wae
        Pengajuan::where('id',$id_pengajuan)->update([
            'status' => 'ditolak'
        ]);

        return redirect('/dashboard')->with('success','Pengajuan telah ditolak!');
    }
}
