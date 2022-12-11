@extends('layout.template')
@section('konten')
{{-- data --}}
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <form action="{{ url('siswa')}} " method="get" class="d-flex">
            <input type="search" name="katakunci" class="form-control me-1" value="{{ Request::get('katakunci') }}"
                placeholder="Masukan kata kunci" aria-label="Search">
            <input type="submit" class="btn btn-secondary" value="Cari">
        </form>
    </div>
    <div class="pb-3">
        <a href=" {{ url('siswa/create') }} " class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1 no-sort">No</th>
                <th class="col-md">NIS</th>
                <th class="col-md">Nama</th>
                <th class="col-md">Tempat Tanggal Lahir</th>
                <th class="col-md-1">Kelas</th>
                <th class="col-md-1">Jurusan</th>
                <th class="col-md no-sort">Gambar</th>
                <th class="col-md-2 no-sort">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = $data->firstItem()
            @endphp
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tempat }}, {{ $item->tgl_lahir }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>
                    <img src="{{asset($item->gambar)}}" width="100">
                </td>
                <td>
                    <a href="{{ url('siswa/' . $item->nis . '/edit') }} " class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{'siswa/' . $item->nis}}" method="post" class="d-inline"
                        onsubmit="return confirm('Yakin akan menghapus?')">
                        @csrf
                        @method('delete')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @php
            $i++
            @endphp
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
{{-- end data --}}

@endsection