@extends('layout.template')
@section('konten')


{{-- form --}}
<form action="{{ url('siswa') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nis" class="form-label col-sm-2">NIS</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="nis" name="nis" value="{{ Session::get('nis') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="form-label col-sm-2">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ Session::get('nama') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ttl" class="form-label col-sm-2">Tempat Tanggal Lahir</label>
            <div class="col-sm-8 row">
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
        <div class="mb-3 row">
            <label for="kelas" class="form-label col-sm-2">Kelas</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ Session::get('kelas') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="form-label col-sm-2">Jurusan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="{{ Session::get('jurusan') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="form-label col-sm-2">Gambar</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="gambar" name="gambar" value="{{ Session::get('gambar')}}"
                    accept="image/*"
                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2"></label>
            <div class="col-sm-8">
                <img src="" id="output" width="300">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label col-sm-2"></label>
            <div class="col-sm-8">
                <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            </div>
        </div>
    </div>
</form>
{{-- end form --}}
@endsection