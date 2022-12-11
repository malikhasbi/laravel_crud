<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kataKunci = $request->katakunci;
        $jumlahBaris = 5;
        if (strlen($kataKunci)) {
            $data = siswa::where('nis', 'like', "%$kataKunci%")
                ->orWhere('nama', 'like', "%$kataKunci%")
                ->orWhere('tempat', 'like', "%$kataKunci%")
                ->orWhere('tgl_lahir', 'like', "%$kataKunci%")
                ->orWhere('kelas', 'like', "%$kataKunci%")
                ->orWhere('jurusan', 'like', "%$kataKunci%")
                ->paginate($jumlahBaris);
        } else {
            $data = siswa::orderBy('nis', 'asc')->paginate(5);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nis', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('tempat', $request->tempat);
        Session::flash('tgl_lahir', $request->tgl_lahir);
        Session::flash('kelas', $request->kelas);
        Session::flash('jurusan', $request->jurusan);
        $request->validate(
            [
                'nis' => 'required|numeric|unique:siswa,nis',
                'nama' => 'required',
                'tempat' => 'required',
                'tgl_lahir' => 'required',
                'kelas' => 'required',
                'jurusan' => 'required',
                'image' => 'required|image|mimes:png,jpg|max:2048',
            ],
            [
                'nis.required' => 'NIS harus diisi!',
                'nis.numeric' => 'NIS harus dalam angka!',
                'nis.unique' => 'NIS sudah ada!',
                'nama.required' => 'Nama harus diisi!',
                'tempat.required' => 'Tempat Tanggal Lahir harus diisi!',
                'tgl_lahir.required' => 'Tempat Tanggal Lahir harus diisi!',
                'kelas.required' => 'Kelas harus diisi!',
                'jurusan.required' => 'Jurusan harus diisi!',
            ]
        );

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nis', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!',
            'tempat.required' => 'Tempat Tanggal Lahir harus diisi!',
            'tgl_lahir.required' => 'Tempat Tanggal Lahir harus diisi!',
            'kelas.required' => 'Kelas harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!'
        ]);

        $data = [
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ];

        siswa::where('nis', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        siswa::where('nis', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Data berhasil dihapus!');
    }
}
