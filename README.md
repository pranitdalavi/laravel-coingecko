Steps to run the project:

=> Run the command - "composer install --ignore-platform-reqs"

=> In .env file make changes in database username, password according to your system.

=> In .env file set the database name which you have created. e.g. coingecko

=> Run the command - "php artisan migrate"

=> Run the command - "php artisan serve"

=> In terminal run the command, "php artisan store:coingecko"

After running above command all the records fetched from the coingecko api will be stored in database.