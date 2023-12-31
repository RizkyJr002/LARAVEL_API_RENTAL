<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\KelolaSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = KelolaSewa::all();
        $data = DB::table('kelola_sewas')
            ->join('users', 'users.id', '=', 'kelola_sewas.id_user')
            ->join('mobils', 'mobils.id', '=', 'kelola_sewas.id_mobil')
            ->join('pemesanans', 'pemesanans.id', '=', 'kelola_sewas.id_booking')
            ->join('pengembalians', 'pengembalians.id', '=', 'kelola_sewas.id_pengembalian')
            ->select(
                'kelola_sewas.*',
                'users.nama_user',
                'mobils.nama_mobil',
                'pemesanans.total_sewa',
                'pemesanans.tgl_booking',
                'pemesanans.kode_booking',
                'pemesanans.tgl_selesai',
                'pemesanans.lama_sewa',
            )
            ->get();
            
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
        //
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
