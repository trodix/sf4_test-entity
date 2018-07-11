<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180711083526 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tribu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pingouin ADD tribu_id INT NOT NULL');
        $this->addSql('ALTER TABLE pingouin ADD CONSTRAINT FK_E1FA53E73F27B732 FOREIGN KEY (tribu_id) REFERENCES tribu (id)');
        $this->addSql('CREATE INDEX IDX_E1FA53E73F27B732 ON pingouin (tribu_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pingouin DROP FOREIGN KEY FK_E1FA53E73F27B732');
        $this->addSql('DROP TABLE tribu');
        $this->addSql('DROP INDEX IDX_E1FA53E73F27B732 ON pingouin');
        $this->addSql('ALTER TABLE pingouin DROP tribu_id');
    }
}
