@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.cars.index') }}" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left mr-3" aria-hidden="true"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            Form Tambah Mobil
        </div>
        <div class="card-body">
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil</label>
                    <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil') }}">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Merk Mobil</label>
                    <input type="text" name="merk_mobil" class="form-control" value="{{ old('nama_mobil') }}">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Kat Mobil</label>
                    <input type="text" name="kat_mobil" class="form-control" value="{{ old('nama_mobil') }}">
                </div>
                <div class="form-group">
                    <label for="plat_nomor">Plat Nomor Mobil</label>
                    <input type="text" name="plat_nomor" class="form-control" value="{{ old('plat_nomor') }}">
                </div>
                <div class="form-group">
                    <label for="harga_sewa">Harga Sewa Mobil</label>
                    <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa') }}">
                </div>
                <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar Mobil</label>
                    <input type="text" name="bahan_bakar" class="form-control" value="{{ old('bahan_bakar') }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_kursi">Jumlah Kursi Mobil</label>
                    <input type="number" name="jumlah_kursi" class="form-control" value="{{ old('jumlah_kursi') }}">
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi Mobil</label>
                    <select name="transmisi" id="transmisi" class="form-control">
                        <option value="manual">Manual</option>
                        <option value="otomatis">Otomatis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status Mobil</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Mobil</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="p3k">P3K Mobil</label>
                    <select name="p3k" id="p3k" class="form-control">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="audio">Audio Mobil</label>
                    <select name="audio" id="audio" class="form-control">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="charger">Charger Mobil</label>
                    <select name="charger" id="charger" class="form-control">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ac">AC Mobil</label>
                    <select name="ac" id="ac" class="form-control">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Mobil</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection