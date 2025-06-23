<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KontakResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'link_fb' => $this->link_fb,
            'link_twitter' => $this->link_twitter,
            'link_instagram' => $this->link_instagram,
            'link_wa' => $this->link_wa,
            'link_website' => $this->link_website,
            'no_telp' => $this->no_telp,
            'gmail' => $this->gmail,
            'location' => $this->location,
        ];
    }
}
