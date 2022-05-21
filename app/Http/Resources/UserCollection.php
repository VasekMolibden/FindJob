<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    //public static $wrap = 'content';

    public function toArray($request)
    {
        /*$data = $this->collection;
        $data[] = [
            'link' => 'ссылка'
        ];
        return $data;*/
        return parent::toArray($request);
    }
}
