<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class JabatanController extends Controller
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
        $data['jabatan'] = Jabatan::all();
        return view('Admin.Jabatan.v_jabatan',$data);
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
        $data = new Jabatan();
        $data->name = $request->name;

        $data->save();

        $notif = Session::flash('success', 'Berhasil Menambah Jabatan Baru');
        return redirect()->route('jabatan.index')->with($notif);
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
        //
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
        $data = Jabatan::find($id);
        $data->name = $request->name;

        $data->update();

        // $notification = array(
        //     'message' => 'Berhasil Menambah Kelas',
        //     'alert-type' => 'success'
        // );
        $notif = Session::flash('success', 'Berhasil Memperbarui Jabatan');
        return redirect()->route('jabatan.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jabatan::find($id);

        $data->delete();
        $notif = Session::flash('success', 'Berhasil Menghapus Data Jabatan');
            return redirect()->route('jabatan.index')->with($notif);

    }
}
