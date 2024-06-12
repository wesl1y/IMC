<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Utils\IMCUtils;
use Illuminate\Pagination\LengthAwarePaginator;

class IMCController extends Controller
{



    public function calcularIMCemMassa()
    {
        $peoples = People::all();
        
        foreach ($peoples as $people) {
            $imc = IMCUtils::calcularIMC($people->peso, ($people->altura/100));
            $gordura = IMCUtils::calcularGorduraCorporal($people->sexo, $people->cintura, $people->altura/100, $people->pescoco, $people->quadril);
            
            $people->imc = $imc;
            $people->gordura = $gordura;
            $people->save();
        }

        return redirect()->back()->with('success', 'IMC e gordura corporal calculados e salvos com sucesso!');
    }

    public function organizar()
    {
        $peoples = People::all();
        $sortedPeoples = IMCUtils::mergeSort($peoples);



        return view('mais-voce', ['peoples' => $sortedPeoples]);
    }
}

