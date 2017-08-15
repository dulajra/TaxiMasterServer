# TAXI Master

TAXI Master is a revolutionary solution for the provision of a better taxi service with the utilization of modern information technology approaches. Taxi Master is a system with 3 main components.

* [Taxi Master Driver Application](https://github.com/dulajra/TaxiMasterDriver)
* [Taxi Master Customer Application](https://github.com/dulajra/TaxiMasterCustomer)
* [Taxi Master Server and Web Application](https://github.com/dulajra/TaxiMasterServer)

## Installation

Execute the below code in order to install the dependencies. If you have composer install you dont need to execute the composer.phar, directly follow composer commands.

```sh
$ cd taximaster-server
$ php composer.phar update
$ php composer.phar install
$ php composer.phar dump-autoload
```

## Configuration
You need to install the configuration and the encryption key to start the development server.
```sh
$ php artisan key:generate
$ php artisan config:cache
```
## Database Migration and Seeding
Execute the belo commands in order to migrate and seed data
```sh
$ php artisan migrate --seed
```

## Starting the server (Development)
```sh
$ php artisan serve
```
