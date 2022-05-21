<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    //public static $wrap = 'content';

    public function toArray($request)
    {
        //self::$wrap='content';
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => $this->image,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'access' => $this->access->access,
            'posts' => $this->posts,
        ];
    }
}
