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
            <h3>Daftar User</h3>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                            @forelse ($data as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->nama_user }}</td>
                                    <td>{{ $user->no_telp }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>
                                        <img src="{{ Storage::url($user->gambar) }}" width="100" height="100" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                        <form onclick="return confirm('Anda yakin akan menghapus User?');" class="d-inline" action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
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
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection