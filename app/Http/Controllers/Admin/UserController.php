<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserController extends Controller
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
    public function index(Request $request)
    {
        $data['hak'] = ['','Master','Admin','Dokter','Nakes'];
        // $data['user'] = User::all();

        $cari = $request->cari;
        $check_data = User::where('name', 'LIKE', '%'.$cari.'%')
        ->orwhere('jabatan_id', 'LIKE', '%'.$cari.'%')
        ->orwhere('unit_id', 'LIKE', '%'.$cari.'%')->first();
        if ($check_data == true) {
            $data['user'] = User::where('name', 'LIKE', '%'.$cari.'%')
            ->orwhere('jabatan_id', 'LIKE', '%'.$cari.'%')
            ->orwhere('unit_id', 'LIKE', '%'.$cari.'%')->paginate(5);
            return view('Admin.User.view',$data);
        }else {
            $notif = Session::flash('error', 'Data Tidak Di Temukan');

            return redirect()->back()->with($notif);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['unit'] = Unit::all();
        $data['jabatan'] = Jabatan::all();

        return view('Admin.User.add_user',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $sandi = $request->dob;
        $data->password = bcrypt($sandi);
        $data->hak = $request->hak;
        $data->jabatan_id = $request->jabatan_id;
        $data->unit_id = $request->unit_id;
        $data->dob = date('Y-m-d',strtotime($request->dob));

        $data->save();
        $notif = Session::flash('success', 'Berhasil Menambah Pengguna Baru');
        return redirect()->route('user.index')->with($notif);
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
        $data['editData'] = User::find($id);
        $data['unit'] = Unit::all();
        $data['jabatan'] = Jabatan::all();
        return view('Admin.User.edit_user',$data);
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

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $sandi = $request->dob;
        $data->password = bcrypt($sandi);
        $data->hak = $request->hak;
        $data->jabatan_id = $request->jabatan_id;
        $data->unit_id = $request->unit_id;
        $data->dob = date('Y-m-d',strtotime($request->dob));

        $data->save();

        $notif = Session::flash('success', 'Berhasil Memperbarui Data user  ');
        return redirect()->route('user.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = User::find($id);
        $list->delete();

        $notif = Session::flash('success', 'Berhasil Menghapus Data user  ');

            return redirect()->route('user.index')->with($notif);
    }
}
