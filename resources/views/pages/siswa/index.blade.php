@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a>Siswa</a>
    </li>
</ol>
@include('layouts.partials._messages')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <i class="fas fa-table"></i>
                Data Table Siswa
            </div>
            <div class="d-flex flex-inline">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#import">
                    Import
                </button>

                <!-- Modal -->
                <form action="{{ route('siswa.import') }}" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="importLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importLabel">Import Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input name="file" type="file" class="custom-file-input" id="import-file" required>
                                            <label class="custom-file-label" for="import-file">Choose file...</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">Import</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>

                <a href="{{ route('siswa.export') }}" class="btn btn-primary btn-sm">Export</a>
            </div>
        </div>
    </div>
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
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td class="d-flex flex-inline">
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-secondary btn-sm mr-2">Detail</a>
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection