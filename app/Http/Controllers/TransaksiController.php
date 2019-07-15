<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaksis = Transaksi::all();

        return view('pages.transaksi.index', compact(
            'transaksis',
        ));
    }

    public function create()
    {
        $siswas = Siswa::all();

        return view('pages.transaksi.create', compact(
            'siswas',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis_siswa'         => 'required',
            'nama'              => 'required|max:50',
            'kelas'             => 'required|max:50',
            'jenis_bayaran'     => 'required|max:25',
            'jumlah_bayaran'    => 'required',
            'petugas'           => 'required|max:50',
        ]);

        $data = [
            'nis_siswa'         => $request->nis_siswa,
            'nama'              => $request->nama,
            'kelas'             => $request->kelas,
            'jenis_bayaran'     => $request->jenis_bayaran,
            'jumlah_bayaran'    => $request->jumlah_bayaran,
            'petugas'           => $request->petugas,
        ];

        Transaksi::create($data);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi added successfully');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('pages.transaksi.show', compact(
            'transaksi',
        ));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('pages.transaksi.edit', compact(
            'transaksi',
        ));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'nama'              => 'required|max:50',
            'kelas'             => 'required|max:50',
            'jenis_bayaran'     => 'required|max:25',
            'jumlah_bayaran'    => 'required',
            'petugas'           => 'required',
        ]);

        $data = [
            'nama'              => $request->nama,
            'kelas'             => $request->kelas,
            'jenis_bayaran'     => $request->jenis_bayaran,
            'jumlah_bayaran'    => $request->jumlah_bayaran,
            'petugas'           => $request->petugas, 
        ];

        $transaksi->update($data);

        return reidrect()
            ->route('transaksi.index')
            ->with('info', 'Transaksi updated successfully');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('warning', 'Transaksi deleted successfully');
    }
}
