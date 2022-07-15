<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardPemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard/listPemohon/index',[
            'active'=>'listPemohon',
            'title'=>'List Pemohon',
            'users'=>User::where('level',0)->get(),
            'sidebars' => ['listPemohon','dataAdmin']
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.listPemohon.show',[
            'user' => $user,
            'title'=> 'Lihat Data Pemohon',
            'active'=> 'listPemohon',
            'sidebars' => ['listPemohon','dataAdmin']

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $listPemohon)
    {
        return view('dashboard.listPemohon.edit',[
            'title'=>'Edit Pemohon',
            'active'=>'listPemohon',
            'user'=>$listPemohon,
            'sidebars' => ['listPemohon','dataAdmin']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $listPemohon)
    {
        $rules = [
            'name'=>'required|max:50|min:1',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'foto_ktp'=>'image|file',
            'foto_self'=>'image|file',
            'tanggal_lahir' => 'date|required',
            'email'=> 'email:dns|required',
        ];

        if($request->nik != $listPemohon->nik){
            $rules['nik'] = 'required|numeric|min:16|unique:users';
        }

        $validatedData = $request->validate($rules);
        if($request->file('foto_ktp')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('file_ktp');
        }
        if($request->file('foto_self')){
            if($request->oldImage2){
                Storage::delete($request->oldImage2);
            }
            $validatedData['foto_self'] = $request->file('foto_self')->store('file_selfie');
        }


        User::where('id', $listPemohon->id)->update($validatedData);

        return redirect('/dashboard/listPemohon')->with('success','User sudah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $listPemohon)
    {

        if($listPemohon->foto_ktp){
            Storage::delete($listPemohon->foto_ktp);
        }
        if($listPemohon->foto_self){
            Storage::delete($listPemohon->foto_self);
        }

        // hapus pengajuan user tersebut
        // hapus user tersebut
        DB::transaction(function () use ($listPemohon) {
            Pengajuan::where('pemohon_id',$listPemohon->id)->delete();
            $listPemohon->delete();
        });

        return redirect('/dashboard/listPemohon')->with('success','Pemohon berhasil dihapus!');


    }
}
