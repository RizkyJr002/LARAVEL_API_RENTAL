<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mobils')
        ->join('merks','merks.id', '=', 'mobils.id_merk')
        ->join('kategoris','kategoris.id', '=', 'mobils.id_kategori')
        ->select('mobils.*','merks.nama_merk','kategoris.nama_kategori')
        ->orderBy('mobils.nama_mobil','asc')
        ->get();

        // if ($data) {
        //     return ApiFormatter::createApi(200, 'Success', $data);
        // } else {
        //     return ApiFormatter::createApi(400, 'Failed');
        // }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $imageName = $request->file('gambar')->store('assets/car', 'public');

            Mobil::create([
                'id_merk' => $request->id_merk,
                'id_kategori' => $request->id_kategori,
                'nama_mobil' => $request->nama_mobil,
                'harga_sewa' => $request->harga_sewa,
                'plat_nomor' => $request->plat_nomor,
                'gambar' => $imageName,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
                'transmisi' => $request->transmisi,
                'bahan_bakar' => $request->bahan_bakar,
            ]);

            Storage::disk('assets/car', 'public')->put($imageName, file_get_contents($request->gambar));

            return response()->json([
                'message' => 'sukses ditambahkan'
            ],200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'gagal'
            ]);
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
