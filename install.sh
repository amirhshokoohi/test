#!/bin/bash

# First, update the Ubuntu local package lists:
sudo apt update

# Next, install the prerequisite packages
sudo apt install unzip curl software-properties-common -y

# Now, install the Apache2 web server using the apt package manager:
sudo apt install apache2 -y
sudo systemctl status apache2
sudo systemctl enable apache2
sudo ufw allow "Apache Full"
sudo apt install ufw -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get install php8.1 -y
sudo apt install php-mbstring php-mysql php-curl php-cli php-dev php-imagick php-soap php8.1-zip php-xml php-imap php-xmlrpc php8.1-gd php8.3-opcache php-intl php-json php8.1-ldap -y
sudo systemctl restart apache2
sudo apt install mariadb-server -y
sudo mysql -u root -p <<EOF
CREATE DATABASE King CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'amir'@'localhost' IDENTIFIED BY 'amir';
GRANT ALL ON King.* TO 'amir'@'localhost';
FLUSH PRIVILEGES;
EXIT;
EOF
cd /var/www/
git clone https://github.com/amirhshokoohi/test.git
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
cd test
composer install
cp .env.example .env
nano .env
sudo chgrp -R www-data /var/www/test
sudo chown -R www-data:www-data /var/www/test
sudo chmod -R 775 /var/www/test/storage
cd /etc/apache2/sites-available/
sudo nano test.conf
echo "<VirtualHost *:80>
   ServerName in1.farscloud.buzz
   ServerAdmin webmaster@thedomain.com
   DocumentRoot /var/www/test/public

   <Directory /var/www/test>
       AllowOverride All
   </Directory>
   ErrorLog \${APACHE_LOG_DIR}/error.log
   CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>" | sudo tee test.conf
sudo a2dissite 000-default.conf
sudo a2ensite test.conf
sudo a2enmod rewrite
sudo systemctl restart apache2
php artisan key:generate --ansi
curl -fsSL https://deb.nodesource.com/setup_19.x | sudo -E bash - && sudo apt-get install -y nodejs
npm install
npm run build
