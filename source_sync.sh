#!/usr/bin/env bash

# Sync source code
mkdir /www
rsync -vaz /source/* /www
chmod -R 777 /www/tmp
