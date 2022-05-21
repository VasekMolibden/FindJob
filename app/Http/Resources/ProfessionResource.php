<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'profession' => $this->profession,
            'category_id' => $this->category_id,
        ];
    }
}
