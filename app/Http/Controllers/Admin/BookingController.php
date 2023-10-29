<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('bookings')
            ->join('users', 'users.id', '=', 'bookings.id_user')
            ->join('mobils', 'mobils.id', '=', 'bookings.id_mobil')
            ->select('bookings.*', 'users.nama_user', 'mobils.nama_mobil')
            ->orderBy('bookings.kode_booking', 'asc')
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
        //define validation rules
        $imageName = $request->file('gambar')->store('assets/booking', 'public');
        $validator = Validator::make($request->all(), [
            'kode_booking'     => 'required',
            'gambar' => 'required|image',
            'id_user'   => 'required',
            'id_mobil'   => 'required',
            'asal'   => 'required',
            'tujuan'   => 'required',
            'metode_pembayaran'   => 'required',
            'total_sewa'   => 'required',
            'tgl_booking'   => 'required',
            'tgl_selesai'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = Booking::create([
            'id_user'     => $request->id_user,
            'gambar' => $imageName,
            'id_mobil'   => $request->id_mobil,
            'kode_booking'   => $request->kode_booking,
            'asal'   => $request->asal,
            'tujuan'   => $request->tujuan,
            'metode_pembayaran'   => $request->metode_pembayaran,
            'total_sewa'   => $request->total_sewa,
            'tgl_booking'   => $request->tgl_booking,
            'tgl_selesai'   => $request->tgl_selesai,
        ]);

        Storage::disk('assets/booking', 'public')->put($imageName, file_get_contents($request->gambar));

        //return response
        return new BookingResource(true, 'Data Post Berhasil Ditambahkan!', $post);
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
