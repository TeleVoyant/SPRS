#!/bin/bash
rm -r vendor
rm -r logs
composer install -noa
composer dump