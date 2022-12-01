<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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
        $jumlahBaris = 4;
        if (strlen($kataKunci)) {
            $data = siswa::where('nis', 'like', "%$kataKunci%")
                ->orWhere('nama', 'like', "%$kataKunci%")
                ->orWhere('ttl', 'like', "%$kataKunci%")
                ->orWhere('kelas', 'like', "%$kataKunci%")
                ->orWhere('jurusan', 'like', "%$kataKunci%")
                ->paginate($jumlahBaris);
        } else {
            $data = siswa::orderBy('nis', 'asc')->paginate(4);
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
        Session::flash('ttl', $request->ttl);
        Session::flash('kelas', $request->kelas);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('image', $request->image);
        $request->validate(
            [
                'nis' => 'required|numeric|unique:siswa,nis',
                'nama' => 'required',
                'ttl' => 'required',
                'kelas' => 'required',
                'jurusan' => 'required',
                'image' => 'required',
            ],
            [
                'nis.required' => 'NIS harus diisi!',
                'nis.numeric' => 'NIS harus dalam angka!',
                'nis.unique' => 'NIS sudah ada!',
                'nama.required' => 'Nama harus diisi!',
                'ttl.required' => 'Tempat Tanggal Lahir harus diisi!',
                'kelas.required' => 'Kelas harus diisi!',
                'jurusan.required' => 'Jurusan harus diisi!',
            ]
        );

        $image = $request->file('image');
        $file_name = rand(1000, 9999) . $image->getClientOriginalName();

        $img = Image::make($image->path());
        $img->resize('180', '120')
            ->save(public_path('images/post') . '/small_' . $file_name);

        $image->move('images/post', $file_name);

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'image' => $request->$file_name,
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
    public function update(Request $request, $id, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!',
            'ttl.required' => 'Tempat Tanggal Lahir harus diisi!',
            'kelas.required' => 'Kelas harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!'
        ]);
        if ($request->hasFile('image')) {
            $siswa->delete_image();
            $image = $request->file('image');
            $file_name = rand(1000, 9999) . $image->getClientOriginalName();
            $img = Image::make($image->path());
            $img->resize('180', '120')
                ->save(public_path('images/post') . '/small_' . $file_name);
            $image->move('images/post', $file_name);
            $siswa->image = $file_name;
        }
        $data = [
            'nama' => $request->nama,
            'ttl' => $request->ttl,
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
    public function destroy($id, Siswa $siswa)
    {
        $siswa->delete_image();
        siswa::where('nis', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Data berhasil dihapus!');
    }
}
