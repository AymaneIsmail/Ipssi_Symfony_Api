symfony console cache:clear --no-warmup
symfony console doctrine:database:drop --force --if-exists
symfony console doctrine:database:create  --if-not-exists
symfony console doctrine:schema:create
symfony console doctrine:schema:update --force
@REM symfony console doctrine:fixtures:load