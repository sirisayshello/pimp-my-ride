# Pimp My Ride

## Project info

This project is an assignment in Laravel development, for first-year web development students at Yrgo, Gothenburg, Sweden.

## Requirements

-   PHP 8.2 or higher
-   Dependencies: MySql, Composer

## Installation

1. Clone the repository: `git clone https://github.com/sirisayshello/pimp-my-ride.git`
2. Install project dependencies
3. Install Composer dependencies: Navigate to the project directory in your terminal and run `composer install`. This command reads the composer.json file to install all the required PHP packages, including Laravel.
4. Configure settings in `.env` file. See `.env.example`: Open the .env file and update the database connection settings (DB_DATABASE, DB_USERNAME, DB_PASSWORD) to match your local MySQL server configuration.
5. Generate Application Key: Run php artisan key:generate to generate a new application key for your project. This key is used for encryption and should be kept secret.
6. Configure Database Settings: Run `php artisan migrate` to create the necessary tables in your database.
7. Start the Laravel Development Server: Finally, run `php artisan serve` to start the Laravel development server. You can access the project by navigating to http://localhost:8000 in your web browser.

### Install PHP on macOS

```
brew install php
```

### Install PHP on WSL

```
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt-get install --yes php8.1 php-sqlite3 php-mysql php-xml php-cli php-gd php-mbstring php-curl curl git unzip
```

### Install MySQL on macOS

```
brew install mysql
brew services start mysql
```

### Install MySQL on WSL

```
sudo apt update
sudo apt install mysql-server
sudo /etc/init.d/mysql start
sudo mysql_secure_installation
```

### Install Composer

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
