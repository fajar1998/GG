@extends('master')
@section('judul', 'Profil')
@section('bread', '/ Profil')
@section('konten')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profil Saya
            <br>


        </h6>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('error') }}
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('warning') }}
            </div>
        @endif
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <img src="{{ !empty($user->foto) ? url('upload/profil/' . $user->foto) : url('upload/icon.jpg') }}"
                            alt="users view avatar" height="100" width="100">
                        <div class="col-8 col-md-12">
                            {{-- Crypt::encrypt($item->id)) --}}

                            <a href="{{ route('profil.edit', Crypt::encrypt($user->id)) }}" class="btn btn-info btn-sm"
                                style="float: right;"><i class="fa fa-refresh d-inline"></i>
                                Update Profil</a>

                            <a href="{{ route('pw.edit', Crypt::encrypt($user->id)) }}" class="btn btn-danger btn-sm"
                                style="float: right;"><i class="fa fa-exchange d-inline"></i>
                                Ganti Password</a><br>
                            <table class="table">


                                <tbody>


                                    <tr>
                                        <td width="20%">Nama:</td>
                                        <td>:</td>
                                        <td width="20%">{{ $user->name }}</td>



                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Lahir</td>
                                        <td>:</td>
                                        <td width="50%">{{ $user->dob }}</td>
                                    </tr>


                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td width="50%">{{ $hak[$user->hak] }}</td>


                                    </tr>
                                    <tr>
                                        <td width="20%">Email</td>
                                        <td>:</td>
                                        <td>{{ $user->email }}</td>


                                        <td width="20%"> </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
