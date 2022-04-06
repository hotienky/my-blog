#!/usr/bin/env bash
docker_start_main_services() {
    php artisan migrate --force --seed
    apache2-foreground
}

_main() {
    docker_start_main_services
}

_main
