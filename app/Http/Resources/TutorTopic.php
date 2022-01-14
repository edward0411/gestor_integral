<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorTopic extends JsonResource
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
            'id'                                => $this->id,
            'id_user'                           => $this->id_user,
            'id_topic'                          => $this->id_topic,
            'topic'                             => $this->topic->t_name,
            'file'                              => $this->t_t_namefile,
            'state'                             => $this->t_t_state,
            'deleted_at'                        => $this->deleted_at,
            'updated_at'                        => $this->updated_at,
            'created_at'                        => $this->created_at,
            'created_by'                        => $this->created_by,
            'updated_by'                        => $this->updated_by
        ];
    }
}
