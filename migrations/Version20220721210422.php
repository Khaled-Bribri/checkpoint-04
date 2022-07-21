<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721210422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE camion (id INT AUTO_INCREMENT NOT NULL, camion_type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, km INT NOT NULL, INDEX IDX_5DD566ECF6DA2F9 (camion_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camion_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, reclamation_client_id INT DEFAULT NULL, camion_id INT DEFAULT NULL, commande_debut DATE NOT NULL, commande_fin DATE NOT NULL, status TINYINT(1) NOT NULL, INDEX IDX_6EEAA67D10DAFC83 (reclamation_client_id), INDEX IDX_6EEAA67D3A706D3 (camion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_service (commande_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_1726E87282EA2E54 (commande_id), INDEX IDX_1726E872ED5CA9E6 (service_id), PRIMARY KEY(commande_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, commentaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, camion_id INT DEFAULT NULL, date_arrivee DATE NOT NULL, date_depart DATE NOT NULL, observation VARCHAR(255) NOT NULL, INDEX IDX_D11814AB3A706D3 (camion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, reclamation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation_client (id INT AUTO_INCREMENT NOT NULL, reclamation_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_56FD64F12D6BA2D9 (reclamation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, service VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, url LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_commande (user_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_8E67427DA76ED395 (user_id), INDEX IDX_8E67427D82EA2E54 (commande_id), PRIMARY KEY(user_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_commentaire (user_id INT NOT NULL, commentaire_id INT NOT NULL, INDEX IDX_CEEBA129A76ED395 (user_id), INDEX IDX_CEEBA129BA9CD190 (commentaire_id), PRIMARY KEY(user_id, commentaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_reclamation_client (user_id INT NOT NULL, reclamation_client_id INT NOT NULL, INDEX IDX_FAB9820AA76ED395 (user_id), INDEX IDX_FAB9820A10DAFC83 (reclamation_client_id), PRIMARY KEY(user_id, reclamation_client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camion ADD CONSTRAINT FK_5DD566ECF6DA2F9 FOREIGN KEY (camion_type_id) REFERENCES camion_type (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D10DAFC83 FOREIGN KEY (reclamation_client_id) REFERENCES reclamation_client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D3A706D3 FOREIGN KEY (camion_id) REFERENCES camion (id)');
        $this->addSql('ALTER TABLE commande_service ADD CONSTRAINT FK_1726E87282EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_service ADD CONSTRAINT FK_1726E872ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB3A706D3 FOREIGN KEY (camion_id) REFERENCES camion (id)');
        $this->addSql('ALTER TABLE reclamation_client ADD CONSTRAINT FK_56FD64F12D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE user_commande ADD CONSTRAINT FK_8E67427DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_commande ADD CONSTRAINT FK_8E67427D82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_commentaire ADD CONSTRAINT FK_CEEBA129A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_commentaire ADD CONSTRAINT FK_CEEBA129BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reclamation_client ADD CONSTRAINT FK_FAB9820AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reclamation_client ADD CONSTRAINT FK_FAB9820A10DAFC83 FOREIGN KEY (reclamation_client_id) REFERENCES reclamation_client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D3A706D3');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB3A706D3');
        $this->addSql('ALTER TABLE camion DROP FOREIGN KEY FK_5DD566ECF6DA2F9');
        $this->addSql('ALTER TABLE commande_service DROP FOREIGN KEY FK_1726E87282EA2E54');
        $this->addSql('ALTER TABLE user_commande DROP FOREIGN KEY FK_8E67427D82EA2E54');
        $this->addSql('ALTER TABLE user_commentaire DROP FOREIGN KEY FK_CEEBA129BA9CD190');
        $this->addSql('ALTER TABLE reclamation_client DROP FOREIGN KEY FK_56FD64F12D6BA2D9');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D10DAFC83');
        $this->addSql('ALTER TABLE user_reclamation_client DROP FOREIGN KEY FK_FAB9820A10DAFC83');
        $this->addSql('ALTER TABLE commande_service DROP FOREIGN KEY FK_1726E872ED5CA9E6');
        $this->addSql('ALTER TABLE user_commande DROP FOREIGN KEY FK_8E67427DA76ED395');
        $this->addSql('ALTER TABLE user_commentaire DROP FOREIGN KEY FK_CEEBA129A76ED395');
        $this->addSql('ALTER TABLE user_reclamation_client DROP FOREIGN KEY FK_FAB9820AA76ED395');
        $this->addSql('DROP TABLE camion');
        $this->addSql('DROP TABLE camion_type');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_service');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reclamation_client');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_commande');
        $this->addSql('DROP TABLE user_commentaire');
        $this->addSql('DROP TABLE user_reclamation_client');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
