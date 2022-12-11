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
            <h3>Data Siswa</h3>
        </div>
        <form action="{{ url('siswa') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box row justify-content-center align-items-center">
                <div class="mb-3 row col-10">
                    <label for="nis" class="form-label col-sm-3">NIS</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nis" name="nis" value="{{ Session::get('nis') }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="nama" class="form-label col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ Session::get('nama') }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="ttl" class="form-label col-sm-3">Tempat Tanggal Lahir</label>
                    <div class="col-sm-9 row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat"
                                value="{{ Session::get('tempat') }}">
                        </div>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="{{ Session::get('tgl_lahir') }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="kelas" class="form-label col-sm-3">Kelas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kelas" name="kelas"
                            value="{{ Session::get('kelas') }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="jurusan" class="form-label col-sm-3">Jurusan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jurusan" name="jurusan"
                            value="{{ Session::get('jurusan') }}">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="image" class="form-label col-sm-3">Foto</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image"
                            value="{{ Session::get('image')}}" accept="image/*"
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
                <div class="mb-3 row col-10">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-9">
                        <img src="" id="output" width="200">
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