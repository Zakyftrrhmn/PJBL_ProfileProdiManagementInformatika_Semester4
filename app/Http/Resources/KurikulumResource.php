<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KurikulumResource extends JsonResource
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
            'kode_mk' => $this->kode_mk,
            'mata_kuliah' => $this->mata_kuliah,
            'bentuk_perkuliahan' => $this->bentuk_perkuliahan,
            'sks' => $this->sks,
            'rps' => $this->rps,
            'semester' => $this->semester,
        ];
    }
}
