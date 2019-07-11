<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();

        return view('pages.siswa', ['siswa']);
    }

    public function create()
    {
        return view('pages.siswa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nis'           => 'required|unique|max:50',
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
            ->route('siswa')
            ->with('success', 'Siswa added successfully')
    }

    public function show($id)
    {
        $siswa = Siswa::find($id)->findOrFail();

        return view('siswa.show', ['siswa']);
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id)->findOrFail();

        return view('siswa.edit', ['siswa']);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id)->findOrFail();

        $this->validate($request, [
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kalimat' => 'required',
            'agama'         => 'required',
        ]);

        $siswa->update($data);

        return redirect()
            ->route('siswa')
            ->with('success', 'Siswa updated successfully');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id)->findOrFail();

        $siswa->delete();

        return redirect()
            ->route('siswa')
            ->with('success', 'Siswa deleted successfully');
    }
}
