<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefactorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "first_name" =>  $this->first_name,
            "last_name" =>  $this->last_name,
            "gender" =>  $this->gender,
            "age" => $this->age,
            "city" =>  $this->city,
            "preferences" =>  $this->preferences,
            "account_type" =>  $this->account_type
        ];
    }
}
