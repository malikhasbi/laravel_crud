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
        <form action="{{ url('siswa/' . $data->nis) }}" method="post" class="col">
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
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ttl" name="ttl" value="{{ $data->ttl }}">
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
                <label for="image" class="form-label col-sm-2">image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="form-label col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                </div>
            </div>
        </form>
        <div class="col-2">
            <div class="card">
                <img src="{{ $data->image() }}" class="card-img-top" alt="profile">
            </div>
        </div>
    </div>
</div>
{{-- end form --}}
@endsection