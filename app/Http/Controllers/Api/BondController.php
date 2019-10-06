<?php

namespace App\Http\Controllers\Api;

use App\Bond;
use App\Http\Controllers\Controller;
use App\Transformers\BondTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class BondController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var BondTransformer
     */
    private $bondTransformer;

    function __construct(Manager $fractal, BondTransformer $bondTransformer)
    {
        $this->fractal = $fractal;
        $this->bondTransformer = $bondTransformer;
    }

    /** Recupera todos os vínculos
     *
     * @return array
     */
    public function getAll()
    {
        $p = Bond::all();
        $p = new Collection($p, $this->bondTransformer);
        $p = $this->fractal->createData($p);

        return $p->toArray();
    }
}
