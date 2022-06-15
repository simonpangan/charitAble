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
            "firstName" =>  $this->first_name,
            "lastName" =>  $this->last_name,
            "gender" =>  $this->gender,
            "age" => $this->age,
            "city" =>  $this->city,
            "preferences" =>  $this->preferences,
            "accountType" =>  $this->account_type
        ];
    }
}
