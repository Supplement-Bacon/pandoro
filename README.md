<p align="center"><a href="https://supplement-bacon.com" target="_blank"><img src="https://supplement-bacon.com/images/cover2.png" width="600"></a></p>

# Pandoro
This repository contains all what you need to start the developement of Laravel applications in an containerized environment.

 
### Technologies

| SERVICE |   PHP  | MariaDB |   Nginx   | Laravel |
|:-------:|:------:|:-------:|:---------:|:-------:|
| VERSION | 8.0.14 | 10.5    |1.17-alpine| 8.78.0  |

## Setting up Docker

```bash
$ git clone git@github.com:Supplement-Bacon/pandoro.git
$ cd pandoro

$ cp env.example .env

# Start containers
$ make start

# Display containers status
$ make status
```

## Install Laravel dependencies

```bash
$ make laravel-install
```

## Access to laravel application
```bash
http://server_domain_or_IP:8000
# OR
http://localhost:8000
```

## Tests
This repository is configured to use Codeception to write your tests
```bash
# Setup local tests database using SQLite
$ make laravel-setup-test-database

# Execute the tests
$ make laravel-tests
```

## Continuous Integration and Delivery
With the file `circleci/config.yml` you can build and test your app automatically with CircleCI.
