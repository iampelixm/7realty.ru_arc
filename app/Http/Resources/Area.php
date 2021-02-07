<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Area extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $coordinatesArr = $this->coordinates ?? [];
        $arr = [];
        foreach ($coordinatesArr as $key => $value) {
            $arrItem['id'] = $key;
            $arrItem['lat'] = $value['latitude'];
            $arrItem['lng'] = $value['longitude'];

            $arr[] = $arrItem;
        }

        return [
            'type' => 'Feature',
            'properties' => [],
            'geometry'  => [
                'type'  =>  'Polygon',
                'coordinates'   => $arr, 
            ]
        ];
    }
}
