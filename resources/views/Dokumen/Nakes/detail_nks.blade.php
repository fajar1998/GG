@extends('master')
@section('judul', 'Dokumen')
@section('bread', '/ Dokumen Nakes / Detail')
@section('konten')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Dokumen Nakes {{ $detail->name }}

        </h6>

        <div class="table-responsive">
            <table class="table mg-b-0">
                <tbody>
                <tbody>
                    <tr>
                        <td width="30%">Nama:</td>
                        <td>:</td>
                        <td width="30%">{{ $detail->name }}</td>

                        <td width="30%">Unit</td>
                        <td>:</td>
                        <td width="50%">{{ $detail['unit']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $detail['kategori']['name'] }}</td>

                        <td width="30%">Di Upload oleh</td>
                        <td>:</td>
                        <td width="50%">{{ $detail->oleh }}</td>
                    </tr>
                    <tr>
                        <td>Pada</td>
                        <td>:</td>
                        <td>{{ $detail->created_at }}</td>

                        <td width="30%">Tipe File</td>
                        <td>:</td>
                        <td width="50%">{{ $extension }}</td>
                    </tr>

                    <tr>
                        <td>Ukuran File</td>
                        <td>:</td>
                        <td> {{ number_format(File::size(public_path('/upload/dokum/' . $detail->file)), 0) }}
                            Byte
                        </td>
                        {{-- $filename = public_path('/upload/dokum/'.$detail->file); --}}

                        <td width="30%"><a href="{{ route('nakes.show', Crypt::encrypt($detail->id)) }}"
                                class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i>
                                Lihat File</a></td>
                        {{-- // <a href="{{ route('docter.show', Crypt::encrypt($item->id)) }}" //
                            class="btn btn-primary dropdown-item" target="_blank">Lihat File</a> --}}
                    </tr>
                </tbody>
            </table>


        </div>
    </div>


@endsection
