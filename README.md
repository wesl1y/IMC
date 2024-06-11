# Calculadora de IMC e Percentuais Corporais

## Descrição

Este projeto foi desenvolvido com o objetivo de oferecer uma ferramenta simples e acessível para que as pessoas possam avaliar seus índices de massa corporal (IMC) e percentuais corporais de forma rápida e sem a necessidade de recorrer a avaliações profissionais pagas.

Vivemos em uma época onde a saúde e o bem-estar estão em alta, e muitas pessoas buscam alternativas para cuidar do corpo e da mente. No entanto, a avaliação profissional desses dados muitas vezes é financeiramente inviável, com valores que podem ser prohibitivos para alguns.

Nossa solução visa fornecer uma maneira fácil e acessível para que qualquer pessoa possa verificar seus níveis corporais, ajudando-as a compreender melhor sua saúde e tomar decisões informadas sobre seu estilo de vida.

Neste projeto, criamos uma ferramenta prática e eficiente para calcular o IMC, um indicador importante que relaciona o peso e a altura de uma pessoa para avaliar sua condição de peso. O cálculo do IMC é uma maneira simples de monitorar a saúde, mas entendemos que, sozinho, ele pode não refletir toda a complexidade do estado de saúde de um indivíduo. Por isso, decidimos utilizar a equação de SIRI, adequada para populações jovens e que não exige equipamentos complexos como a bioimpedância elétrica.

## Oque nosso projeto oferece

Nosso projeto oferece uma solução acessível e eficiente para calcular o Índice de Massa Corporal (IMC), proporcionando uma experiência digital simples. Ele permite o monitoramento do peso e da saúde, facilitando o cálculo e a avaliação do IMC. Além disso, serve como ferramenta educativa, promovendo uma abordagem holística à saúde e ao bem-estar, com uma forma fácil e precisa de interpretar os resultados do IMC.

## Estrutura do Software

A escolha de Laravel como framework para o projeto se deve à sua robustez e facilidade de uso. HTML estrutura o conteúdo da página, definindo elementos como formulários e textos. CSS estiliza esses elementos, melhorando a apresentação visual e garantindo uma experiência agradável e responsiva. O PHP, utilizado através do Laravel, permite funcionalidades dinâmicas e processamento de dados do usuário para calcular o IMC e gerar resultados personalizados.

## Metodologia de trabalho

Primeiro, definimos detalhadamente os requisitos funcionais e não funcionais, considerando as necessidades dos usuários e os objetivos do projeto. Depois, configuramos o ambiente de desenvolvimento. O design da interface foi criado com foco na usabilidade e clareza das informações. Em seguida, implementamos funcionalidades essenciais para o cálculo do IMC, incluindo validação de dados, processamento do cálculo e exibição dos resultados. Realizamos testes unitários e de integração para garantir a responsividade do site em diversos dispositivos e navegadores. Seguimos uma metodologia ágil para uma abordagem flexível e adaptativa.

## Funcionalidades

- Cálculo do Índice de Massa Corporal (IMC).
- Visualização dos percentuais corporais através de um gráfico pizza.
- Listagem de 1000 pessoas com dados puxados do banco de dados MySQL.
- Possibilidade de calcular e salvar o IMC e a taxa de gordura corporal no banco de dados.
- Organização da listagem pela taxa de gordura corporal.

## Requisitos

- PHP 8.1.27
- Laravel 9.x
- MySQL
- JavaScript para visualização do gráfico pizza

## Configuração do Ambiente de Desenvolvimento

Para simplificar a configuração do ambiente de desenvolvimento, recomendamos o uso do Laravel Homestead ou Laravel Sail e o Xampp para facilitar a instalação do PHP e MYSQL.
### Instalação do Laravel
- Certifique-se de ter o Composer instalado.

- Crie um novo projeto Laravel ou clone este repositório.

- Configure o arquivo .env com as credenciais do banco de dados MySQL.

- Execute as migrações para criar as tabelas no banco de dados:
```sh
php artisan migrate
```
- Faça a população do banco:  
```sh
php artisan db:seed
```
- Inicie o servidor de desenvolvimento:
  ```sh
php artisan serve
```
### Instalação do Xampp

1. Faça o download do Xampp no [site oficial](https://www.apachefriends.org/index.html).
2. Siga as instruções de instalação para o seu sistema operacional.
3. Após a instalação, inicie o Xampp Control Panel.
4. No painel de controle, clique em "Start" ao lado dos módulos Apache e MySQL para iniciar os serviços.

### Executando o Projeto

1. Clone este repositório para o diretório `htdocs` dentro do diretório de instalação do Xampp.
2. Abra seu navegador web e acesse `http://localhost/nome-do-seu-projeto` (substitua "nome-do-seu-projeto" pelo nome do diretório onde você clonou o repositório).
3. O projeto deve agora estar acessível e pronto para uso no seu ambiente local.

Com o Xampp, você pode facilmente configurar um ambiente de desenvolvimento PHP em seu computador, sem a necessidade de configurar manualmente um servidor web e o PHP. Isso torna o processo de desenvolvimento mais rápido e conveniente.

Para informações mais detalhadas sobre o Xampp, consulte a [documentação oficial](https://www.apachefriends.org/pt_br/index.html).

## Como usar

1. Clone este repositório para o seu ambiente local.
2. Configure o banco de dados MySQL no arquivo .env.
3. Certifique-se de ter o PHP 8.1.27 e Laravel instalados em sua máquina.
4. Abra o projeto em seu navegador.
5. Acesse a rota desejada.


## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir um pull request com melhorias, correções de bugs ou novas funcionalidades.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
