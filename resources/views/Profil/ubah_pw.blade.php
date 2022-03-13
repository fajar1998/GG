@extends('master')
@section('judul', 'Password')
@section('bread', '/ Update Password')
@section('konten')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">Ubah Password </h6>
        <br>
        <form action="{{ route('pw.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label>Ganti Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Input Password Baru"><br>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
                <div class="col"><br>

                </div>
            </div>
            <br>




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
