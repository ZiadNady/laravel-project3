#!/bin/bash
echo -e '' 
echo -e '' 
echo -e '' 
echo -e '  ___        _          _                               _   _           _        _ _           ' 
echo -e ' / _ \      | |        | |                             | | (_)         | |      | | |          ' 
echo -e '/ /_\ \_   _| |_ ___   | |     __ _ _ __ __ ___   _____| |  _ _ __  ___| |_ __ _| | | ___ _ __ ' 
echo -e '|  _  | | | | __/ _ \  | |    / _  |  __/ _  \ \ / / _ \ | | |  _ \/ __| __/ _  | | |/ _ \  __|' 
echo -e '| | | | |_| | || (_) | | |___| (_| | | | (_| |\ V /  __/ | | | | | \__ \ || (_| | | |  __/ |   ' 
echo -e '\_| |_/\__,_|\__\___/  \_____/\__,_|_|  \__,_| \_/ \___|_| |_|_| |_|___/\__\__,_|_|_|\___|_|   ' 
echo -e '' 
echo -e '' 
echo -e '' 
echo -e ''              

# Install dependencies
echo -e ' \n \n \n------------------------------------------------------'
echo -e 'Install dependencies'
echo -e '------------------------------------------------------\n'
composer install --ignore-platform-req=ext-curl

#copy environment files
echo -e '\n\n\n------------------------------------------------------'
echo -e 'copy environment files'
echo -e '------------------------------------------------------\n'
if [ ! -f .env.example ]; then
  echo -e 'Error: .env.example file not found. Exiting program.\n'
  exit 1
fi
if [ -f .env ]; then
  echo -e '.env file already exists, skipping copy.\n'
else
  cp .env.example .env
  echo -e 'Environment files copied successfully.\n'
fi

# Generate a new application key
echo -e ' \n \n \n------------------------------------------------------'
echo -e 'Generate a new application key'
echo -e '------------------------------------------------------\n'
php artisan key:generate

# Run database migrations
echo -e ' \n \n \n------------------------------------------------------'
echo -e 'Run database migrations'
echo -e '------------------------------------------------------\n'
php artisan migrate


echo -e ' \n \n \n------------------------------------------------------'
echo -e '......DONE......'
echo -e '------------------------------------------------------\n'
echo -e ' \n \n \n------------------------------------------------------'
echo -e ' run :  "php artisan serve"  to start server' 
echo -e '------------------------------------------------------\n'
