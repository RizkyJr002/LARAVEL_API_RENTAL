<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $katakunci = $request->katakunci;
        // $jumlahbaris = 4;
        // if (strlen($katakunci)) {
        //     $data = User::where('nama_user','like',"%$katakunci%")->paginate($jumlahbaris);
        // }else{
        //     $data = User::orderBy('nama_user', 'asc')->paginate($jumlahbaris);
        // }

        // return view('admin.user.index')->with('data', $data);

        // MENGGUNAKAN API

        $data = User::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->validated()) {
        //     $gambar = $request->file('gambar')->store('assets/user', 'public');

        //     $slug = Str::slug($request->nama_user, '-');

        //     User::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug, 'password' => Hash::make($request['password'])]);
        // }

        // return redirect()->route('admin.user.index')->with([
        //     'message' => 'Data Sukses Dibuat',
        //     'alert-type' => 'success'
        // ]);

        // MENGGUNAKAN API

        try {
            $request->validate([
                'nama_user' => 'required',
                'alamat' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'password' => 'required',
            ]);

            $user = User::create([
                'nama_user' => $request->nama_user,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'password' => $request->password,
            ]);

            $data = User::where('id', '=', $user->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,User $user)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_user, '-');
            $user->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.user.index')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->gambar) {
            unlink('storage/'. $user->gambar);
        }
        $user->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'danger'
        ]);
    }

    public function updateImage(Request $request, $userId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $user = User::findOrFail($userId);
        if($request->gambar){
            unlink('storage/'. $user->gambar);
            $gambar = $request->file('gambar')->store('assets/user', 'public');

            $user->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
}
