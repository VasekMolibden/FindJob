<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'post_type_id' => $this->post_type_id,
            'post_type' =>$this->post_type,
            //'user_id' => $this->user_id,
            'user' =>$this->user,
            'name' => $this->name,
            'description' => $this->description,
            //'category_id' => $this->category_id,
            'category' =>$this->category,
            //'education_id' => $this->education_id,
            'education' =>$this->education,
            'salary' => $this->salary,
            'work_experience' => $this->work_experience,
            //'work_schedule_id' => $this->work_schedule_id,
            'work_schedule' =>$this->work_schedule,
            'contacts' => $this->contacts,
            'image' => $this->image,
            //'city_id' => $this->city_id,
            'city' =>$this->city,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
