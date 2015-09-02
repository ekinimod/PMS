#!/bin/bash
echo Lancement du nettoyage du cache
/share/CACHEDEV1_DATA/.qpkg/PHP/bin/php app/console cache:clear --env=prod
#/share/CACHEDEV1_DATA/.qpkg/PHP/bin/php app/console cache:clear


chown -R httpdusr:everyone /share/CACHEDEV1_DATA/Web/PMS/app/cache
chown -R httpdusr:everyone /share/CACHEDEV1_DATA/Web/PMS/app/logs

