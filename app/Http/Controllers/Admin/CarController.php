<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarStoreRequest;
use App\Models\Car;
use App\Http\Requests\Admin\CarUpdateRequest;
use Illuminate\Support\Str;
use App\Helpers\ApiFormatter;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
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
        //     $cars = Car::where('nama_mobil','like',"%$katakunci%")->paginate($jumlahbaris);
        // }else{
        //     $cars = Car::orderBy('plat_nomor', 'asc')->paginate($jumlahbaris);
        // }

        // return view('admin.cars.index', compact('cars'));

        // MENGGUNAKAN API

        $data = Car::all();

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
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        if ($request->validated()) {
            $gambar = $request->file('gambar')->store('assets/car', 'public');

            $slug = Str::slug($request->nama_mobil, '-');

            Car::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
        }

        return redirect()->route('admin.cars.index')->with([
            'message' => 'Data Sukses Dibuat',
            'alert-type' => 'success'
        ]);

        // MENGGUNAKAN API

        try {
            if ($request->validated()) {
                $gambar = $request->file('gambar')->store('assets/car', 'public');

                $slug = Str::slug($request->nama_mobil, '-');

                Car::create($request->except('gambar') + [
                    'gambar' => $gambar,
                    'slug' => $slug,
                ]);
            }

            $data = Car::where('id')->get();

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
        $data = Car::where('id', '=', $id)->get();

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
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_mobil, '-');
            $car->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.cars.index')->with([
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
    public function destroy(Car $car)
    {
        if ($car->gambar) {
            unlink('storage/'. $car->gambar);
        }
        $car->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'danger'
        ]);
    }

    public function updateImage(Request $request, $carId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $car = Car::findOrFail($carId);
        if($request->gambar){
            unlink('storage/'. $car->gambar);
            $gambar = $request->file('gambar')->store('assets/car', 'public');

            $car->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
}
