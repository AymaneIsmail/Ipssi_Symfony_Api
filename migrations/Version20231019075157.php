<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019075157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('

    CREATE PROCEDURE AfficherUtilisateurCommande(IN idCommande INT)
    BEGIN
SELECT utilisateur.nom, utilisateur.prenom, detail_commande.quantite, produit.nom_produit
FROM utilisateur
INNER JOIN commande ON utilisateur.id = commande.utilisateur_id
INNER JOIN detail_commande ON commande.id = detail_commande.commande_id
INNER JOIN produit ON detail_commande.produit_id = produit.id
WHERE commande.id = idCommande;
END ;
');
    }

    public function down(Schema $schema): void
    {
    }
}
