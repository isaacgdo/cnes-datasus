<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Professional;
use App\Transformers\ProfessionalTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProfessionalController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var ProfessionalTransformer
     */
    private $professionalTransformer;

    function __construct(Manager $fractal, ProfessionalTransformer $professionalTransformer)
    {
        $this->fractal = $fractal;
        $this->professionalTransformer = $professionalTransformer;
    }

    /** Recupera as informações de um profissional específico
     *
     * @param Professional $professional
     * @return array
     */
    public function get(Professional $professional)
    {
        $p = new Item($professional, $this->professionalTransformer);
        $p = $this->fractal->createData($p);

        return $p->toArray();
    }

    /** Recupera as informações de todos os profissionais.
     * @return array
     */
    public function getAll()
    {
        $p = Professional::all();
        $p = new Collection($p, $this->professionalTransformer);
        $p = $this->fractal->createData($p);

        return $p->toArray();
    }

    /** Cadastra um profissional
     *
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'cns' => 'required|string',
            'assignment_date' => 'required|date',
            'workload' => 'required|string',
            'sus' => 'required|string',
            'cbo_id' => 'required|integer|exists:cbos,id',
            'bond_id' => 'required|integer|exists:bonds,id',
            'type_id' => 'required|integer|exists:types,id'
        ]);

        $attrs = $request->only(
            ['name', 'cns', 'assignment_date', 'workload', 'sus', 'cbo_id', 'bond_id', 'type_id']
        );
        $professional = Professional::create(array_merge($attrs, ['origin' => 'system']));
        $professional = new Item($professional, $this->professionalTransformer);
        $professional = $this->fractal->createData($professional);

        return $professional->toArray();
    }

    /** Altera informações de um profissional
     *
     * @param Request $request
     * @param Professional $professional
     * @return array
     */
    public function update(Request $request, Professional $professional)
    {
        $request->validate([
            'name' => 'required|string',
            'cns' => 'required|string',
            'assignment_date' => 'required|date',
            'workload' => 'required|string',
            'sus' => 'required|string',
            'cbo_id' => 'required|integer|exists:cbos,id',
            'bond_id' => 'required|integer|exists:bonds,id',
            'type_id' => 'required|integer|exists:types,id'
        ]);

        $attrs = $request->only(
            ['name', 'cns', 'assignment_date', 'workload', 'sus', 'cbo_id', 'bond_id', 'type_id']
        );

        $professional->update($attrs);
        $professional = Professional::find($professional->id);
        $professional = new Item($professional, $this->professionalTransformer);
        $professional = $this->fractal->createData($professional);

        return $professional->toArray();
    }

    /** Deleta um profissional
     *
     * @param Professional $professional
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Professional $professional)
    {
        $professional->delete();

        return response()->json([
            'message' => 'Deletado com sucesso'
        ], 200);
    }

    /** Deleta todos os profissionais
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAll()
    {
        Professional::truncate();

        return response()->json([
            'message' => 'Todos os registros foram deletados'
        ], 200);
    }

}
