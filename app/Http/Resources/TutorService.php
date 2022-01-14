<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorService extends JsonResource
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
            'id_service'                        => $this->id_service,
            'service'                           => $this->parametric->p_text,
            'state'                             => $this->t_s_state,
            'deleted_at'                        => $this->deleted_at,
            'updated_at'                        => $this->updated_at,
            'created_at'                        => $this->created_at,
            'created_by'                        => $this->created_by,
            'updated_by'                        => $this->updated_by
        ];
    }
}
