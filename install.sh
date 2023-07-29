#!/bin/bash



temp_dir=$(mktemp -d)
git clone https://github.com/amirhshokoohi/test.git "$temp_dir"

# Show the contents of king.txt

printf "\033[1;35m%s\033[0m\n" "$(<$temp_dir/king.txt)"

# Show a message to the user

echo "Please Wait ..."

# Sleep for 50 seconds

sleep 10

clear

sed -i 's/#Port 22/Port 22/' /etc/ssh/sshd_config

po=$(cat /etc/ssh/sshd_config | grep "^Port")

port=$(echo "$po" | sed "s/Port //g")

adminuser=$(mysql -N -e "use King; select adminuser from setting where id='1';")

adminpass=$(mysql -N -e "use King; select adminpassword from setting where id='1';")

clear

if [ "$adminuser" != "" ]; then

adminusername=$adminuser

adminpassword=$adminpass

else

adminusername=admin

echo -e "\nPlease Enter Panel admin user."

printf "Default user name is \e[33m${adminusername}\e[0m, let it blank to use this user name: "

read usernametmp

if [[ -n "${usernametmp}" ]]; then

    adminusername=${usernametmp}

fi

adminpassword=123456

echo -e "\nPlease Enter Panel Admin Password."

printf "Default password is \e[33m${adminpassword}\e[0m, let it blank to use this password : "

read passwordtmp

if [[ -n "${passwordtmp}" ]]; then

    adminpassword=${passwordtmp}

fi

adminport=8080

echo -e "\nPlease Enter Panel Admin Port."

printf "Default Port is \e[33m${adminport}\e[0m, let it blank to use this password : "

read porttmp

if [[ -n "${porttmp}" ]]; then

    adminport=${porttmp}

fi

fi

ipv4=$(curl -s ipv4.icanhazip.com)

# First, update the Ubuntu local package lists:

sudo apt update

# Next, install the prerequisite packages

sudo apt install unzip curl software-properties-common -y

# Now, install the Apache2 web server using the apt package manager:

sudo apt install apache2 -y

sudo systemctl enable apache2

sudo apt install ufw

sudo ufw allow "Apache Full"

sudo add-apt-repository ppa:ondrej/php -y

sudo apt-get install php8.1 -y

sudo apt install php-mbstring php-mysql php-curl php-cli php-dev php-imagick php-soap php8.1-zip php-xml php-imap php-xmlrpc php8.1-gd php8.3-opcache php-intl php-json php8.1-ldap -y

sudo systemctl restart apache2

sudo apt install mariadb-server -y

mysql -e "create database King;" &

wait

mysql -e "CREATE USER '${adminusername}'@'localhost' IDENTIFIED BY '${adminpassword}';" &

wait

mysql -e "GRANT ALL ON *.* TO '${adminusername}'@'localhost';" &

wait

cd /var/www/

git clone https://github.com/amirhshokoohi/test.git

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php

php -r "unlink('composer-setup.php');"

sudo mv composer.phar /usr/local/bin/composer

cd test

yes | composer install

cp .env.example .env

sudo sed -i "s/DB_DATABASE=.*/DB_DATABASE=King/" .env

sudo sed -i "s/DB_USERNAME=.*/DB_USERNAME=$adminusername/" .env

sudo sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$adminpassword/" .env

sudo chgrp -R www-data /var/www/test

sudo chown -R www-data:www-data /var/www/test

sudo chmod -R 775 /var/www/test/storage

cd /etc/apache2/sites-available/


test -f test.conf || sudo tee test.conf > /dev/null << EOF
<VirtualHost *:$adminport>
   ServerName $ipv4
   ServerAdmin webmaster@thedomain.com
   DocumentRoot /var/www/test/public

   <Directory /var/www/test>
       #AllowOverride All
   </Directory>
   ErrorLog \${APACHE_LOG_DIR}/error.log
   CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

#sudo nano test.conf

#echo -e "<VirtualHost *:$adminport>
   #ServerName $ipv4
   #ServerAdmin webmaster@thedomain.com
   #DocumentRoot /var/www/test/public

   #<Directory /var/www/test>
       #AllowOverride All
   #</Directory>
   #ErrorLog \${APACHE_LOG_DIR}/error.log
   #CustomLog \${APACHE_LOG_DIR}/access.log combined
#</VirtualHost>" | sudo tee /etc/apache2/sites-available/test.conf > /dev/null |sudo pkill -9 nano

sudo sed -i "0,/^Listen / s/^Listen .*/Listen $adminport/" /etc/apache2/ports.conf

sudo a2dissite 000-default.conf

sudo a2ensite test.conf

sudo a2enmod rewrite

sudo systemctl restart apache2

cd /var/www/test/

php artisan key:generate --ansi

php artisan migrate

curl -fsSL https://deb.nodesource.com/setup_19.x | sudo -E bash - && sudo apt-get install -y nodejs

npm install

npm run build

clear


printf "\033[1;35m%s\033[0m\n" "$(<$temp_dir/king.txt)"

echo -e "\033[1;35m---------------> KING Panel <----------------\033[0m"
echo -e "\033[1;35mUsername : \033[0m${adminusername}"
echo -e "\033[1;35mPassword : \033[0m${adminpassword}"
echo -e "\033[1;35m******** Connection Details ********\033[0m"
echo -e "\033[1;35mIP : \033[0m$ipv4"
echo -e "\033[1;35mSSH port : \033[0m${adminport}"


