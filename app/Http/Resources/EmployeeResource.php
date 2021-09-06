<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            
            'middlename' => $this->middlename,

            'address' => $this->address,
            
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,

            'department' => $this->department,
        
            'zipcode' => $this->zipcode,
            'birthdate' => $this->birthdate,
            'date_hired' => $this->date_hired,
          
        ];
    }
}
