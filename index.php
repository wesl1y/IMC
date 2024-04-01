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

    <div id="content">


        <div id="main">
            <form action="index.php" method="get" id="form">
                <label for="sexo">SEXO</label>
                <select id="sexo" name="sexo" required>
                    <option value="" disabled selected hidden>Selecione o seu sexo</option>
                    <option value="feminino" <?php if(isset($_GET['sexo']) && $_GET['sexo']=='feminino' )
                        echo 'selected' ; ?>>Feminino</option>
                    <option value="masculino" <?php if(isset($_GET['sexo']) && $_GET['sexo']=='masculino' )
                        echo 'selected' ; ?>>Masculino</option>
                </select>
                <label for="idade">IDADE:</label>
                <input type="number" id="idade" name="idade" placeholder="Digite a sua idade"
                    value="<?php if(isset($_GET['idade'])) echo $_GET['idade']; ?>" required>
                <label for="altura">ALTURA (cm):</label>
                <input type="number" step="0.01" id="altura" name="altura" placeholder="Digite sua altura"
                    value="<?php if(isset($_GET['altura'])) echo $_GET['altura']; ?>" required>
                <label for="peso">PESO</label>
                <input type="number" step="0.01" id="peso" name="peso" placeholder="Digite seu peso"
                    value="<?php if(isset($_GET['peso'])) echo $_GET['peso']; ?>" required>
                <label for="cintura">CINTURA (cm):</label>
                <input type="number" step="0.01" id="cintura" name="cintura"
                    placeholder="Digite a medida de sua cintura"
                    value="<?php if(isset($_GET['cintura'])) echo $_GET['cintura']; ?>" required>
                <label for="quadril">QUADRIL (cm):</label>
                <input type="number" step="0.01" id="quadril" name="quadril"
                    placeholder="Digite a medida de seu quadril"
                    value="<?php if(isset($_GET['quadril'])) echo $_GET['quadril']; ?>" required>
                <label for="pescoco">PESCOÇO (cm):</label>
                <input type="number" step="0.01" id="pescoco" name="pescoco"
                    placeholder="Digite a medida de seu pescoço"
                    value="<?php if(isset($_GET['pescoco'])) echo $_GET['pescoco']; ?>" required>

                <input id="calc-button" type="submit" value="CALCULAR">
            </form>
            <a href="index.php"><input id="clear-button" type="submit" value="LIMPAR"></a> <!-- botão de limpar aq-->

            <div id="result-main">
                <div id="result-content">
                    <?php if (isset($imc) && isset($status)): ?>
                        <h2>IMC CALCULADO:</h2>
                        <div id="imc-result" style="background-color: <?=$color?>;"
                            <p></p>
                            <p id ='imc'>IMC: <?=$imc?></p>
                            <p id='peso'><?=$status?></p>
                        </div>

                    <?php else: ?>
                        <h2>GRAUS DO IMC:</h2>
                    <?php endif;?>
                    <?php
                            if(isset($gordura_corporal)){
                                echo "<h3 id='alert'>Porcentual de Gordura: $gordura_corporal%</h3>";
                              }
                            else {
                                echo "<h3 id='alert'></h3>";
                            }
                            if($description == ""){
                                echo "<p style='display: none;''></p>";
                            }
                            else{
                                echo "<p id='description'>$description</p>";
                            }

                            ?>

                </div>

            </div>
        </div>
    </div>
</body>