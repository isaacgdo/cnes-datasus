<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformers\TypeTransformer;
use App\Type;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class TypeController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var TypeTransformer
     */
    private $typeTransformer;

    function __construct(Manager $fractal, TypeTransformer $typeTransformer)
    {
        $this->fractal = $fractal;
        $this->typeTransformer = $typeTransformer;
    }

    /** Recupera todos os Tipos de vínculo
     *
     * @return array
     */
    public function getAll()
    {
        $p = Type::all();
        $p = new Collection($p, $this->typeTransformer);
        $p = $this->fractal->createData($p);

        return $p->toArray();
    }
}
