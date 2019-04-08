# Classe de interacao com API do OpenStreetMaps

## Estrutura geral

O projeto foi desenvolvido usando PHPUnit e estruturado com um sistema de classes, armazenando a saida em um arquivo de tipo especifico e visualizando as funcionalidades a partir de interfaces web. Todas as interfaces sao completamente opicionais, servindo apenas como testes de funcionalidade ou implementacao de exemplo de uso. Desta forma, encontra-se as seguintes pastas e arquivos:

- _src/_: Codigo fonte
  - _class/_: Classes do sistema
  - _inputs/_: Arquivos de entrada de views
  - _outputs/_: Saidas de funcoes de classes ou views
  - _views/_: Interfaces de visualizacao do projeto
- _tests/_: Testes de classes
- _vendor/_: Utilitarios gerados pelo Composer
- _composer.json_: Configuracoes do Composer
- _phpunit.xml_: Configuracoes do PHPUnit
- _test.bat_: Script para execucao dos testes unitarios
