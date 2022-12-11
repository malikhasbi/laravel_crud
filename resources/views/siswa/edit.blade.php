@extends('layout.template')
@section('konten')


{{-- form --}}
<div class="my-3 bg-body rounded shadow-sm card border-0">
    <div class="card-header">
        <a href="{{ url('siswa')}}" class="btn btn-warning">
            <i class="fa-solid fa-chevron-left"></i>
            <span>Kembali</span>
        </a>
    </div>
    <div class="card-body row py-4 px-5">
        <div class="title text-center my-4">
            <h3>Edit Data Siswa</h3>
        </div>
        <form action="{{ url('siswa/' . $data->nis) }}" method="post" class="col" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="nis" class="form-label col-sm-2">NIS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="nis" name="nis" value="{{ $data->nis }}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="form-label col-sm-2">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ttl" class="form-label col-sm-2">Tempat Tanggal Lahir</label>
                <div class="col-sm-10 row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat"
                            value="{{ $data->tempat }}">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                            value="{{ $data->tgl_lahir }}">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="form-label col-sm-2">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data->kelas }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="form-label col-sm-2">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data->jurusan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gambar" class="form-label col-sm-2">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*"
                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2"></label>
                <div class="col-sm-10">
                    <img src="{{ asset($data->gambar) }}" id="output" width="300">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end form --}}
@endsection