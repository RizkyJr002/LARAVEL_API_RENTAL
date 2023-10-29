<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'gambar' => $this->gambar,
            'kode_booking' => $this->kode_booking,
            'id_user' => $this->id_user,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'id_mobil' => $this->id_mobil,
            'asal' => $this->asal,
            'tujuan' => $this->tujuan,
            'metode_pembayaran' => $this->metode_pembayaran,
            'total_sewa' => $this->total_sewa,
            'status' => $this->status,
            'tgl_booking' => $this->tgl_booking,
            'tgl_selesai' => $this->tgl_selesai,
          ];
    
    }
}
