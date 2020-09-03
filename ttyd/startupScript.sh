#! /bin/bash

echo "Port :${ttydPort}\n"
# ttyd -c ${ttydUser}:${ttydPasswd} -p ${ttydPort} /bin/bash
ttyd --check-origin -p ${ttydPort} /usr/local/bin/ssh_interface.sh
