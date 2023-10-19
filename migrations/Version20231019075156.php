<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Trigger extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

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

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
