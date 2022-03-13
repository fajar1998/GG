<form action="{{ route('unit.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    @csrf
    <div class="modal fade" id="ModalDelete{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Anda Yakin Ingin Menghapus Unit&nbsp;<b>{{ $item->name }} ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Menghapus Data Bisa Menyebabkan Relasi Error </b><br> Pastikan Data Ini
                    Tidak Berelasi Dengan Tabel Manapun &nbsp;!!!</b>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Batal</button>


                </div>

            </div>

        </div>

    </div>
</form>
