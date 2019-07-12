@extends('layouts.app')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}"></i>Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a>Siswa</a>
    </li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Data Table Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($siswas as $siswa)
                    <tr>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->jenis_kelamin->id }}</td>
                        <td>
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                            <a href="{{ route('siswa.destroy', $siswa->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
