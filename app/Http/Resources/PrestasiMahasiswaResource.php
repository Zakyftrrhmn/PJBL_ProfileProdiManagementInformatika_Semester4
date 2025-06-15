<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrestasiMahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_mahasiswa' => $this->nama_mahasiswa,
            'nim' => $this->nim,
            'nama_lomba' => $this->nama_lomba,
            'tingkat' => $this->tingkat,
            'penyelenggara' => $this->penyelenggara,
            'tanggal_lomba' => $this->tanggal_lomba,
            'peringkat' => $this->peringkat,
            'file_sertifikat' => $this->file_sertifikat
        ];
    }
}
