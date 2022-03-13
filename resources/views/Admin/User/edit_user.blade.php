@extends('master')
@section('judul', 'Pengguna')
@section('bread', '/ Edit Pengguna')
@section('konten')

    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Ubah Pengguna </h6>
        <br>
        <form action="{{ route('user.update', $editData->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label>Nama Pengguna</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" value="{{ $editData->name }}">
                </div>
                <div class="col">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Email"
                        value="{{ $editData->email }}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Tanggal Lahir</label>
                    <input name="dob" type="date" class="form-control" value="{{ $editData->dob }}">
                </div>
                <div class="col">
                    <label>Unit Kerja</label>
                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ $editData->unit_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>

                    {{-- <select name="penamaan_id"  required="" class="form-control">
                        <option value="" selected="" disabled="">Pilih item</option>
                        @foreach ($penamaan as $jabatan)
                        <option value="{{$jabatan->id}}" {{$editData->penamaan_id == $jabatan->id? 'selected':''}}>{{$jabatan->name}}</option>
                        @endforeach

                    </select> --}}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Jabatan</label>
                    <select name="jabatan_id" class="form-control">
                        @foreach ($jabatan as $item)
                            <option value="{{ $item->id }}"
                                {{ $editData->jabatan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col">
                    <label>Hak Akses</label>
                    <select name="hak" id="" class="form-control">
                        <option selected disabled>Pilih Hak Akses</option>
                        <option value="1" {{ $editData->hak == '1' ? 'selected' : '' }}>Master</option>
                        <option value="2" {{ $editData->hak == '2' ? 'selected' : '' }}>Admin</option>
                        <option value="3" {{ $editData->hak == '3' ? 'selected' : '' }}>Dokter</option>
                        <option value="4" {{ $editData->hak == '4' ? 'selected' : '' }}>Nakes</option>
                    </select>
                </div>
            </div>
            <br>
            <button style="float: right;" type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>

@endsection
