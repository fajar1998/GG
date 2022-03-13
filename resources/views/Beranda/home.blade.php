@extends('master')
@section('judul', 'Beranda')
{{-- @section('bread', 'Beranda') --}}
@section('konten')
    <div class="card pd-20 pd-sm-30">
        <p class="mg-b-15 mg-sm-b-20">Selamat Datang <strong>{{ Auth::user()->name }}</strong><br>
            Silahkan Klik Tombol Dokumen Sebagai Pintasan Anda

            <a href="" data-toggle="modal" data-target="#modaldemo1" class="btn btn-info btn-sm" style="float: right;">
                Dokumen
            </a>
        </p>


    </div>
    @if (auth()->user()->hak == 1)
        <div class="row row-sm mg-t-20">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-spacing-1">Total Pengguna</h6>
                    </div><!-- d-flex -->
                    <h2 class="tx-purple tx-lato tx-center mg-b-15">{{ $total }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card bg-purple tx-white pd-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-white-8 tx-spacing-1">Dokumen</h6>
                    </div><!-- d-flex -->
                    <h2 class="tx-lato tx-center mg-b-15">{{ $totaldoku }}</h2>

                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-spacing-1">Unit</h6>
                    </div><!-- d-flex -->
                    <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ $totalunit }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card bg-teal tx-white pd-25">
                    <div class="d-flex align-items-center justify-content-between mg-b-10">
                        <h6 class="card-body-title tx-12 tx-white-8 tx-spacing-1">Kategori</h6>
                    </div><!-- d-flex -->
                    <h2 class="tx-lato tx-center mg-b-15">{{ $totalkat }}</h2>
                </div><!-- card -->
            </div><!-- col-3 -->
        </div>
    @endif
@endsection
