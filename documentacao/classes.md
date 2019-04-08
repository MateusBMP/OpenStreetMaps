# Classe de interacao com API do OpenStreetMaps

## Geocoding

Classe primaria ao projeto. Possui todas as funcionalidades referentes a api _[Nomitatim](nominatim.openstreetmap.org)_.

Seu namespace e:

- **OSM**

### Variaveis

- api: Link para a api _Nominatim_
- agent: Agent referente ao cabecalho de requisicao a api
- filename: Nome do arquivo de saida da requisicao a api
- format: Formato de saida da requisicao
- params: Parametros de busca, como formato de saida
- search: Termos de busca
- search_type: Tipo da variavel de busca
- url: URL de requisicao
- request: Saida de requisicao
- coordinates: Coordenadas geograficas da requisicao

### Funcoes publicas

#### generate

Gera parametros basicos da api e requisita a mesma.

> ``generate ( array $search [, string $output_format, array $params ] ) : bool``

**generate** cria as variaveis basicas da classe, sendo essa a primeira funcao a ser executada. Ela, obrigatoriamente, espera um array contendo os parametros de busca e, opcionalmente, uma string com o metodo de saida da requisicao e um array com os parametros de pesquisa. O estilo de busca gerado é o ``https://nominatim.openstreetmap.org/search/<query>?<params>``.

- **search**
  - Um array com termos para pesquisa. Formatos de busca listados na [documentacao Nominatim](wiki.openstreetmap.org/wiki/Nominatim#Parameters) no tipo **< query >**.
- **output_format**
  - Uma string com o formato de saida. Os formatos aceitaveis sao: **html**, **xml**, **json**, **json2**. Formato padrao: **json**.
- **params**
  - Um array com parametros de busca. Parametros aceitaveis listados na [documentacao Nominatim](wiki.openstreetmap.org/wiki/Nominatim#Parameters) do tipo **< params >**.

A funcao retorna um booleano, sendo **true** para a execucao completa. Caso o parametro **search** nao seja passado, retorna **false**.

#### saveRequest

Salva a requisicao realizada em um arquivo.

> ``saveRequest ( [ string $filename ] ) : bool``

**saveRequest** salva a requisicao realizada pela funcao **generate** em um arquivo. Ela espera, opcionalmente, uma string contendo o nome do arquivo de saida, que sera salvo no diretorio _\\src\\src\\outputs\\_.

- **filename**
  - Uma string com o nome do arquivo de saida. A extensao do arquivo e escrita automaticamente de acordo com o formato de saida requisitado na funcao **generate**.

A funcao retorna um booleano, sendo **true** para a execucao completa. Caso o arquivo não seja aberto, retorna **false**.

#### getApi

Requisita o link da API.

> ``getApi ( ) : string``

**getApi** retorna o link da API usada no sistema. Não ha parametros de entrada e a funcao retorna uma string com o link da API.

#### getAgent

Requisita o agent do cabecalho.

> ``getAgent ( ) : string``

**getAgent** retorna o agent do cabecalho usado na requisicao da API. Nao ha parametros de entrada e a funcao retorna uma string com o o agent do cabecalho.

#### getFilename

Requisita o nome do arquivo de saida.

> ``getFilename ( ) : string``

**getFilename** retorna o nome do arquivo de saida da funcao **saveRequest**. Nao ha parametros de entrada e a funcao retorna uma string com o nome do arquivo, sem extensao.

#### getFormat

Requisita o formato de saida da requisicao a API.

> ``getFormat ( ) : string``

**getFormat** retorna o formato da saida da requisica a API. Não ha parametros de entrada e a funcao retorna uma string com o formato de saida.

#### getParams

Requisita os parametros de entrada da requisicao a API.

> ``getParams ( [ string $name ] ) : array || string``

**getParams** retorna um array com todos os parametros da pesquisa feita pela funcao **generate** se nao houver parametros de entrada. Se inserida uma entrada, retorna o valor do nome do parametro requisitado na entrada.

- **name**
  - Uma string com o nome do parametro a ser buscado.

#### getSearch

Requisita a busca requisitada a API.

> ``getSearch ( [ string $name ] ) : array || string``

**getSearch** retorna um array ou string da pesquisa requisitada na funcao **generate** se nao houver um parametro de entrada. Se inserida uma entrada, retorna o valor do nome do parametro requisitado na entrada.

- **name**
  - Uma string com o nome do parametro a ser buscado

#### getUrl

Requisita a URL de pesquisa.

> ``getUrl ( ) : string``

**getUrl** retorna uma string com a URL requisita na funcao **generate**. Nao ha parametros de entrada.

#### getRequest

Requisita a saida da requisicao a API.

> ``getRequest ( ) : multiple``

**getRequest** retorna a saida da requisicao a API feita pela funcao **generate**. O formato de saida depende do formato requisitado. Nao ha parametros de entrada.

#### getCoordinates

Requisita as coordenadas da requisicao a API.

> ``getCoordinates ( [ string $name ] ) : array || string``

**getCoordinates** retorna as coordenadas geograficas da saida da requisicao feita a API se nao houver entrada. O nome das coordenadas no array sao:

- _lat_: Latitude
- _lon_: Longitude

Se houver uma entrada, retorna uma string com a coordenada requisitada na entrada.

- **name**
  - Uma string com o nome da coordenada.
