#!/bin/bash
sudo touch /opt/openbaton/test.txt
sudo bash -c 'echo $server_private > /opt/openbaton/test.txt'
sudo bash -c 'echo $server_private_floatingIp >> /opt/openbaton/test.txt'
