@extends('master')
@section('judul', 'Dokumen')
@section('bread', '/ Dokumen Dokter')
@section('konten')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Dokumen Dokter
        </h6>
        <br>
        <form method="GET" action="{{ route('dokter.filter') }}">
            <div class="row ml-20">
                <div class="col-md-3">
                    <select name="kat_id" id="" class="form-control" style="float: right;">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ @$kat_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">

                    <select name="unit_id" id="" class="form-control">
                        @foreach ($unit as $item)
                            <option value="{{ $item->id }}" {{ @$unit_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="col-md-2 btn-group" role="group" aria-label="Basic example">
                    <input type="submit" class="btn btn-primary" name="search" value="Filter">
                    <a href="{{ route('docter.index') }}" class="btn btn-success"><i
                            class="fa fa-refresh"></i>&nbsp;Refresh</a>
                    <a href="{{ route('docter.create') }}" class="btn btn-info " style="float: right;"><i
                            class="fa fa-plus"></i>
                        Tambah
                        Dokumen</a>

        </form>

    </div>
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
            <br>
            <thead>
                <tr>
                    <th class="text-center" width="3%">#</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Upload</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key => $item)
                    <tr class="text-center">

                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item['kategori']['name'] }}</td>
                        <td>{{ $item['unit']['name'] }}</td>

                        <td>{{ $item->oleh }} | {{ date('d F , Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->update_oleh }} | {{ date('d F , Y', strtotime($item->updated_at)) }}</td>
                        {{-- {{ \Carbon\Carbon::parse($item->date)->isoFormat('dddd, D MMMM Y') }} --}}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{ route('docter.show', Crypt::encrypt($item->id)) }}"
                                        class="btn btn-primary dropdown-item" target="_blank">Lihat File</a>
                                    <a href="{{ route('docter.detail', Crypt::encrypt($item->id)) }}"
                                        class="btn btn-primary dropdown-item">Detail</a>
                                    <a href="{{ route('docter.edit', Crypt::encrypt($item->id)) }}"
                                        class="btn btn-primary dropdown-item" target="_blank">Update</a>
                                    @if (auth()->user()->hak == 1)
                                        <a href="#ModalDelete{{ $item->id }}" data-toggle="modal"
                                            class="btn btn-danger dropdown-item">Hapus</a>
                                        {{-- <a href="" data-toggle="modal" data-target="#myModal{{ $item->id }}"
                                                class="btn btn-danger dropdown-item">Hapus</a> --}}
                                    @endif
                                </div>
                            </div>
                            @include('Dokumen.Umum.hapus')
                        </td>
                @endforeach
                </tr>
            </tbody>

        </table>
        <br>
        <button class="btn btn-default btn-sm"> {{ $allData->links() }}</button>
    </div>
    </div>


@endsection
