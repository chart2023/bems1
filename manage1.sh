#!/bin/bash
sudo mkdir /var/www/html/bem1/
sudo cp -r /opt/openbaton/scripts/assets/ /opt/openbaton/scripts/index.php /var/www/html/bem1
sudo touch /opt/openbaton/test.txt
sudo echo $server_private > /opt/openbaton/test.txt
