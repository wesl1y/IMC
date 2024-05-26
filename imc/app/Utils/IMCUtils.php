<?php

namespace App\Utils;

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
}
