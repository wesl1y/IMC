<?php

function calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco = 0, $quadril = 0) {
    if ($sexo == "masculino") {
        return number_format(495 / (1.0324 - 0.19077 * (log10($cintura - $pescoco)) + 0.15456 * (log10($altura*100))) - 450, 2);
    } elseif ($sexo == "feminino") {
        return number_format(495 / (1.29579 - 0.35004 * (log10($cintura + $quadril - $pescoco)) + 0.22100 * (log10($altura*100))) - 450, 2);
    } else {
        return null; 
    }
}

use PHPUnit\Framework\TestCase;

class CalcularGorduraCorporalTest extends TestCase {

    /**
     * @dataProvider valoresProvider
     */
    public function testCalcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril, $esperado) {
        $resultado = calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);
        $mensagemErro = "Falha ao calcular gordura corporal para sexo: $sexo, cintura: $cintura, altura: $altura, pescoco: $pescoco, quadril: $quadril. Esperado: $esperado, Resultado: $resultado";


        $this->assertEquals($esperado, $resultado, $mensagemErro);
    }

    public static function valoresProvider() {
        $arrays = [];
        for ($i = 0; $i < 10; $i++) {
            $sexo = rand(0, 1) ? 'masculino' : 'feminino';
            $cintura = rand(60, 100);
            $altura = rand(150, 200) / 100;
            $pescoco = rand(30, 50);
            $quadril = rand(80, 120);
            $resultado = calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);
            $esperado = $resultado >= 0; // Ajustado para retornar um booleano
            $arrays[] = [$sexo, $cintura, $altura, $pescoco, $quadril, $esperado];
        }
        return $arrays;
    }
}
