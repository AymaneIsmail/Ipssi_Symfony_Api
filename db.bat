php bin/console cache:clear --no-warmup
php bin/console doctrine:database:drop --force --if-exists
php bin/console doctrine:database:create  --if-not-exists
php bin/console doctrine:schema:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:migration:migrate --no-interaction
php bin/console doctrine:fixtures:load --no-interaction