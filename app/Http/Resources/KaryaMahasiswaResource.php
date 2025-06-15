<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class KaryaMahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $karyaMahasiswaUrl = $this->thumbnail ? Storage::url($this->thumbnail) : null;

        // Hapus leading slash (/) jika ada
        if ($karyaMahasiswaUrl !== null) {
            $karyaMahasiswaUrl = ltrim($karyaMahasiswaUrl, '/');
        }

        return  [
            'thumbnail' => $karyaMahasiswaUrl,
            'judul' => $this->judul,
            'kategori' => $this->kategori_karya->nama_kategori,
            'isi' => $this->isi,
            'tahun' => $this->tahun
        ];
    }
}
