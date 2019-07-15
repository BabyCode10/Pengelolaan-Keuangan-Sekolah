@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('transaksi.index') }}">Transaksi</a>
    </li>
    <li class="breadcrumb-item">
        <a>Update</a>
    </li>
</ol>
@include('layouts.partials._messages')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        Update Transaksi
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationNISSiswa">{{ __('NIS Siswa') }}</label>
                <input name="nama" type="text" class="form-control form-control-sm" id="validationNISSiswa" placeholder="NIS Siswa" value="{{ $transaksi->nis_siswa }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationName">{{ __('Nama') }}</label>
                <input name="nama" type="text" class="form-control form-control-sm" id="validationName" placeholder="Nama" value="{{ $transaksi->nama }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationKelas">{{ __('Kelas') }}</label>
                <input name="kelas" type="text" class="form-control form-control-sm" id="validationKelas" placeholder="Kelas" value="{{ $transaksi->kelas }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationDefaultJenisBayaran">{{ __('Jenis Bayaran') }}</label>
                <input name="jenis_bayaran" type="text" class="form-control form-control-sm" id="validationDefaultJenisBayaran" placeholder="Jenis Bayaran" value="{{ $transaksi->jenis_bayaran }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationJumlahBayaran">{{ __('Jumlah Bayaran') }}</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" class="form-control form-control-sm" id="validationJumlahBayaran" value="{{ $transaksi->jumlah_bayaran }}" readonly>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationPetugas">{{ __('Petugas') }}</label>
                <input name="petugas" type="text" class="form-control form-control-sm @error('petugas') is-invalid @enderror" id="validationPetugas" placeholder="Petugas" value="{{ $transaksi->petugas }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection