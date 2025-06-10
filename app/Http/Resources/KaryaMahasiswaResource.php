<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KaryaMahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'judul' => $this->judul,
            'kategori' => $this->kategori_karya->nama_kategori,
            'isi' => $this->isi,
            'tahun' => $this->tahun
        ];
    }
}
