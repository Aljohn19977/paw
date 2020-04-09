<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'profile_picture' => $this->profile_picture_id,
            'cover_photo' => $this->cover_photo_id,
            'country' => $this->country,
            'registered_at' => $this->created_at,
        ];
    }
}
