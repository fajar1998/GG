<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProfilController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data['hak'] = ['','Master','Admin','Dokter','Nakes'];
            $id = Auth::user()->id;
            $data['user'] = User::find($id);
            // $data['detail']= SiswaTempatan::with(['siswa'])->where('siswa_id',$id)->first();
            $data['unit'] = Unit::all();
            return view('Profil.view',$data);
        }}

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
        // $validated = $request->validate([
        //     'foto' => 'required|mimes:jpg,nmp,png,jpeg|max:2048',

        // ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->unit_id = $request->unit_id;
        $data->dob = $request->dob;

        if ($request->file('foto')) {
            $file = $request->file('foto');
            @unlink(public_path('upload/profil/' . $data->foto));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/profil'), $filename);
            $data['foto'] = $filename;
        }
        $data->save();

        $notif = Session::flash('success', 'Berhasil MEmperbarui Profil');
        return redirect()->route('profil.index')->with($notif);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData =  Crypt::decrypt($id);
        $id = Auth::user()->id;
        $unit = Unit::all();
        $editData = User::find($id);

        return view('Profil.edit',compact('editData','unit'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
