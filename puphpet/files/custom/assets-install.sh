#!/bin/bash

VAGRANT_CORE_FOLDER=$(cat "/.puphpet-stuff/vagrant-core-folder.txt")

cd /var/www

if [ ! -d /var/www/app ]; then
	exit
fi

echo 'Dumping assets'
php app/console assets:install web
php app/console assetic:dump
php app/console assetic:dump -e prod
