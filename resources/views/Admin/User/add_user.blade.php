@extends('master')
@section('judul', 'Pengguna')
@section('bread', '/ Tambah User')
@section('konten')

    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Tambah Pengguna Keseluruhan </h6>
        <br>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <label>Nama Pengguna</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama">
                </div>
                <div class="col">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Tanggal Lahir</label>
                    <input name="dob" type="date" class="form-control" placeholder="Password">
                </div>
                <div class="col">
                    <label>Unit Kerja</label>
                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Jabatan</label>
                    <select name="jabatan_id" id="" class="form-control">
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col">
                    <label>Hak Akses</label>
                    <select name="hak" id="" class="form-control">
                        <option selected disabled>Pilih Hak Akses</option>
                        <option value="1">Master</option>
                        <option value="2">Admin</option>
                        <option value="3">Dokter</option>
                        <option value="4">Nakes</option>
                    </select>
                </div>
            </div>
            <br>
            <button style="float: right;" type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>

@endsection
