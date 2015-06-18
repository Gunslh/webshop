#!/bin/sh
sudo apt-get install apache2
sudo apt-get install mysql-server php5-mysql
sudo mysql_install_db
sudo mysql_secure_installation
sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
sudo a2enmod rewrite
sudo service apache2 restart

sudo apt-get install mysql-server-5.6
sudo cp my.cnf /etc/mysql/my.cnf
sudo /etc/init.d/mysql restart
mysql -uroot -p123456 < db_init.sql
