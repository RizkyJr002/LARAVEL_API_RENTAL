@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left mr-3" aria-hidden="true"></i>Kembali</a>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    Form Edit User
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_user">Nama User</label>
                            <input type="text" name="nama_user" class="form-control" value="{{ old('nama_user', $user->nama_user) }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telpon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $user->no_telp) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Form Edit Gambar
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.updateImage', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <img src="{{ Storage::url($user->gambar) }}" class="img-fluid" alt="">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Mobil</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection