<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorSystem extends JsonResource
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
            'id_system'                         => $this->id_system,
            'system'                            => $this->parametric->p_text,
            'file'                              => $this->t_s_namefile,
            'state'                             => $this->t_s_state,
            'deleted_at'                        => $this->deleted_at,
            'updated_at'                        => $this->updated_at,
            'created_at'                        => $this->created_at,
            'created_by'                        => $this->created_by,
            'updated_by'                        => $this->updated_by
        ];
    }
}
