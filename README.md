# Zip Code Finder - API para Busca de Endereços

Bem-vindo ao **Zip Code Finder**, uma aplicação backend para consulta de endereços por CEP.

## Instalação de Dependências

Execute o comando abaixo para instalar as dependências do projeto:

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

## Como executar o projeto

1. Acesse a pasta do projeto e renomeie o arquivo **.env.example** para **.env**, em seguida, rode o comando para gerar a APP_KEY do Laravel:

```bash
./vendor/bin/sail artisan key:generate
```

2. Inicie o ambiente Docker utilizando o comando abaixo:

```bash
./vendor/bin/sail up -d
```

3. Aplique as migrações para configurar o banco de dados:

```bash
./vendor/bin/sail artisan migrate
```

Após esses passos, o servidor estará em execução e pronto para ser utilizado.

## Como utilizar a API

### Endpoint: Buscar Endereço por CEP

-   Método: GET
-   URL: http://localhost/api/search-address/{cep}
    Substitua {cep} pelo CEP desejado. Por exemplo, para buscar o endereço do CEP 01001000, a URL completa será: http://localhost/api/search-address/01001000

### Documentação Swagger:

-   Acessar a [**documentação**](http://localhost/api/documentation#/Address)

### Exemplo de chamada com curl:

```bash
curl -X GET "http://localhost/api/search-address/01001000" -H "Accept: application/json"
```

## Rodando os Testes Unitários

Para garantir a qualidade do código, você pode executar os testes unitários incluídos no projeto. Use o seguinte comando:

```bash
./vendor/bin/sail test
```

## Recursos Adicionais

[**_Documentação do Laravel Sail_**](https://laravel.com/docs/11.x/sail): Para mais detalhes sobre o ambiente de desenvolvimento.

## Licença

Este projeto está licenciado sob a [**MIT License**](https://github.com/DouglasVulcano/zip_code_finder_backend/blob/main/LICENSE).
