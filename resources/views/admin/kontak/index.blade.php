@extends('layouts.admin')

@section('content')
    @foreach ($data as $item)
        <div class="card">
            <h3 class="text-center mt-3">FORM KONTAK RENTAL</h3>
            <div class="card-header"></div>
            <div class="card-body">
                <form class="row g-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Masukkan Email" value="{{ $item->email }}" class="form-control" id="inputEmail4" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">No Hp</label>
                        <input type="number" name="no_hp" placeholder="Masukkan No Hp" value="{{ $item->telp }}" class="form-control" id="inputPassword4" disabled>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label mt-2">Alamat</label>
                        <textarea name="alamat" class="form-control" id="" cols="20" rows="5" disabled>{{ $item->alamat }}</textarea>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label mt-2">Whatsapp</label>
                        <input type="text" name="wa" value="{{ $item->whatsapp }}" class="form-control" id="inputAddress2"
                            placeholder="Masukkan link Whatsapp" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label mt-2">Instagram</label>
                        <input type="text" name="ig" value="{{ $item->instagram }}" class="form-control" id="inputCity" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label mt-2">Facebook</label>
                        <input type="text" name="fb" value="{{ $item->facebook }}" class="form-control" id="inputCity" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label mt-2">Twitter</label>
                        <input type="text" name="twt" value="{{ $item->twitter }}" class="form-control" id="inputZip" disabled>
                    </div>
                    <div class="col-12">
                        {{-- <button type="submit" class="btn btn-warning mt-3"><a href=""></a></button> --}}
                        <a class="btn btn-warning mt-3" href="{{ route('admin.kontak.edit', $item->id) }}">Edit</a>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
