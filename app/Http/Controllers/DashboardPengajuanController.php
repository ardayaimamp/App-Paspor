<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengajuan.index',[
            'active'=>'pengajuan',
            'title'=>'Pengajuan',
            'sidebars' => ['listPemohon','dataAdmin'],
            'users'=>User::all(),
            'now' =>Carbon::now()->setTimezone('Asia/Phnom_Penh')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tanggal_pengajuan'=>'required|date_format:Y-m-d',
            'surat_kehilangan' => 'required|image|file',
            'deskripsi' => 'required|min:10'
        ]);

        $validatedData['pemohon_id'] = auth()->user()->id;
        $hitungBaris = Pengajuan::where('tanggal_pengajuan', $validatedData['tanggal_pengajuan'])->count('tanggal_pengajuan');
        $hitungNama = Pengajuan::where('pemohon_id',$validatedData['pemohon_id'] )->count('pemohon_id');
        $filterKTP = auth()->user()->foto_ktp;
        $filterKK = auth()->user()->kartu_keluarga;
        $filterAkta = auth()->user()->akta_kelahiran;

        if(!$filterKTP){
            return redirect('/dashboard/pengajuan')->with('toast_error','Tolong lengkapi dulu KTP anda');
        }
        if(!$filterKK){
            return redirect('/dashboard/pengajuan')->with('toast_error','Tolong lengkapi dulu KK anda');
        }
        if(!$filterAkta){
            return redirect('/dashboard/pengajuan')->with('toast_error','Tolong lengkapi dulu Akta Kelahiran anda');
        }
        if($hitungNama >= 1){
            return redirect('/dashboard/pengajuan')->with('toast_error','Anda sudah pernah melakukan pengajuan');
        }
        if ($hitungBaris >= 10){
            return redirect('/dashboard/pengajuan')->with('toast_error','Tanggal Sudah Melebihi Maksimal');
        }
        if($request->file('surat_kehilangan')){
            $validatedData['surat_kehilangan'] = $request->file('surat_kehilangan')->store('file_surat');
        }

        $validatedData['status'] = "pending";

        Pengajuan::create($validatedData);

        return redirect('/dashboard/pengajuan')->with('success','Pengajuan sudah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
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
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
