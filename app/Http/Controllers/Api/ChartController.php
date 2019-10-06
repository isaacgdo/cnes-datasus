<?php

namespace App\Http\Controllers\Api;

use App\Bond;
use App\Http\Controllers\Controller;
use App\Type;

class ChartController extends Controller
{
    /** Recupera a quantidade de ocorrências para cada vínculo
     * @return array
     */
    public function bonds()
    {
        $bonds = Bond::all();
        $data = array();
        foreach ($bonds as $bond) {
            $data[$bond->description] = $bond->professionals()->count();
        }

        return $data;
    }

    /** Recupera as quantidades de profissionais por tipo de vínculo
     *
     * @return array
     */
    public function types()
    {
        $types = Type::all();
        $data = array();
        foreach ($types as $type) {
            $data[$type->description] = $type->professionals()->count();
        }

        return $data;
    }
}