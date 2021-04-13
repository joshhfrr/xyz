<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'id'            => $this->id,
            'album_id'      => $this->album_id,
            'title'         => $this->title,   
            'url'           => $this->url,
            'thumbnail_url' => $this->thumbnail_url,
            'album_title'   => $this->album->title,
        ];
    }
}
