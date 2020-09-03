#! /bin/bash

echo -n "Enter your ssh IP [ENTER]: "
read Ip

echo -n "Enter your ssh Port [ENTER]: "
read Port

ssh $Ip -p $Port