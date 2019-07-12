<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\JenisKelamin;
use App\Agama;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswas         = Siswa::all();
        $jenis_kelamins = JenisKelamin::all();
        $agamas         = Agama::all();

        return view('pages.siswa.index', compact(
            'siswas',
            'jenis_kelamins',
            'agamas',
        ));
    }

    public function create()
    {
        return view('pages.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|unique:siswas|max:50',
            'nama'          => 'required|max:50',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
        ]);

        $data = [
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'         => $request->agama,
        ];

        Siswa::create($data);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Siswa added successfully');
    }

    public function show($id)
    {
        $siswa          = Siswa::findOrFail($id);
        $jenis_kelamins = JenisKelamin::all();
        $agamas         = Agama::all();

        return view('pages.siswa.show', compact(
            'siswa',
            'jenis_kelamins',
            'agamas',
        ));
    }

    public function edit($id)
    {
        $siswa          = Siswa::findOrFail($id);
        $jenis_kelamins = JenisKelamin::all();
        $agamas         = Agama::all();

        return view('pages.siswa.edit', compact(
            'siswa',
            'jenis_kelamins',
            'agamas',
        ));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $this->validate($request, [
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kalimat' => 'required',
            'agama'         => 'required',
        ]);

        $siswa->update($data);

        return redirect()
            ->route('siswa.index')
            ->with('info', 'Siswa updated successfully');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('warning', 'Siswa deleted successfully');
    }
}
