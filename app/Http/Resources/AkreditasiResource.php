<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AkreditasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photoSertifikatUrl = $this->photo_sertifikat ? Storage::url($this->photo_sertifikat) : null;

        // Hapus leading slash (/) jika ada
        if ($photoSertifikatUrl !== null) {
            $photoSertifikatUrl = ltrim($photoSertifikatUrl, '/');
        }

        return [
            'photo_sertifikat' => $photoSertifikatUrl,
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
