@extends('master')
@section('judul', 'Pengguna')
@section('bread', '/ User')
@section('konten')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Pengguna

        </h6>
        <br>
        <form method="GET" action="{{ route('user.index') }}">
            <div class="row ml-20">
                <div class="col-md-4 form-outline">
                    <input type="search" class="form-control" placeholder="Cari Pengguna" name="cari">
                </div>

                <div class="col-md-4 btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>Cari </button>
                    <a href="{{ route('user.index') }}" class="btn btn-success"><i
                            class="fa fa-refresh"></i>&nbsp;Refresh</a>
                    <a href="{{ route('user.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>
                        Tambah Pengguna</a>
                </div>
        </form>





    </div>
    <br>

    <div class="table-responsive">
        <table class="table mg-b-0">

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
            <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Unit Kerja</th>
                    <th class="text-center">Hak Akses</th>
                    @if (auth()->user()->hak == 1)
                        <th class="text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $item)
                    <tr class="text-center">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item['jabatan']['name'] }}</td>
                        <td>{{ $item['unit']['name'] }}</td>
                        <td>{{ $hak[$item->hak] }}</td>
                        @if (auth()->user()->hak == 1)
                            <td>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#myModal" data-toggle="modal" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button class="btn btn-default btn-sm" style="float: right;"> {{ $user->links() }}</button>


    </div>
    </div>
    @include('Admin.User.modal')
@endsection
