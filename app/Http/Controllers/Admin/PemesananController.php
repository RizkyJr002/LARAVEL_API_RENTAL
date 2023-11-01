<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pemesanans')
        ->join('users','users.id', '=', 'pemesanans.id_user')
        ->join('mobils','mobils.id', '=', 'pemesanans.id_mobil')
        ->select('pemesanans.*','users.nama_user','mobils.nama_mobil')
        ->get();

        // $data = Booking::all();

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
            $request->validate([
            'kode_booking'     => 'required',
            'id_user'   => 'required',
            'id_mobil'   => 'required',
            'asal'   => 'required',
            'tujuan'   => 'required',
            'total_sewa'   => 'required',
            'tgl_booking'   => 'required',
            'tgl_selesai'   => 'required',
            'lama_sewa'   => 'required'
            ]);

            $pesan = Pemesanan::create([
                'id_user'     => $request->id_user,
                'id_mobil'   => $request->id_mobil,
                'kode_booking'   => $request->kode_booking,
                'asal'   => $request->asal,
                'tujuan'   => $request->tujuan,
                'total_sewa'   => $request->total_sewa,
                'tgl_booking'   => $request->tgl_booking,
                'tgl_selesai'   => $request->tgl_selesai,
                'lama_sewa'   => $request->lama_sewa
            ]);

            $data = Pemesanan::where('id', '=', $pesan->id)->get();

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
