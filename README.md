## Zip Code Finder

### Como clonar:

```
git clone git@github.com:DouglasVulcano/zip_code_finder_backend.git
```

-   Executar o comando a seguir para que as dependencias do projeto sejam baixadas

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### Como executar:

```
./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate
```