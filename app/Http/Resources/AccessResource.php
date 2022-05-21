<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccessResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'access' => $this->access,
        ];
    }
}
