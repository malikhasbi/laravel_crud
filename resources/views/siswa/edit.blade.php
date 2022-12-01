@extends('layout.template')
@section('konten')


{{-- form --}}
<form action="{{ url('siswa/' . $data->nis) }}" method="post">
    @csrf
    @method('put')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('siswa')}}" class="btn btn-secondary">
            << Kembali</a>
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
                        <input type="text" class="form-control" id="jurusan" name="jurusan"
                            value="{{ $data->jurusan }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="image" class="form-label col-sm-2">image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-text">
                        <img src="{{ $data->image() }}" class="img-fluid rounded-top" alt="profile" height="75">
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