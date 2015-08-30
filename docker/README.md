docker dev env
--------------

This directory contains all the configurations needed by docker images to build, to start and to run a full-featured docker development environment.

**Features**:

1. php-cli

    2.1 mongo extension
    
    2.2 xdebub

**Addresses**:

* str-user-model app => **127.0.0.44**

## Requirements

1. docker >= 1.6.2
2. docker-composer >= 1.3

#### Docs

* Docker [installation guides](https://docs.docker.com/installation).
* Docker Compose [installation guides](https://docs.docker.com/compose/install).

## Usage

Execute the following commands in the **kokoro root**.

```
$ cp docker-compose.yml.dist docker-compose.yml
$ docker-compose --project str-user-model build
$ docker-compose --project str-user-model up -d
```

To stop everything and to remove containers also run following commands.

```
$ docker-compose --project str-user-model stop
$ docker-compose --project str-user-model rm
```

### Composer

You built the docker environment and you ran it.

Now you need to run composer but you do not have it (and php) locally installed on your machine.

Solution:

```
$ docker run --rm \
    -v $(pwd):/app \
    -v ${HOME}/.ssh:/root/.ssh \
    composer/composer install --ignore-platform-reqs
```

Do you need to update the vendor and the autoload files?

```
$ docker run --rm \
    -v $(pwd):/app \
    -v ${HOME}/.ssh:/root/.ssh \
    composer/composer up -o --ignore-platform-reqs
```

---
