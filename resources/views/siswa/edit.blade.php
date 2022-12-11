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
            <div class="box row justify-content-center align-items-center">
                <div class="mb-3 row col-10">
                    <label for="nis" class="form-label col-sm-3">NIS</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nis" name="nis" value="{{ $data->nis }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="nama" class="form-label col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="ttl" class="form-label col-sm-3">Tempat Tanggal Lahir</label>
                    <div class="col-sm-9 row">
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
                <div class="mb-3 row col-10">
                    <label for="kelas" class="form-label col-sm-3">Kelas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data->kelas }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="jurusan" class="form-label col-sm-3">Jurusan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jurusan" name="jurusan"
                            value="{{ $data->jurusan }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="image" class="form-label col-sm-3">Foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*"
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-9">
                        <img src="{{ asset('storage/gambar/'.$data->image) }}" id="output" width="200">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="" class="form-label col-sm-3"></label>
                    <div class="col-sm-9">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- end form --}}
@endsection