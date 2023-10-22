# Symfony/React API

Ce projet a été réalisé par Boutabba AbdelHay, Azzouni Bilele et Ismail Aymane.

## Démarrage Symfony

Pour lancer le projet, exécutez la commande suivante :

```bash
composer install
```

Initialisation de la base de données :

```bash
./db.bat
```

ou

```
php bin/console cache:clear --no-warmup
php bin/console doctrine:database:drop --force --if-exists
php bin/console doctrine:database:create  --if-not-exists
php bin/console doctrine:schema:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:migration:migrate --no-interaction
php bin/console doctrine:fixtures:load --no-interaction
```

Lancer le server  :

```bash
php -S localhost:8000 -t ./public
```

ou

```bash
symfony serve
```

## Procédure stocker et Trigger

Le triger se trouve dans le fichier `migrations/Version20231019075156.php`

````php
// ...
public function up(Schema $schema): void
    {
        $triggerSql = '
        CREATE TRIGGER UpdateStock
        AFTER INSERT ON detail_commande
        FOR EACH ROW
        BEGIN
            UPDATE produit
            SET stock = stock - NEW.quantite
            WHERE produit.id = NEW.produit_id;
        END;
    ';
        $this->addSql($triggerSql);
    }
// ...
````

La procédure stocker se trouve dans le fichier `migrations/Version20231019075157.php`

````php
// ...
    public function up(Schema $schema): void
    {
        $this->addSql('
        CREATE PROCEDURE AfficherUtilisateurCommande(IN idCommande INT)
        BEGIN
            SELECT utilisateur.nom, utilisateur.prenom, detail_commande.quantite, produit.nom_produit
            FROM utilisateur
            INNER JOIN commande ON utilisateur.id = commande.utilisateur_id
            INNER JOIN detail_commande ON commande.id = detail_commande.commande_id
            INNER JOIN produit ON detail_commande.produit_id = produit.id
            WHERE commande.id = idCommande;
        END;
    ');
    }
// ...
````
L'appel de cette procédure se fait ensuite dans `./src/TestProcedureController.php`

```php
// ...

class TestProcedureController extends AbstractController
{
    #[Route('/api/commande/user/{id}', name: 'app_test')]
    public function index(Commande $commande,CommandeRepository $commandeRepository): Response
    {
        return new JsonResponse($commandeRepository->executeProcedure($commande->getId()));
    }
}
```