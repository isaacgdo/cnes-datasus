<?php

namespace App\Http\Controllers\Api;

use App\Cbo;
use App\Http\Controllers\Controller;
use App\Transformers\CboTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class CboController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var CboTransformer
     */
    private $cboTransformer;

    function __construct(Manager $fractal, CboTransformer $cboTransformer)
    {
        $this->fractal = $fractal;
        $this->cboTransformer = $cboTransformer;
    }

    /** Recupera todos os CBOS
     *
     * @return array
     */
    public function getAll()
    {
        $p = Cbo::all();
        $p = new Collection($p, $this->cboTransformer);
        $p = $this->fractal->createData($p);

        return $p->toArray();
    }
}
