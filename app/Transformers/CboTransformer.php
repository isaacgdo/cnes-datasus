<?php

namespace App\Transformers;

use App\Cbo;
use League\Fractal\TransformerAbstract;

class CboTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'professionals'
    ];

    public function transform(Cbo $cbo)
    {
        return [
            'id' => (int)$cbo->id,
            'code' => (int)$cbo->code,
            'description' => $cbo->description
        ];
    }

    public function includeProfessionals(Cbo $cbo)
    {
        $professionals = $cbo->professionals();
        return $this->collection($professionals, new ProfessionalTransformer());
    }
}
