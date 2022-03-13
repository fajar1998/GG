@extends('master')
@section('judul', 'Dokumen Nakes')
@section('bread', '/ Update Dokumen Nakes')
@section('konten')

    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Update Dokumen Nakes</h6>
        <br>
        <form action="{{ route('nakes.update', $data) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label>Nama Arsip</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" value="{{ $data->name }}">
                </div>

                <div class="col">
                    <label>File</label>&nbsp;
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" class="form-control-file" name="file" value="{{ old('file', $data->file) }}">
                </div>
                <div class="col">
                    <label>Kategori</label>
                    <select name="kat_id" id="" class="form-control">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $data->kat_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col">
                    <label class="form-label">Unit Kerja</label>
                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ $data->unit_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>


            <br>
            <button style="float: right;" type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>


@endsection
