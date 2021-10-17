<?php

namespace App\Http\Resources;

use App\Http\Resources\Lockups\Category;
use App\Http\Resources\Lockups\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class Apportunity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'title' => $this->title,
            'category' => new Category($this->category),
            'country' => new Country($this->country),
            'deadline' => $this->deadline->toDateString(),
            'createdBy' => new User($this->user),
            'organizer' => $this->organizer,
            'created_at' => $this->created_at->toDateString(),
            'updated_at' => $this->updated_at->toDateString(),
        ];
    }
}
