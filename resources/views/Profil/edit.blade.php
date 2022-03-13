@extends('master')
@section('judul', 'Pengguna')
@section('bread', '/ Edit Pengguna')
@section('konten')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Ubah Pengguna </h6>
        <br>
        <form action="{{ route('profil.store', $editData->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                    <input required name="dob" type="date" class="form-control" value="{{ $editData->dob }}">
                </div>
                <div class="col">
                    <label>Unit Kerja</label>
                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ $editData->unit_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>


                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Foto</label>
                    <input name="foto" type="file" class="form-control" id="image">
                </div>
                <br>
                <div class="col">
                    <br>
                    <img id="showImage"
                        src="{{ !empty($user->foto) ? url('upload/profil/' . $user->foto) : url('upload/icon.jpg') }}"
                        alt="users avatar" class="users-avatar-shadow rounded-circle" height="70" width="70">
                </div>
            </div>
            <br>
            <br>
            <button style="float: right;" type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
