
## Symfony 3 - UK Premier Football League
RESTful API for football leagues and teams. Team names from the UK Premier League! We would like you to create the following endpoints in the
API:
1. Get a list of football teams in a single league
2. Create a football team
3. Modify all attributes of a football team
4. Delete a football league


In regards to the relationships between a league and a football team you can assume that a football
league has many teams and a team can only play in a single football league.

This is an unofficial, open-source and community-driven boilerplate for Symfony projects that run on [Docker](https://www.docker.com/). It's an attempt of standardizing and making it easier to bootstrap Symfony applications ready for development and production environments. The main tools used are Symfony, Docker and Docker Compose. Other things included are:

- PHP 7.1 + PHP-FPM
- Nginx
- Xdebug

## Installation

> Before anything, you need to make sure you have Docker properly setup in your environment. For that, refer to the official documentation for both [Docker](https://docs.docker.com/) and [Docker Compose](https://docs.docker.com/compose/). Also, if you're developing on Mac or Windows – *yeah, maybe that's the case* –, make sure you have [Docker Machine](https://docs.docker.com/machine/) properly setup.

> This project depends on having [jwilder/nginx-proxy](https://github.com/jwilder/nginx-proxy) running. This is a reverse proxy container that will allow having multiple projects running on port 80.

Build and run the containers:

```bash
docker-compose up -d --build
```

## Without Docker
1. php bin/console server:start
2. php bin/console doctrine:database:create
3. php bin/console doctrine:schema:update --force

## How to Run test
1. php  composer.phar require --dev symfony/phpunit-bridge
2. ./vendor/bin/simple-phpunit tests/AppBundle/Controller/LeagueControllerTest.php
3. ./vendor/bin/simple-phpunit tests/AppBundle/Controller/TeamControllerTest.php
## FAQ

Coming soon...

Enjoy!
