@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"></i>Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('siswa.index') }}">Siswa</a>
    </li>
    <li class="breadcrumb-item">
        <a>Create</a>
    </li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        Update Siswa
    </div>
    <div class="card-body">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationNIS">NIS</label>
                    <input name="nis" type="text" class="form-control form-control-sm @error('nis') is-invalid @enderror" id="validationNIS" placeholder="NIS" value="{{ $siswa->nis }}" required>
                    @error('nis')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationName">{{ __('Nama') }}</label>
                    <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="validationName" placeholder="Nama" value="{{ $siswa->name }}" required>
                    @error('nama')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationDefaultAlamat">{{ __('Alamat') }}</label>
                    <textarea name="alamat" type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="validationDefaultAlamat" aria-describedby="inputGroupPrepend2" required>{{ $siswa->alamat }}</textarea>
                    @error('alamat')
                    <span class="invalid-feedback text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationJenisKelamin">{{ __('Jenis Kelamin') }}</label>
                    <select name="jenis_kelamin" class="custom-select custom-select-sm my-1 mr-sm-2" id="validationJenisKelamin">
                        @foreach ($jenis_kelamins as $jenis_kelamin)
                        <option value="{{ $jenis_kelamin->id }}" {{ $siswa->id_jenis_kelamin == $jenis_kelamin->id ? 'selected' : '' }}>{{ $jenis_kelamin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationAgama">{{ __('Agama') }}</label>
                    <select name="agama" class="custom-select custom-select-sm my-1 mr-sm-2" id="validationAgama">
                        @foreach ($agamas as $agama)
                        <option value="{{ $agama->id }}" {{ $siswa->id_agama == $agama->id ? 'selected' : '' }}>{{ $agama->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
