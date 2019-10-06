<?php

namespace App\Transformers;

use App\Bond;
use League\Fractal\TransformerAbstract;

class BondTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'professionals'
    ];

    public function transform(Bond $bond)
    {
        return [
            'id' => (int)$bond->id,
            'description' => $bond->description
        ];
    }

    public function includeProfessionals(Bond $bond)
    {
        $professionals = $bond->professionals();
        return $this->collection($professionals, new ProfessionalTransformer());
    }
}