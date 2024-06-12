@include('components.header', [
    'titlePage' => '',
    'nav1' => '/',
    'titleNav1' => 'Home',
    'nav2' => '/sobre-nos',
    'titleNav2' => 'Sobre Nós',
    'nav3' => '/saiba-mais', 
    'titleNav3' => 'Saiba Mais',
])
<body>
    <section>
        <form method="POST" action="/calcular-imc-massa">
            @csrf
            <button type="submit">Calcular em massa</button>
        </form>
        <form method="POST" action="/mais-voce">
            @csrf
            <button type="submit">Organizar</button>
        </form>



            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sexo</th>
                        <th>Idade</th>
                        <th>Altura (cm)</th>
                        <th>Peso</th>
                        <th>Cintura</th>
                        <th>Quadril</th>
                        <th>Pescoço</th>
                        <th>IMC</th>
                        <th>Gordura Corporal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peoples as $people)
                        <tr>
                            <td>{{ $people->id }}</td>
                            <td>{{ $people->nome }}</td>
                            <td>{{ $people->sexo }}</td>
                            <td>{{ $people->idade }}</td>
                            <td>{{ $people->altura  }}</td>
                            <td>{{ $people->peso }}</td>
                            <td>{{ $people->cintura }}</td>
                            <td>{{ $people->quadril }}</td>
                            <td>{{ $people->pescoco }}</td>
                            <td>{{$people->imc}}</td>
                            <td>{{$people->gordura}}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


    </section>
</body>
