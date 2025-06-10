<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AkreditasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'photo_sertifikat' => $this->photo_sertifikat,
            'nama_prodi' => $this->nama_prodi,
            'akreditasi' => $this->akreditasi,
            'sk_akreditasi' => $this->sk_akreditasi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            'lembaga_akreditasi' => $this->lembaga_akreditasi,
            'jenjang' => $this->jenjang
        ];
    }
}
