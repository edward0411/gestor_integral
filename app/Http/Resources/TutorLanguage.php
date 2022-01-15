<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorLanguage extends JsonResource
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
            'id_language'                       => $this->id_language,
            'language'                          => $this->parametric->p_text,
            'file'                              => $this->l_t_namefile,
            'observation'                       => $this->observation,
            'state'                             => $this->l_t_state,
            'deleted_at'                        => $this->deleted_at,
            'updated_at'                        => $this->updated_at,
            'created_at'                        => $this->created_at,
            'created_by'                        => $this->created_by,
            'updated_by'                        => $this->updated_by
        ];
    }
}
