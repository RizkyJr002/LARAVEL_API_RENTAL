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
        ->join('users','users.id', '=', 'kelola_sewas.id_user')
        ->join('cars','cars.id_car', '=', 'kelola_sewas.id_mobil')
        ->join('bookings','bookings.id', '=', 'kelola_sewas.id_booking')
        ->select('kelola_sewas.*','users.nama_user','cars.nama_mobil','bookings.tgl_booking','bookings.kode_booking')
        ->orderBy('kelola_sewas.tgl_booking','asc')
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
