<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GudangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'nama' => $this->nama,
            'nama' => $this->nama,
            'foto' => $this->foto,
            'deskripsi' => $this->deskripsi
        ];
    }
}
