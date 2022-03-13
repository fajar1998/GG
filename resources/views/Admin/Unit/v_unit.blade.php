@extends('master')
@section('judul', 'Unit')
@section('bread', '/ Unit')
@section('konten')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Unit Kerja
            <button type="button" data-toggle="modal" data-target="#modaldemo1" class="btn btn-info btn-sm"
                style="float: right;"><i class="fa fa-plus d-inline"></i> Tambah
                Unit</button>
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
                        <th class="text-center">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unit as $key => $item)
                        <tr class="text-center">

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modaldemo2-{{ $item->id }}"
                                    class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                <a href="#ModalDelete{{ $item->id }}" data-toggle="modal" class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                                @include('Admin.Unit.modal_hapus')
                            </td>
                    @endforeach
                    </tr>



                </tbody>
            </table>
        </div>
    </div>

    @include('Admin.Unit.modal_unit')
    @foreach ($unit as $data)
        <div id="modaldemo2-{{ $data->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-y-20 pd-x-25">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ubah Unit</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-25">
                        <form action="{{ route('unit.update', $data->id) }}" method="POST">
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
