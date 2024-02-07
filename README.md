## About Artist API

Public API to get info about artist

## Requirements

- [Docker](https://www.docker.com/)

## Installation

Clone project:

```
git clone  artists-test
```

To install sail and project dependencies run:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

To run project: 

```
./vendor/bin/sail up
```

[Sail Documentation](https://laravel.com/docs/10.x/installation#docker-installation-using-sail)

### Run migrations

```
./vendor/bin/sail artisan migrate
```

### Database seed

```
./vendor/bin/sail artisan db:seed
```

## API Documentation

Artist Open API documentation [http://localhost/api/documentation](http://localhost/api/documentation)

### l5-swagger

Generate swagger documentation:

```
./vendor/bin/sail artisan l5-swagger:generate
```

[l5-swagger documentation](https://github.com/DarkaOnLine/L5-Swagger/wiki)

## Larastan

```
./vendor/bin/sail bin phpstan analyse
```

[Larastan](https://github.com/larastan/larastan)

## Tests

Run command:

```
./vendor/bin/sail artisan test
```
