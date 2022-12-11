@extends('layout.template')
@section('konten')


{{-- form --}}
<form action="{{ url('siswa') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nis" class="form-label col-sm-2">NIS</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nis" name="nis" value="{{ Session::get('nis') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="form-label col-sm-2">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ Session::get('nama') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ttl" class="form-label col-sm-2">Tempat Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ttl" name="ttl" value="{{ Session::get('ttl') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="form-label col-sm-2">Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ Session::get('kelas') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="form-label col-sm-2">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="{{ Session::get('jurusan') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="form-label col-sm-2">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" value="{{ Session::get('image')}}"
                    accept="image/*"
                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2"></label>
            <div class="col-sm-10">
                <img src="" id="output" width="300">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="form-label col-sm-2"></label>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            </div>
        </div>
    </div>
</form>
{{-- end form --}}
@endsection