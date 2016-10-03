#!/usr/bin/env bash

# Sync source code
mkdir /www
rsync -vaz /source/* /www
