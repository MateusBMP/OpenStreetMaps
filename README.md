# Classe de interacao com API do OpenStreetMaps

-----

## Apresentacao

Esse projeto simplifica o uso da API do OpenStreetMaps, transcrevendo-a a funcoes simples com poucos parametros de entrada. Toda sua documentacao foi feita usando _[Markdown](https://www.markdownguide.org)_.

Para visualizacao mais facil da documentacao, pode-se usar qualquer leitor de Markdown, como o [Dillinger](https://dillinger.io).

## Executando o sistema

Usando o XAMPP e posicionando a pasta do projeto na pasta htdocs, usando como nome de pasta _\\osm\\_, pode-se acessar a pagina inicial pelo endereco:

- <http://localhost/osm/src/src/views/home.php>

Como o projeto é baseado em uma classe e em testes de suas funcoes, sua pagina inicial serve apenas de interacao para todo o projeto. Ou seja, a pagina inicial independe ao bom funcionamento da aplicacao. Use-a apenas para testes.

Para uso das classes a partir do _composer_, e necessario a sua execucao, ou seja:

- ``composer install``
- ``composer dump-autoload``

Se necessario, use posteriormente ``composer update`` e ``composer dump-autoload -o``.

## Exemplos de uso

Para exemplos simplificados de uso, veja os _feature tests_ presentes no arquivo **featureTest.php** no diretorio _src/tests/_. Tambem ha exemplos simples nas views presentes do diretorio _src/src/views/_.
