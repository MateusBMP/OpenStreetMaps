# Classe de interacao com API do OpenStreetMaps

-----

## Apresentacao

Esse projeto simplifica o uso da API do OpenStreetMaps, a _[Nomitatim](nominatim.openstreetmap.org)_, transcrevendo-a a funcoes simples com poucos parametros de entrada. O namespace utilizado para a classe principal e **OSM**.

Toda sua documentacao foi feita usando _[Markdown](https://www.markdownguide.org)_. Entao, para visualizacao mais facil da documentacao, pode-se usar qualquer leitor de Markdown, como o [Dillinger](https://dillinger.io).

## Requisitos de sistema

- [PHP 7.2.12](http://www.php.net)
- [Composer 1.8.0](https://getcomposer.org)

## Instalando a biblioteca

Como o projeto é baseado em uma classe, use-o a partir do _composer_. Assim, para instalar, execute:

```terminal
$ composer install
$ composer dump-autoload
```

Se necessario, use posteriormente `composer update` e `composer dump-autoload -o`.

## Exemplos de uso

Para exemplos simplificados de uso, veja os _feature tests_ presentes no arquivo **featureTest.php** no diretorio _tests/_.
