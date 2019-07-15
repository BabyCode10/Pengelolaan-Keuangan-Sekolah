@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('siswa.index') }}">Siswa</a>
    </li>
    <li class="breadcrumb-item">
        <a>Detail</a>
    </li>
</ol>
@include('layouts.partials._messages')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        Detail Siswa
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationNIS">NIS</label>
                <input name="nis" type="text" class="form-control form-control-sm" id="validationNIS" value="{{ $siswa->nis }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationName">Nama</label>
                <input name="nama" type="text" class="form-control form-control-sm" id="validationName" value="{{ $siswa->nama }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationDefaultAlamat">Alamat</label>
                <textarea name="alamat" type="text" class="form-control form-control-sm" id="validationDefaultAlamat" aria-describedby="inputGroupPrepend2" readonly>{{ $siswa->alamat }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationJenisKelamin">Jenis Kelamin</label>
                <input name="nama" type="text" class="form-control form-control-sm" id="validationJenisKelamin" value="{{ $siswa->jenis_kelamin->name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationAgama">Agama</label>
                <input name="nama" type="text" class="form-control form-control-sm" id="validationAgama" value="{{ $siswa->agama->name }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
