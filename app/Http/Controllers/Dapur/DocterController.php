<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Models\Doku;
use App\Models\Kategori;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class DocterController extends Controller
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
        $data['allData'] = Doku::where('tipe_doku','Dokter')->paginate(5);
        $data['kategori'] = Kategori::all();
        $data['unit'] = Unit::all();
        $data['kat_id'] = Kategori::orderBy('id','desc')->first()->id;
        $data['unit_id'] = Unit::orderBy('id','desc')->first()->id;
        return view('Dokumen.Dokter.v_dokter_d',$data);
    }
    public function FilterDoc(Request $request)
    {

        $data['unit'] = Unit::all();
        $data['kategori'] = Kategori::all();
        $data['unit_id'] = $request->unit_id;
        $data['kat_id'] = $request->kat_id;
        $check_data = Doku::where('unit_id', $request['unit_id'])->where('kat_id', $request['kat_id'])->where('tipe_doku', 'Dokter')->first();
        if ($check_data == true) {
        $data['allData'] = Doku::where('unit_id', $request['unit_id'])->where('kat_id', $request['kat_id'])->where('tipe_doku', 'Dokter')->paginate(5);
        return view('Dokumen.Dokter.v_dokter_d',$data);
    }else {
        $notif = Session::flash('error', 'Data Tidak Di Temukan');

        return redirect()->route('docter.index')->with($notif);

        }
    }

    public function DetailDoc($id)
    {
        $id =  Crypt::decrypt($id);
        $detail = Doku::find($id);
        $infopath = pathinfo(public_path('/upload/dokum/'.$detail->file));
        $filename = public_path('/upload/dokum/'.$detail->file);
        $extension = $infopath['extension'];

        return view('Dokumen.Dokter.detail_doc',compact('detail','extension'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['unit'] = Unit::all();
        $data['kategori'] = Kategori::all();
        return view('Dokumen.Dokter.add_doc',$data);
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
        $data->tipe_doku ='Dokter';
        $data['oleh'] = Auth::user()->name;

        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            // $size = Storage::size('upload/dokum/'.$filename);
            $file->move(public_path('upload/dokum'), $filename);
            $data['file'] = $filename;
        }


        $data->save();

        $notif = Session::flash('success', 'Berhasil Menambah Dokumen Dokter');
        return redirect()->route('docter.index')->with($notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $id =  Crypt::decrypt($id);
        $data['detail'] = Doku::find($id);
        return view('Dokumen.Dokter.show_dokter',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id =  Crypt::decrypt($id);
        $data = Doku::find($id);
        $unit = Unit::all();
        $kategori= Kategori::all();
          return view('Dokumen.Dokter.update_doc',compact('data','unit','kategori'));
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
        $data->tipe_doku ='Dokter';
        $data['update_oleh'] = Auth::user()->name;

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
        return redirect()->route('docter.index')->with($notif);
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
