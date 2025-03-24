# SDK Necta.co - Payment

## Descrição
O **SDK Necta.co** é um kit de desenvolvimento de software que encapsula chamadas da API de pagamento Necta.co, facilitando a integração e utilização dos serviços de pagamento em aplicações, respeitando as nomenclaturas de parâmetros e estrutura de retorno (response) das chamadas (request).

Os arquivos estão organizados por diretórios conforme abaixo:


```
../
src/
├── Context/
│ └── Assinatura.php
│ └── Cliente.php
│ └── Plano.php
├── Enum/
│ └── StatusAssinatura.php
│ └── StatusPagamento.php
│ └── StatusPedido.php
│ └── TipoDocumento.php
│ └── TipoPagamento.php
├── Helpers/
│ └── HTTPClient.php
├── Types/
│ ├── Cartao.php
│ └── Cliente.php
│ └── Endereco.php
│ └── Plano.php
└── Configuration.php
```
## Instalação Via Compose

Instale o pacote via **composer** utilizando o comando ```composer require o4l3x4ndr3/sdk-conexa-saude```.

## Configuração Ambiente

A SDK possui suporte a controle de ambiente (ENVIRONMENT), permitindo a indicação do ambiente em que a aplicação se
encontrar
em execução (Produção ou Desenvolvimento).

Para definir o ambiente em que a aplicação esta sendo executada, inclua defina **variáveis de ambientes no servidor** ou
declare-as no arquivo _**.htaccess**_.

### Utilizando arquivo .htaccess

Utilizando o arquivo ```.htaccess``` da sua aplicação (caso não possua, crie), declare as seguintes variáveis:

```
NECTACO_ENVIRONMENT [development | production]
NECTACO_EMAIL [usuario]
NECTACO_PASSWORD [senha]
```

### Utilizando a classe Configuration
Também é possível configurar a comunicação com a API através da classe ``Configuration``.
```
use O4l3x4ndr3\SdkNectaco\Configuration;
use O4l3x4ndr3\SdkNectaco\Context\Patient;

# Definindo o token e ambiente... 
$config = new Configuration('usuario@email.com', '******', 'development');

# Instanciando uma classe de contexto
$cliente = new Cliente($config);
```

Por padrão a SDK utiliza o valor para ambiente de desenvolvimento [```development```].

## Contextos da API

As classes de contextos são constituídas por métodos de consumo da API e possuem suporte a ```namespace``` do PHP,
possível utilizá-los através da palavra-chave ```use```, conforme exemplo abaixo:

```
use O4l3x4ndr3\SdkConexa\Context\Patient;

### OBTER DADOS DO PACIENTE ATRAVÉS DO ID ###

# Instanciando a classe
$patient = new Patient();
$patient->getByCpf(12345678900);

# ou através de chamada de forma anônima:
(new Patient())->getByCpf(12345678900);
```

Todas as classes possuem assinaturas que remetem aos métodos documentados no site oficial da
API (https://apidocs.conexasaude.com.br/v1/enterprise/index.html).

## Objetos de Tipos

Os chamados objetos de tipo, são classes que de modelos representados nos contextos de requisição da API e não possuem
métodos, apenas propriedades. Um objeto de tipo pode um modelo de dados estruturado e deve ser instanciado e atribuídos
os seus respetivos valores de propriedades para assim sejam utilizados nas classes de contextos.

Veja no exemplo a seguir o uso de um objeto de tipo para inserir um novo grupo familiar:

```
use O4l3x4ndr3\SdkNectaco\Context\Cliente; // Classe do contexto Cliente
use O4l3x4ndr3\SdkNectaco\Types\Cliente; // Classe de Tipo Cliente

...

# Dados do Cliente
$clienteInfo = new Cliente('João Silva', '123.456.789-00', '1980-01-12, [...]);

# Cadastar um novo cliente
return (new Cliente())->create($clienteInfo);
```

Cada tipo possui um construtor, mas outras propriedades (opcionais) também poderão ser declaradas, caso o tipo as
possuam.

## Listas enumeradas (ENUM)

Como forma de auxiliar o preenchimento de alguns valores de lista, a bibliotéca disponibiliza um arquivo de lista
enumeradas (Enum). O arquivo de Enum encontra-se no diretório
```/Helpers```, mas também e acessado de forma automática
conforme [documentação](https://www.php.net/manual/pt_BR/language.enumerations.basics.php) oficial do PHP.

## Contribuição ##

Caso deseja contribuir para melhorar e manter esse pacote envie e-mail para alexandre@2plug.com.br e solicite acesso ao
repositório informando o seu perfil no github.