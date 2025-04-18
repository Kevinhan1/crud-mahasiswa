@extends('layouts.app')

@section('content')
    <h1>Edit Mahasiswa</h1>

    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
            @error('nim')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
            @error('jurusan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
