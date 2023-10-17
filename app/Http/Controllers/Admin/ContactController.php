<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
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
        //     $data = Contact::where('email','like',"%$katakunci%")->paginate($jumlahbaris);
        // }else{
        //     $data = Contact::orderBy('alamat', 'asc')->paginate($jumlahbaris);
        // }

        // return view('admin.kontak.index', compact('data'));

        // MENGGUNAKAN API

        $data = Contact::all();

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
    public function edit(Contact $kontak)
    {
        return view('admin.kontak.edit', compact('kontak'));
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
        //     'email'=>'required',
        //     'no_hp'=>'required',
        //     'alamat'=>'required',
        //     'wa'=>'required',
        //     'ig'=>'required',
        //     'fb'=>'required',
        //     'twt'=>'required',
        // ], [
        //     'email.required' => 'Email wajib di isi!',
        //     'no_hp.required' => 'No Hp wajib di isi!',
        //     'alamat.required' => 'Alamat wajib di isi!',
        //     'wa.required' => 'Wa wajib di isi!',
        //     'ig.required' => 'Ig wajib di isi!',
        //     'fb.required' => 'Fb wajib di isi!',
        //     'twt.required' => 'Twitter wajib di isi!',
        // ]);
        // $data = [
        //     'email' => $request->email,
        //     'telp' => $request->no_hp,
        //     'alamat' => $request->alamat,
        //     'whatsapp' => $request->wa,
        //     'instagram' => $request->ig,
        //     'facebook' => $request->fb,
        //     'twitter' => $request->twt
        // ];
        // Contact::where('id',$id)->update($data);
        // return redirect()->route('admin.kontak.index')->with([
        //     'message' => 'Data Sukses Diedit',
        //     'alert-type' => 'success'
        // ]);

        // MENGGUNAKAN API

        try {
            $request->validate([
                'email' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'whatsapp' => 'required',
                'instagram' => 'required',
                'facebook' => 'required',
                'twitter' => 'required',
            ]);

            $contact = Contact::findOrFail($id);

            $contact->update([
                'email' => $request->email,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'whatsapp' => $request->whatsapp,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
            ]);

            $data = Contact::where('id', '=', $contact->id)->get();

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
        //
    }
}
