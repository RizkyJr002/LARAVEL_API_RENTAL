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
            <h3>Daftar Mobil</h3>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Tambah Mobil</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Gambar Mobil</th>
                            <th>Harga Sewa Mobil</th>
                            <th>Status Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $cars->firstItem() ?>
                            @forelse ($cars as $car)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $car->nama_mobil }}</td>
                                    <td>{{ $car->plat_nomor }}</td>
                                    <td>
                                        <img src="{{ Storage::url($car->gambar) }}" width="200" alt="">
                                    </td>
                                    <td>Rp. {{ $car->harga_sewa }}.000</td>
                                    <td>{{ $car->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                        <form onclick="return confirm('Anda yakin akan menghapus Mobil?');" class="d-inline" action="{{ route('admin.cars.destroy', $car->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        <?php $i++ ?>
                    </tbody>
                </table>
                {{ $cars->links() }}
            </div>
        </div>
    </div>
@endsection