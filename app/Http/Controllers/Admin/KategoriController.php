<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class KategoriController extends Controller
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
        $data['kat'] = Kategori::all();
        return view('Admin.Kategori.v_kat',$data);
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
        $validated = $request->validate([
            'name' => 'required|unique:kategoris|max:30',
        ]);

        $data = new Kategori();
        $data->name = $request->name;

        $data->save();

        // $notification = array(
        //     'message' => 'Berhasil Menambah Kelas',
        //     'alert-type' => 'success'
        // );
        return redirect()->route('kategori.index');
        // return redirect()->route('kelas.index')->with($notification);
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
        $data = Kategori::find($id);
        $data->name = $request->name;

        $data->update();

        // $notification = array(
        //     'message' => 'Berhasil Menambah Kelas',
        //     'alert-type' => 'success'
        // );
        $notif = Session::flash('success', 'Berhasil Memperbarui Kategori');
        return redirect()->route('kategori.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Kategori::find($id);
        $list->delete();

        $notif = Session::flash('success', 'Berhasil Menghapus Data Kategori  ');

            return redirect()->route('kategori.index')->with($notif);
    }
}
