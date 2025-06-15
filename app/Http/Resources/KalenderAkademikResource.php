<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class KalenderAkademikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photoKalenderUrl = $this->photo_kalender ? Storage::url($this->photo_kalender) : null;

        // Hapus leading slash (/) jika ada
        if ($photoKalenderUrl !== null) {
            $photoKalenderUrl = ltrim($photoKalenderUrl, '/');
        }

        return [
            'judul' => $this->judul,
            'photo_kalender' => $photoKalenderUrl
        ];
    }
}
