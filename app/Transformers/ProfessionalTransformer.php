<?php

namespace App\Transformers;

use App\Professional;
use League\Fractal\TransformerAbstract;

class ProfessionalTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'cbo', 'bond', 'type'
    ];

    public function transform(Professional $professional)
    {
        return [
            'id' => (int) $professional->id,
            'name' => $professional->name,
            'cns' => $professional->cns,
            'assignment_date' => $professional->assignment_date,
            'workload' => $professional->workload,
            'sus' => $professional->sus,
            'created_at' => $professional->created_at,
            'updated_at' => $professional->updated_at
        ];
    }

    public function includeCbo(Professional $professional)
    {
        $cbo = $professional->cbo;
        return $this->item($cbo, new CboTransformer);
    }

    public function includeBond(Professional $professional)
    {
        $bond = $professional->bond;
        return $this->item($bond, new BondTransformer);
    }

    public function includeType(Professional $professional)
    {
        $type = $professional->type;
        return $this->item($type, new TypeTransformer);
    }
}
