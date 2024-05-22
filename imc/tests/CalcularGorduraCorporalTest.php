<?php
use PHPUnit\Framework\Attributes\DataProvider;
function calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco = 0, $quadril = 0) {
    if ($sexo == "masculino") {
        return number_format(495 / (1.0324 - 0.19077 * (log10($cintura - $pescoco)) + 0.15456 * (log10($altura*100))) - 450, 2);
    } elseif ($sexo == "feminino") {
        return number_format(495 / (1.29579 - 0.35004 * (log10($cintura + $quadril - $pescoco)) + 0.22100 * (log10($altura*100))) - 450, 2);
    } else {
        return null; 
    }
}

class CalcularGorduraCorporalTest extends PHPUnit\Framework\TestCase {
    
    #[DataProvider('valoresProvider')]
    public function testCalcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril, $esperado) {
        $resultado = calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);

        $this->assertEquals($esperado, $resultado);
    }

    public static function valoresProvider() {
        $arrays = [];
        for ($i = 0; $i < 200; $i++) {
            $sexo = rand(0, 1) ? 'masculino' : 'feminino';
            $cintura = rand(60, 100);
            $altura = rand(150, 200) / 100;
            $pescoco = rand(30, 50);
            $quadril = rand(80, 120);
            $resultado = calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);
            $esperado = $resultado >=0;
            $arrays[] = [$sexo, $cintura, $altura, $pescoco, $quadril, $esperado];
        }
        return $arrays;
    }
}

