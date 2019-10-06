<?php

namespace App\Transformers;

use App\Type;
use League\Fractal\TransformerAbstract;

class TypeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'professionals'
    ];

    public function transform(Type $type)
    {
        return [
            'id' => (int)$type->id,
            'description' => $type->description
        ];
    }

    public function includeProfessionals(Type $type)
    {
        $professionals = $type->professionals();
        return $this->collection($professionals, new ProfessionalTransformer());
    }
}