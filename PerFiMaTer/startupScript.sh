#! /bin/bash

#Include route to VPN Server
# ip route add 10.8.0.0/24 via 172.0.0.2

#Start Apache Server
ttyd -p 7778 /bin/bash &
apachectl -D FOREGROUND