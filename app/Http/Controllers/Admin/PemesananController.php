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
            ->join('users', 'users.nama_user', '=', 'pemesanans.username')
            ->join('mobils', 'mobils.nama_mobil', '=', 'pemesanans.mobil')
            ->select('pemesanans.*')
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
                'username'   => 'required',
                'mobil'   => 'required',
                'asal'   => 'required',
                'tujuan'   => 'required',
                'total_sewa'   => 'required',
                'tgl_booking'   => 'required',
                'tgl_selesai'   => 'required',
                'lama_sewa'   => 'required'
            ]);

            $pesan = Pemesanan::create([
                'username'     => $request->username,
                'mobil'   => $request->mobil,
                'kode_booking'   => $request->kode_booking,
                'asal'   => $request->asal,
                'tujuan'   => $request->tujuan,
                'total_sewa'   => $request->total_sewa,
                'tgl_booking'   => $request->tgl_booking,
                'tgl_selesai'   => $request->tgl_selesai,
                'lama_sewa'   => $request->lama_sewa,
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
    public function show(Request $request)
    {
        $id = $request->input('nama_user');
        $pesan = DB::table('pemesanans')
            ->join('users', 'users.nama_user', '=', 'pemesanans.username')
            ->join('mobils', 'mobils.nama_mobil', '=', 'pemesanans.mobil')
            ->select('pemesanans.*', 'mobils.nama_mobil')
            ->where('pemesanans.username', '=', $id)
            ->get();

        return response()->json(['Booking' => $pesan], 200);
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
        try {
            $request->validate([
                'status' => 'required'
            ]);

            $pesan = Pemesanan::findOrFail($id);

            $pesan->update([
                'status' => $request->status
            ]);

            $data = Pemesanan::where('id', '=', $pesan->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Update Status', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed Update Status');
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
        //
    }
}
