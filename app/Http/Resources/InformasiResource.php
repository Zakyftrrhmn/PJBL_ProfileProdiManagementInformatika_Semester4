<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class InformasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $informasiUrl = $this->thumbnail ? Storage::url($this->thumbnail) : null;

        // Hapus leading slash (/) jika ada
        if ($informasiUrl !== null) {
            $informasiUrl = ltrim($informasiUrl, '/');
        }

        return [
            'thumbnail' => $informasiUrl,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'kategori' => $this->kategori->nama_kategori,
            'user_id' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),

        ];
    }
}
