@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-warning mb-3"><i class="fa fa-arrow-left mr-3" aria-hidden="true"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            Form Edit Kontak Rental
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $kontak->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="" cols="20" rows="5">{{ $kontak->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="no-hp">No Hp</label>
                    <input type="number" name="no_hp" value="{{ $kontak->telp }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="wa">Whatsapp</label>
                    <input type="text" name="wa" value="{{ $kontak->whatsapp }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twt">Twitter</label>
                    <input type="text" name="twt" value="{{ $kontak->twitter }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fb">Facebook</label>
                    <input type="text" name="fb" value="{{ $kontak->facebook }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ig">Instagram</label>
                    <input type="text" name="ig" value="{{ $kontak->instagram }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection