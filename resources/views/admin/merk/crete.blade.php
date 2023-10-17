@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.merk.index') }}" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left mr-3" aria-hidden="true"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            Form Tambah Merk Mobil
        </div>
        <div class="card-body">
            <form action="{{ route('admin.merk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_merk">Merk Mobil</label>
                    <input type="text" name="nama_merk" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection