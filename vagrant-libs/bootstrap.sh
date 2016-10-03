#!/usr/bin/env bash

# Prepare nodejs and hubot
yum remove -y nodejs npm
curl --silent --location https://rpm.nodesource.com/setup_4.x | bash -
yum install -y nodejs redis java-1.7.0-openjdk
npm install -g yo generator-hubot
# npm install hubot-slack --save

# Prepare rundeck
mkdir /vagrant/rundeck
cd /vagrant/rundeck && wget http://dl.bintray.com/rundeck/rundeck-maven/rundeck-launcher-2.6.9.jar

# Prepare hewbot-docker
cd /vagrant && git clone https://github.com/Dynamictivity/hewbot-docker.git
