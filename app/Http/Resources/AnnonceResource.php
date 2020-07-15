<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use File;

class AnnonceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images1="";
        $images2="";
        $images3="";

        if(!empty($this->images1))
        {
            if(File::exists(public_path("importedImages"). '/'.$this->images1))
            {
                $images1= base64_encode(File::get(public_path("importedImages"). '/'.$this->images1));
            }
        }


        if(!empty($this->images2))
        {
            if(File::exists(public_path("importedImages"). '/'.$this->images2))
            {
                $images2= base64_encode(File::get(public_path("importedImages"). '/'.$this->images2));
            }
        }


        if(!empty($this->images3))
        {
            if(File::exists(public_path("importedImages"). '/'.$this->images3))
            {
                $images3= base64_encode(File::get(public_path("importedImages"). '/'.$this->images3));
            }
        }


        
        return [
            'id' => $this->id,
            'capacity' => $this->capacity,
            'address' => $this->address,
            'details' => $this->details,
            'images1' =>  $images1,
            'images2' => $images2,
            'images3' => $images3,
            'position' => $this->position,
            'prix' => $this->prix,
            'rate' => $this->rate,
            'stat' => $this->stat,
            'superfice' => $this->superfice,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
                ];
    }
}
