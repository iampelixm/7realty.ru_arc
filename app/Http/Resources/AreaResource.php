<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $coordinates = $this->coordinates;

        return [
            'type' => 'Feature',
            'properties' => [],
            'geometry'  => [
                'type'  =>  'Polygon',
                'coordinates'   => $coordinates; 
            ]
        ];
    }
}
