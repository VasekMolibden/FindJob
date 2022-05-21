<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'user_id' => $this->user_id,
            'user' => $this->user,
            //post_id' => $this->post_id,
            'post' => $this->post,
            'created_at' => $this->created_at,
        ];
    }
}
