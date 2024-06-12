<?php
use App\Utils\IMCUtils;

$status = "";
$color = "rgb(196, 174, 174)";
$description = "";
$gordura_corporal = null;


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['altura']) && isset($_GET['peso']) && isset($_GET['sexo']) && isset($_GET['cintura']) && isset($_GET['idade'])) {
    $sexo = $_GET['sexo'];
    $altura = $_GET['altura'] / 100;
    $peso = $_GET['peso'];
    $cintura = $_GET['cintura'];
    $idade = $_GET['idade'];
    $quadril = isset($_GET['quadril']) ? $_GET['quadril'] : 0;
    $pescoco = isset($_GET['pescoco']) ? $_GET['pescoco'] : 0;


    $gordura_corporal = IMCUtils::calcularGorduraCorporal($sexo, $cintura, $altura, $pescoco, $quadril);
    $gordura_corporal = number_format($gordura_corporal, 2);

    $imc = IMCUtils::calcularIMC($peso,$altura);
    $imc = number_format($imc, 2);
    $statusIMC =IMCUtils:: obterStatusIMC($imc);
    $status = $statusIMC["status"];
    $description = $statusIMC["description"];
    $color = $statusIMC["color"];
}
?>
@include('components.header', [
    'titlePage' => '',
    'nav1' => 'sobre-nos',
    'titleNav1' => 'Sobre Nós',
    'nav2' => 'saiba-mais',
    'titleNav2' => 'Saiba Mais',
    'nav3' => 'mais-voce', 
    'titleNav3' => 'Mais Você',
])


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



                    <div id="imc-table">
                        <div class="imc-color" id="abaixo">
                            <p>ABAIXO DO NORMAL</p>
                        </div>
                        <div class="imc-color" id="normal">
                            <p>PESO NORMAL</p>
                        </div>
                        <div class="imc-color" id="sobrepeso">
                            <p>SOBREPESO</p>
                        </div>
                        <div class="imc-color" id="obesidade1">
                            <p>OBESIDADE I</p>
                        </div>
                        <div class="imc-color" id="obesidade2">
                            <p>OBESIDADE II</p>
                        </div>
                        <div class="imc-color" id="obesidade3">
                            <p>OBESIDADE III</p>
                        </div>
                    </div>

                </div>

            </div>
            <div id="chart_div" style="width: 900px; height: 500px; background-color: #0F0F0F"></div>

        </div>


    </div>








</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', { 'packages': ['corechart'] });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Gordura', <?=$gordura_corporal?>],
            ['Massa Magra e Resíduos Corporais', <?=(100-$gordura_corporal)?>],

        ]);

        function setChartOptions() {
        var screenWidth = window.innerWidth;
        var options = {
            'title': '',
            'titleTextStyle': {
                'color': 'white'
            },
            'width': 425,
            'height': 300,
            'backgroundColor': 'transparent',
            'color': "white",
            'legend': {
                'textStyle': {
                    'color': 'white'
                }
            }
        };

    // Se a largura da tela for menor ou igual a 1760px, ajuste a largura do gráfico

    if (screenWidth >1600 && screenWidth <= 1900 ) {
        options.width = 450;
    }
    else if (screenWidth > 900 && screenWidth < 1600) {
        options.width = 900;
        options.height = 900;


    }
    else if (screenWidth > 600 && screenWidth < 1600) {
        options.width = 700;
        options.height = 700;


    }
    else if (screenWidth > 400 && screenWidth <= 600) {
        options.width = 600;
        options.height = 600;


    }

    else if (screenWidth > 280 && screenWidth <= 400) {
        options.width = 400;
        options.height = 400;


    }

    return options;
}

// Use a função setChartOptions para definir as opções do gráfico
var options = setChartOptions();

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>





</html>