#!/bin/bash

sudo apt-get update && sudo apt-get install -y apache2 php5 libapache2-mod-php5 php5-mcrypt 
sudo apt-get install -y php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl php5-cgi php5-cli php5-common php5-dbg
sudo service apache2 restart
