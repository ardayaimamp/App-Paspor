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

        return view('/dashboard/index',[
            'title'=>'Dashboard',
            'active'=>'dashboard',
            'now' => Carbon::now()->setTimezone('Asia/Phnom_Penh'),
            'sidebars' => ['listPemohon','dataAdmin'],
            'pengajuan'=> Pengajuan::where('status','pending')->get(),
            'pemohon' => User::all(),
            'shift' => Shift::all(),
            'hitungBaris' => Pengajuan::where('status','pending')->count()
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
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $rules = [
        //     'shift'=>'required'
        // ];

        // if($request->nik != $listPemohon->nik){
        //     $rules['nik'] = 'required|numeric|min:16|unique:users';
        // }

        // $validatedData = $request->validate($rules);
        // if($request->file('foto_ktp')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('file_ktp');
        // }
        // if($request->file('foto_self')){
        //     if($request->oldImage2){
        //         Storage::delete($request->oldImage2);
        //     }
        //     $validatedData['foto_self'] = $request->file('foto_self')->store('file_selfie');
        // }


        // User::where('id', $listPemohon->id)->update($validatedData);

        // return redirect('/dashboard/listPemohon')->with('success','User sudah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
