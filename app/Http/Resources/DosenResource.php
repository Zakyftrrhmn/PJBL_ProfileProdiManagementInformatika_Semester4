<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama' => $this->nama,
            'nidn' => $this->nidn,
            'email' => $this->email,
            'asal_kota' => $this->asal_kota,
            'pendidikan' => $this->pendidikan,
            'jabatan' => $this->jabatan,
            'website' => $this->website,
        ];
    }
}
