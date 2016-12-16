# Monotype

[![Code Climate](https://codeclimate.com/github/pyrkamarcin/monotype/badges/gpa.svg)](https://codeclimate.com/github/pyrkamarcin/monotype)
[![Build Status](https://travis-ci.org/pyrkamarcin/monotype.svg?branch=master)](https://travis-ci.org/pyrkamarcin/monotype)
[![Dependency Status](https://www.versioneye.com/user/projects/584e631ca83e27003c0e505a/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/584e631ca83e27003c0e505a)

DNC Server using Reach Socket, UDP, cooperating with Moxa's (or other) Serial to Ethernet converters.

## README
The Monotype Server, although built on an open license, is designed to work in a specific production environment.
If you think you can apply it on their own, you have to remember about adding the possibility of adapting tool, configs, interfaces etc., not a changes in their own production environment.

Recommended are any changes to isolate the project from a particular production environment.

## Instalation

### PHP
Monotype requires PHP version ^7.0.

### Composer 
It is possible to install the project by the composer (new Composer User? See https://getcomposer.org/doc/00-intro.md)

`composer create-project pyrkamarcin/monotype dev-master`

`cd monotype`

`composer install`

## Run

### Server

To start server, enter:

`php bin/monotype server:run`

To sending test data, enter:

`php bin/monotype server:send 127.0.0.1 4001 8192`

Where:

- 127.0.0.1 is active server / client IP
- 4001 is number of the listening server port
- 8192 is a number of random characters (only the production stage)
