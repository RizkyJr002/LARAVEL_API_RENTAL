<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Merk;
use Exception;
use Illuminate\Http\Request;

class MerkController extends Controller
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
        //     $data = Merk::where('nama_merk','like',"%$katakunci%")->paginate($jumlahbaris);
        // }else{
        //     $data = Merk::orderBy('nama_merk', 'asc')->paginate($jumlahbaris);
        // }
        // return view('admin.merk.index')->with('data', $data);

        // MENGGUNAKAN API

        $data = Merk::all();

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
        return view('admin.merk.crete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_merk'=>'required'
        // ], [
        //     'nama_merk.required' => 'Nama Merk wajib di isi!'
        // ]);
        // $data = [
        //     'nama_merk' => $request->nama_merk
        // ];
        // Merk::create($data);
        // return redirect()->route('admin.merk.index')->with([
        //     'message' => 'Data Sukses Dibuat',
        //     'alert-type' => 'success'
        // ]);

        // MENGGUNAKAN API

        try {
            $request->validate([
                'nama_merk' => 'required'
            ]);

            $merk = Merk::create([
                'nama_merk' => $request->nama_merk
            ]);

            $data = Merk::where('id', '=', $merk->id)->get();

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
        $data = Merk::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Merk $merk)
    {
        return view('admin.merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_merk' => 'required'
        // ], [
        //     'nama_merk.required' => 'Nama Merk wajib di isi!'
        // ]);
        // $data = [
        //     'nama_merk' => $request->nama_merk
        // ];
        // Merk::where('nama_merk', $id)->update($data);
        // return redirect()->route('admin.merk.index')->with([
        //     'message' => 'Data Sukses Diedit',
        //     'alert-type' => 'success'
        // ]);

        // MENGGUNAKAN API

        try {
            $request->validate([
                'nama_merk' => 'required'
            ]);

            $merk = Merk::findOrFail($id);

            $merk->update([
                'nama_merk' => $request->nama_merk
            ]);

            $data = Merk::where('id', '=', $merk->id)->get();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Merk::where('nama_merk', $id)->delete();
        // return redirect()->back()->with([
        //     'message' => 'Data Berhasil Dihapus',
        //     'alert-type' => 'danger'
        // ]);

        // MENGGUNAKAN API

        try {
            $merk = Merk::findOrFail($id);
            $data = $merk->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destroy Data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
