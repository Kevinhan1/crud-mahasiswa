@extends('layouts.app')

@section('content')
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div>
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" required>
        </div>
        <div>
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection

