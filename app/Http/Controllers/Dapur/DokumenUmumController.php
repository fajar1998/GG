<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Models\Doku;
use App\Models\Kategori;
use App\Models\Unit;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Block\Element\Document;

class DokumenUmumController extends Controller
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
        $data['allData'] = Doku::paginate(5);
        $data['kategori'] = Kategori::all();
        $data['unit'] = Unit::all();
        $data['kat_id'] = Kategori::orderBy('id','desc')->first()->id;
        $data['unit_id'] = Unit::orderBy('id','desc')->first()->id;
        return view('Dokumen.Umum.v_doku',$data);
    }

    public function Filter(Request $request)
    {

        $data['unit'] = Unit::all();
        $data['kategori'] = Kategori::all();
        $data['unit_id'] = $request->unit_id;
        $data['kat_id'] = $request->kat_id;
        $data['tipe_doku'] = $request->tipe_doku;
        $check_data = Doku::where('unit_id', $request['unit_id'])->where('kat_id', $request['kat_id'])->where('tipe_doku', $request['tipe_doku'])->first();
        if ($check_data == true) {
        $data['allData'] = Doku::where('unit_id', $request['unit_id'])->where('kat_id', $request['kat_id'])->where('tipe_doku', $request['tipe_doku'])->paginate(5);
        return view('Dokumen.Umum.v_doku',$data);
    }else {
        $notif = Session::flash('error', 'Data Tidak Di Temukan');

        return redirect()->route('doku.index')->with($notif);

        }
    }
    public function Detail($id)
    {
        $detail = Doku::find($id);
        $infopath = pathinfo(public_path('/upload/dokum/'.$detail->file));
        $filename = public_path('/upload/dokum/'.$detail->file);
        $extension = $infopath['extension'];

        return view('Dokumen.Umum.detail',compact('detail','extension'));
    }
    /**}
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['unit'] = Unit::all();
        $data['kategori'] = Kategori::all();

        return view('Dokumen.Umum.add_doku',$data);
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
            'file' => 'required|mimes:pdf|max:2048',

        ]);

        $data = new Doku();
        $data->name = $request->name;
        $data->kat_id = $request->kat_id;
        $data->unit_id = $request->unit_id;
        $data->tipe_doku = $request->tipe_doku;
        $data['oleh'] = Auth::user()->name;

        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            // $size = Storage::size('upload/dokum/'.$filename);
            $file->move(public_path('upload/dokum'), $filename);
            $data['file'] = $filename;
        }


        $data->save();

        $notif = Session::flash('success', 'Berhasil Menambah Dokumen Baru');
        return redirect()->route('doku.index')->with($notif);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $data['detail'] = Doku::find($id);
        return view('Dokumen.Umum.show_unit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = Doku::find($id);
      $unit = Unit::all();
      $kategori= Kategori::all();
        return view('Dokumen.Umum.ubah_doku',compact('data','unit','kategori'));
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
        $validated = $request->validate([
            'file' => 'mimes:pdf|max:2048',

        ]);

        $data = Doku::where('id',$id)->first();
        $data->name = $request->name;
        $data->kat_id = $request->kat_id;
        $data->unit_id = $request->unit_id;
        $data->tipe_doku = $request->tipe_doku;
        $data['oleh'] = Auth::user()->name;

        if ($request->file('file')) {
            $file = $request->file('file');
            @unlink(public_path('upload/dokum/' . $data->file));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            // $size = Storage::size('upload/dokum/'.$filename);
            $file->move(public_path('upload/dokum'), $filename);
            $data['file'] = $filename;
        }


        $data->save();

        $notif = Session::flash('success', 'Berhasil Memperbarui Dokumen');
        return redirect()->route('doku.index')->with($notif);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Doku::find($id);
        $file = '/upload/dokum/'.$data->file;
        $path = str_replace('\\','/',public_path());
        // dd($path.$file);
        if (file_exists($path.$file)) {
           unlink($path.$file);

        $data->delete();
        $notif = Session::flash('success', 'Berhasil Menghapus Data Berserta File Arsip');
            return redirect()->route('doku.index')->with($notif);
    }else{
        $data->delete();
        $notif = Session::flash('success', 'Berhasil Menghapus Data Dengan File Kosong');
            return redirect()->route('doku.index')->with($notif);
    }
    }
}
