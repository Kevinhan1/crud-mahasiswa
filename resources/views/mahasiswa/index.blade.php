@extends('layouts.app')

@section('content')
    <h1 style="margin-left: 20px;">Daftar Mahasiswa</h1>

    {{-- Tombol buka modal --}}
    <button class="btn btn-primary mb-3" style="margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah Mahasiswa</button>

    {{-- Alert success --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel --}}
    <div style="margin: 0 20px;">
    <table class="table table-bordered table-striped">
    <thead class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($mahasiswa as $index => $mhs)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->jurusan }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $mhs->id }}">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
            </tr>
        @endforelse
    </tbody>
</table>


{{-- Modal Edit --}}
@foreach($mahasiswa as $mhs)
<div class="modal fade" id="modalEdit{{ $mhs->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('mahasiswa.update', $mhs->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $mhs->nama) }}">
                </div>
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ old('nim', $mhs->nim) }}">
                </div>
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $mhs->jurusan) }}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endforeach


@section('modal')
{{-- Modal Tambah --}}
<div class="modal fade" id="modalCreate" tabindex="-1">
<div class="modal-dialog">
    <form class="modal-content" method="POST" action="{{ route('mahasiswa.store') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Tambah Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control">
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
    </form>
    </div>
</div>
@endsection
