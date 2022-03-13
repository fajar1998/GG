@extends('master')
@section('judul', 'Kategori')
@section('bread', '/ Kategori')
@section('konten')
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Data Kategori
            <button type="button" data-toggle="modal" data-target="#modaldemo1" class="btn btn-info btn-sm"
                style="float: right;"><i class="fa fa-plus d-inline"></i> Tambah
                Kategori</button>
        </h6>
        <div class="table-responsive">
            <table class="table mg-b-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <thead>
                    <tr>
                        <th class="text-center" width="3%">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Act</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($kat as $key => $item)
                            <td width="3%">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">
                                <a href="" data-toggle="modal" data-target="#modaldemo2-{{ $item->id }}"
                                    class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                <a href="#ModalDelete{{ $item->id }}" data-toggle="modal" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                                @include('Admin.Kategori.modal_hapus')
                            </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    @include('Admin.Kategori.modal')
    @foreach ($kat as $data)
        <div id="modaldemo2-{{ $data->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-y-20 pd-x-25">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ubah Kategori</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-25">
                        <form action="{{ route('kategori.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Perbarui</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Batal</button>
                    </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    @endforeach
@endsection
