<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UnitController extends Controller
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
        $data['unit'] = Unit::all();
        return view('Admin.Unit.v_unit',$data);
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
            'name' => 'required|unique:units|max:30',
        ]);

        $data = new Unit();
        $data->name = $request->name;

        $data->save();

        // $notification = array(
        //     'message' => 'Berhasil Menambah Kelas',
        //     'alert-type' => 'success'
        // );
        $notif = Session::flash('success', 'Berhasil Menambah Unit Baru');
        return redirect()->route('unit.index')->with($notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $data = Unit::find($id);
        $data->name = $request->name;

        $data->update();

        // $notification = array(
        //     'message' => 'Berhasil Menambah Kelas',
        //     'alert-type' => 'success'
        // );
        $notif = Session::flash('success', 'Berhasil Memperbarui Unit');
        return redirect()->route('unit.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Unit::find($id);
        $list->delete();

        $notif = Session::flash('success', 'Berhasil Menghapus Data Unit  ');

            return redirect()->route('unit.index')->with($notif);
    }
}
