<?php
function calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco = 0, $quadril = 0) {
    if ($sexo == "masculino") {
        return 495 / (1.0324 - 0.19077 * (log10($cintura - $pescoco)) + 0.15456 * (log10($altura*100))) - 450;
    } elseif ($sexo == "feminino") {
        return 495 / (1.29579 - 0.35004 * (log10($cintura + $quadril - $pescoco)) + 0.22100 * (log10($altura*100))) - 450;
    } else {
        return null; 
    }
}

function obterStatusIMC($imc) {
    global $data;
    switch (true) {
        case ($imc < 18.50):
            return ["status" => $data[0]['status'], "description" => $data[0]["description"], "color" => $data[0]["color"]];
        case ($imc >= 18.50 && $imc <= 24.99):
            return ["status" => $data[1]['status'], "description" => $data[1]["description"], "color" => $data[1]["color"]];
        case ($imc >= 25.00 && $imc <= 29.99):
            return ["status" => $data[2]['status'], "description" => $data[2]["description"], "color" => $data[2]["color"]];
        case ($imc >= 30.00 && $imc <= 34.99):
            return ["status" => $data[3]['status'], "description" => $data[3]["description"], "color" => $data[3]["color"]];
        case ($imc >= 35.00 && $imc <= 39.99):
            return ["status" => $data[4]['status'], "description" => $data[4]["description"], "color" => $data[4]["color"]];
        default:
            return ["status" => $data[5]['status'], "description" => $data[5]["description"], "color" => $data[5]["color"]];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>