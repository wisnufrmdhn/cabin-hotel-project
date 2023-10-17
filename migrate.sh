#!/bin/bash

# Check if the argument provided is "fresh"
if [ "$1" == "fresh" ]; then
    # Execute the migrate:fresh --seed command
    docker exec -it laravel-app php artisan migrate:fresh --seed
elif [ "$1" == "migrate" ]; then
    # Execute the migrate:fresh --seed command
    docker exec -it laravel-app php artisan migrate --seed
elif [ "$1" == "clear" ]; then
    # Execute the clear commands
    docker exec -it $container_name php artisan route:clear
    docker exec -it $container_name php artisan config:clear
    docker exec -it $container_name php artisan cache:clear
else
    echo "Invalid command. Usage: $0 [migrate|migrate:fresh|clear]"
    exit 1
fi