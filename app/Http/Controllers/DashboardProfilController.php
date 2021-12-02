<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.view',[
            'active'=>'profil',
            'title'=>'Profil',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profil.index',[
            'active'=>'profil',
            'title'=>'Profil',
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
    public function update(Request $request, User $profil)
    {
        $rules = [
            'name'=>'required|max:50|min:1',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'foto_ktp'=>'image|file',
            'kartu_keluarga'=>'image|file',
            'akta_kelahiran'=>'image|file',
            'email'=> 'email:dns|required',
        ];

        if($request->nik != $profil->nik){
            $rules['nik'] = 'required|numeric|min:16|unique:users';
        }

        $validatedData = $request->validate($rules);
        if($request->file('foto_ktp')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('file_ktp');
        }
        if($request->file('kartu_keluarga')){
            if($request->oldImage2){
                Storage::delete($request->oldImage2);
            }
            $validatedData['kartu_keluarga'] = $request->file('kartu_keluarga')->store('file_kk');
        }
        if($request->file('akta_kelahiran')){
            if($request->oldImage3){
                Storage::delete($request->oldImage3);
            }
            $validatedData['akta_kelahiran'] = $request->file('akta_kelahiran')->store('file_akta');
        }


        User::where('id', $profil->id)->update($validatedData);

        return redirect('/dashboard/profil')->with('success','Profil sudah di update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
