@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left mr-3" aria-hidden="true"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            Form Tambah User
        </div>
        <div class="card-body">
            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" name="nama_user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">No Telp</label>
                        <input type="number" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Masukkan Password</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection