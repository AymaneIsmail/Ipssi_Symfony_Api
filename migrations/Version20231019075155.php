<?php
//
//declare(strict_types=1);
//
//namespace DoctrineMigrations;
//
//use Doctrine\DBAL\Schema\Schema;
//use Doctrine\Migrations\AbstractMigration;
//
///**
// * Auto-generated Migration: Please modify to your needs!
// */
//final class Version20231019075155 extends AbstractMigration
//{
//    public function getDescription(): string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema): void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA6462C4194');
//        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA64FD8F9C3');
//        $this->addSql('DROP INDEX IDX_98344FA6462C4194 ON detail_commande');
//        $this->addSql('DROP INDEX IDX_98344FA64FD8F9C3 ON detail_commande');
//        $this->addSql('ALTER TABLE detail_commande ADD produit_id INT DEFAULT NULL, ADD commande_id INT DEFAULT NULL, DROP produit_id_id, DROP commande_id_id');
//        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
//        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
//        $this->addSql('CREATE INDEX IDX_98344FA6F347EFB ON detail_commande (produit_id)');
//        $this->addSql('CREATE INDEX IDX_98344FA682EA2E54 ON detail_commande (commande_id)');
//        $this->addSql('ALTER TABLE produit CHANGE prix prix INT NOT NULL');
//    }
//
//    public function down(Schema $schema): void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA6F347EFB');
//        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA682EA2E54');
//        $this->addSql('DROP INDEX IDX_98344FA6F347EFB ON detail_commande');
//        $this->addSql('DROP INDEX IDX_98344FA682EA2E54 ON detail_commande');
//        $this->addSql('ALTER TABLE detail_commande ADD produit_id_id INT DEFAULT NULL, ADD commande_id_id INT DEFAULT NULL, DROP produit_id, DROP commande_id');
//        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA6462C4194 FOREIGN KEY (commande_id_id) REFERENCES commande (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
//        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA64FD8F9C3 FOREIGN KEY (produit_id_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
//        $this->addSql('CREATE INDEX IDX_98344FA6462C4194 ON detail_commande (commande_id_id)');
//        $this->addSql('CREATE INDEX IDX_98344FA64FD8F9C3 ON detail_commande (produit_id_id)');
//        $this->addSql('ALTER TABLE produit CHANGE prix prix DOUBLE PRECISION NOT NULL');
//    }
//}
