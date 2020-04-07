#!/bin/bash
docker-compose exec shop_emzs /swtools/init.sh
docker-compose exec shop_emzs /swtools/prepare-dirs.sh

#docker-compose exec shop_emzdn php bin/console sw:plugin:refresh
#docker-compose exec shop_emzdn php bin/console sw:plugin:install
#docker-compose exec shop_emzdn php bin/console sw:plugin:activate
