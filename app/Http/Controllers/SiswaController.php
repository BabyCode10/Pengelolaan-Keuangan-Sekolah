<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\ImportSiswaJob;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\Siswa;
use App\JenisKelamin;
use App\Agama;
use Carbon\Carbon;

class SiswaController extends Controller
{
    protected $jenis_kelamins, $agamas;

    public function __construct()
    {
        $this->middleware('auth');
        $this->jenis_kelamins = [
            'laki-laki',
            'perempuan',
        ];
        $this->agamas = [
            'islam',
            'budha',
            'hindu',
            'kristen',
        ];
    }

    public function index()
    {
        $siswas         = Siswa::all();

        return view('pages.siswa.index', compact(
            'siswas',
        ));
    }

    public function create()
    {
        $jenis_kelamins = $this->jenis_kelamins;
        $agamas         = $this->agamas;

        return view('pages.siswa.create', compact(
            'jenis_kelamins',
            'agamas',
        ));
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
        $jenis_kelamins = $this->jenis_kelamins;
        $agamas         = $this->agamas;

        return view('pages.siswa.show', compact(
            'siswa',
            'jenis_kelamins',
            'agamas',
        ));
    }

    public function edit($id)
    {
        $siswa          = Siswa::findOrFail($id);
        $jenis_kelamins = $this->jenis_kelamins;
        $agamas         = $this->agamas;

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
            'nama'          => 'required|max:50',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
        ]);

        $data = [
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'         => $request->agama,
        ];

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

    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function import_excel(Request $request)
    {
        try {
            $request->validate([
                'file'  => 'required|mimes:csv,xls,xlsx',
            ]);
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                
                $name = Carbon::now().$file->getClientOriginalName();
                $file->storeAs(
                    'etc/excel', $name
                );
                
                ImportSiswaJob::dispatch($name);
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Import file siswa failed');
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $key => $failure) {
                $messages = implode(' ', $failure->errors()) . ' in row: ' . $failure->row();
            }

            return redirect()
                ->back()
                ->with('error', $messages);
        }

        return redirect()
            ->back()
            ->with('success', 'Import siswa successfully');

    }
}
