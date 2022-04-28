<?php

namespace App\Http\Resources;

use App\Utils\TodoStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
            'content'=> $this->content,
            'status'=> $this->status,
            'status_name'=> TodoStatus::getStatusName($this->status)
        ];
    }
}
