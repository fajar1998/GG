<div id="modaldemo1" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Jabatan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <form action="{{ route('unit.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Tambahkan</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
