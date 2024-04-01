<?php
include_once("data/data.php");
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['altura']) && isset($_GET['peso']) && isset($_GET['sexo']) && isset($_GET['cintura']) && isset($_GET['idade'])) {
    $sexo = $_GET['sexo'];
    $altura = $_GET['altura'] / 100;
    $peso = $_GET['peso'];
    $cintura = $_GET['cintura'];
    $idade = $_GET['idade'];


    $quadril = isset($_GET['quadril']) ? $_GET['quadril'] : 0;
    $pescoco = isset($_GET['pescoco']) ? $_GET['pescoco'] : 0;

    $gordura_corporal = calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);
    $gordura_corporal = number_format($gordura_corporal, 2);

    $imc = $peso / ($altura * $altura);
    $imc = number_format($imc, 2);

    $statusIMC = obterStatusIMC($imc);
    $status = $statusIMC["status"];
    $description = $statusIMC["description"];
    $color = $statusIMC["color"];
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body>

    <header>
        <div id="div-title">
            <h1 id="title">Calculo de IMC</h1>
        </div>
        <nav>
            <ul>
                <li><a href="templates/sobre-nos.php">Sobre Nós</a></li>
                <li><a href="templates/saiba-mais.php">Saiba Mais</a></li>
            </ul>
        </nav>
    </header>
</body>