@extends('layouts.app')

@section('content')
<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb->item">
        <a>Transaksi</a>
    </li>
</ol>
@include('layouts.partials._messages')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Data Table Transaksi</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIS Siswa</th>
                        <th>Transaksi</th>
                        <th>Jenis Bayaran</th>
                        <th>Jumlah Bayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NIS Siswa</th>
                        <th>Transaksi</th>
                        <th>Jenis Bayaran</th>
                        <th>Jumlah Bayaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->nis_siswa }}</td>
                        <td>{{ $transaksi->nama }}</td>
                        <td>{{ $transaksi->jenis_bayaran }}</td>
                        <td>{{ $transaksi->jumlah_bayaran }}</td>
                        <td class="d-flex flex-inline">
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-secondary btn-sm mr-2">Detail</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="post">
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
