<?php

namespace App\Utils;
Use App\Models\Data;

class IMCUtils
{
    public static function calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco = 0, $quadril = 0)
    {
        if (strtolower($sexo) == "masculino") {
            return number_format(495 / (1.0324 - 0.19077 * (log10($cintura - $pescoco)) + 0.15456 * (log10($altura*100))) - 450, 2);
        } elseif (strtolower($sexo) == "feminino") {
            return number_format(495 / (1.29579 - 0.35004 * (log10($cintura + $quadril - $pescoco)) + 0.22100 * (log10($altura*100))) - 450, 2);
        } else {
            return null; 
        }
    }
    
    public static function calcularIMC($peso, $altura){
        return number_format($peso / ($altura * $altura), 2);
    }

    public static function mergeSort($collection)
    {
        if ($collection->count() <= 1) {
            return $collection;
        }

        $middle = (int)($collection->count() / 2);
        $left = self::mergeSort($collection->slice(0, $middle));
        $right = self::mergeSort($collection->slice($middle));

        return self::merge($left, $right);
    }

    private static function merge($left, $right)
    {
        $result = collect();

        while ($left->isNotEmpty() && $right->isNotEmpty()) {
            if ($left->first()->gordura <= $right->first()->gordura) {
                $result->push($left->shift());
            } else {
                $result->push($right->shift());
            }
        }

        return $result->merge($left)->merge($right);
    }
    private static function obterStatusIMC($imc) {
        $id = null;
        if($imc <18.5){
            $id = 1;
        }
        else if($imc >18.5 && $imc <25.0){
            $id = 2;
        }
        
        else if($imc >=25 && $imc <= 29){
            $id = 3;
        }
        else if($imc >=30 && $imc <= 34.9){
            $id = 4;
        }
        else if($imc >=35 && $imc <= 39.9){
            $id = 5;
        }
        else{
            $id = 6;
        }
        

        echo Data::find($id)->status;
        return Data::find($id)->status;
        

    }
}
