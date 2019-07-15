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
        <a>Add</a>
    </li>
</ol>
@include('layouts.partials._messages')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        Add Transaksi
    </div>
    <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationNISSiswa">{{ __('NIS Siswa') }}</label>
                    <select name="nis_siswa" class="custom-select custom-select-sm" id="validationNISSiswa">
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ old('siswa') == $siswa->id ? 'selected' : '' }}>{{ $siswa->nis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationName">{{ __('Nama') }}</label>
                    <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="validationName" placeholder="Nama" value="{{ old('nama') }}" required>
                    @error('nama')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationKelas">{{ __('Kelas') }}</label>
                    <input name="kelas" type="text" class="form-control form-control-sm @error('kelas') is-invalid @enderror" id="validationKelas" placeholder="Kelas" value="{{ old('kelas') }}" required>
                    @error('kelas')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefaultJenisBayaran">{{ __('Jenis Bayaran') }}</label>
                    <input name="jenis_bayaran" type="text" class="form-control form-control-sm @error('jenis_bayaran') is-invalid @enderror" id="validationDefaultJenisBayaran" aria-describedby="inputGroupPrepend2" placeholder="Jenis Bayaran" value="{{ old('jenis_bayaran') }}" required>
                    @error('jenis_bayaran')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationJumlahBayaran">{{ __('Jumlah Bayaran') }}</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="validationJumlahBayaran" value="{{ old('jumlah_bayaran') }}" required>
                        @error('jumlah_bayaran')
                        <span class="invalid-feedback text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationPetugas">{{ __('Petugas') }}</label>
                    <input name="petugas" type="text" class="form-control form-control-sm @error('petugas') is-invalid @enderror" id="validationPetugas" placeholder="Petugas" value="{{ old('petugas') }}" required>
                    @error('petugas')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        // Format mata uang.
        $( '#validationJumlahBayaran' ).mask('000.000.000', {reverse: true});
    })
</script>
@endsection