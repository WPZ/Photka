#!/bin/bash

php symfony doctrine:build --all --and-load
php symfony cc
php symfony project:permissions
