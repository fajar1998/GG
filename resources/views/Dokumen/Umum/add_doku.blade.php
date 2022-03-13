@extends('master')
@section('judul', 'Dokumen Umum')
@section('bread', '/ Tambah Dokumen Umum')
@section('konten')

    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Tambah Dokumen</h6>
        <br>
        <form action="{{ route('doku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <label>Nama Arsip</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama">
                </div>
                <div class="col">
                    <label>Kategori</label>
                    <select name="kat_id" id="" class="form-control">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col">
                    <label class="form-label">Unit Kerja</label>
                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">

                <div class=" col">
                    <label class="form-label">Tipe Dokumen</label>
                    <select name="tipe_doku" id="" class="form-control">
                        <option value="Nakes">Nakes</option>
                        <option value="Dokter">Dokter</option>
                    </select>
                </div>
                <div class="col">
                    <label>File</label>&nbsp;
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" class="form-control-file" name="file">
                    {{-- @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror --}}
                </div>

            </div>


            <br>
            <button style="float: right;" type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>

@endsection
