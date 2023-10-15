#!/bin/bash

# Check if the argument provided is "fresh"
if [ "$1" == "fresh" ]; then
    # Execute the migrate:fresh --seed command
    docker exec -it laravel-app php artisan migrate:fresh --seed
else
    # Execute the migrate:seed command
    docker exec -it laravel-app php artisan migrate:seed
fi