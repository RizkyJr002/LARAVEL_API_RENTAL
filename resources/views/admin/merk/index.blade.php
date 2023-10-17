@extends('layouts.admin')

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <form action="" method="get" class="d-flex">
                <input type="text" class="form-control me-1" type="search" name="katakunci" value="{{ 
                    Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-success ml-3" type="submit">Cari</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Merk Mobil</h3>
            <a href="{{ route('admin.merk.create') }}" class="btn btn-primary">Tambah Merk Mobil</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Merk Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->nama_merk }}</td>
                                    <td>
                                        <a href="{{ route('admin.merk.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                        <form onclick="return confirm('Anda yakin akan menghapus Merk Mobil?');" method="POST" class="d-inline" action="{{ route('admin.merk.destroy', $item->nama_merk) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        <?php $i++ ?>
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection