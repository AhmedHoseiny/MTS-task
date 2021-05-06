# MTS Task

## Installation
Run below commands
```bash

composer install
copy .env.example to .env
cd /public
serve the app by "php -S localhost:8000"

To run The commands indivudaly:
cd /commands
php migrations.php
php seed.php
php export.php

The ERD exists in "/storage/ERD.png"

To run tests:
Run "vendor/bin/phpunit" command, if you want to filter with test-case run "vendor/bin/phpunit --filter='test-case name'"

```

#Run With Docker

Run below commands
```bash

docker-compose up -d

#List all of the running containers:
 docker ps

```
