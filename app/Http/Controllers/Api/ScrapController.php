<?php

namespace App\Http\Controllers\Api;

use App\Bond;
use App\Cbo;
use App\Http\Controllers\Controller;
use App\Professional;
use App\Type;
use Illuminate\Http\Request;
use Goutte\Client;

class ScrapController extends Controller
{
    /** Realiza o scrapt no site do datasus para popular o banco
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function scrap()
    {
        $already_scrapped = Professional::where('origin','=','datasus')->get()->first();
        if(!is_null($already_scrapped)){
            return response()->json([
                'message' => 'already-scrapped'
            ], 201);
        }

        $client = new Client();
        $crawler = $client->request('GET', 'http://cnes2.datasus.gov.br/Mod_Profissional.asp?VCo_Unidade=2408102653982');

        // registrando previamente todos os CBOS, Vínculos e Tipos de forma normalizada
        $crawler->filter('#example > tbody > tr')->each(function ($node) {
            $cbo_code =  substr($node->filter('td > font')->eq(5)->text(), 0, 6);
            $cbo_description = substr($node->filter('td > font')->eq(5)->text(), 9);
            $bond = $node->filter('td > font')->eq(11)->text();
            $type = $node->filter('td > font')->eq(12)->text();

            if(is_null(Cbo::where('code', '=', $cbo_code)->get()->first())) {
                Cbo::create(['code' => $cbo_code, 'description' => $cbo_description]);
            }

            if(is_null(Bond::where('description', '=', $bond)->get()->first())) {
                Bond::create(['description' => $bond]);
            }

            if(is_null(Type::where('description', '=', $type)->get()->first())) {
                Type::create(['description' => $type]);
            }
        });

        // cadastrando os profissionais
        $crawler->filter('#example > tbody > tr')->each(function ($node) {
            $cbo_code =  substr($node->filter('td > font')->eq(5)->text(), 0, 6);
            $bond = $node->filter('td > font')->eq(11)->text();
            $type = $node->filter('td > font')->eq(12)->text();

            $cbo_id = Cbo::where('code', '=', $cbo_code)->get()->first()->id;
            $bond_id = Bond::where('description', '=', $bond)->get()->first()->id;
            $type_id = Type::where('description', '=', $type)->get()->first()->id;

            Professional::create([
                'name' => $node->filter('td > font')->eq(0)->text(),
                'cns' => $node->filter('td > font')->eq(2)->text(),
                'assignment_date' => $node->filter('td > font')->eq(4)->text(),
                'workload' => $node->filter('td > font')->eq(9)->text(),
                'sus' => $node->filter('td > font')->eq(10)->text(),
                'origin' => 'datasus',
                'cbo_id' => $cbo_id,
                'bond_id' => $bond_id,
                'type_id' => $type_id
            ]);
        });

        return response()->json([
            'message' => 'scrapped'
        ], 200);
    }
}
