<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405130127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE base (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(20) NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, not_show TINYINT(1) NOT NULL, color VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, org_id INT DEFAULT NULL, sallary_org_id INT DEFAULT NULL, building_id INT DEFAULT NULL, contract_type_id INT DEFAULT NULL, unit_id INT DEFAULT NULL, archive_file_org_id INT DEFAULT NULL, unit_category_id INT DEFAULT NULL, first_name VARCHAR(40) NOT NULL, last_name VARCHAR(40) NOT NULL, national_code VARCHAR(10) NOT NULL, gender VARCHAR(5) DEFAULT NULL, father_name VARCHAR(40) DEFAULT NULL, id_no VARCHAR(10) DEFAULT NULL, place_of_birth VARCHAR(30) DEFAULT NULL, insurance_no VARCHAR(50) DEFAULT NULL, type_of_insurance VARCHAR(50) DEFAULT NULL, personnal_no VARCHAR(10) DEFAULT NULL, mobile1 VARCHAR(11) DEFAULT NULL, mobile2 VARCHAR(11) DEFAULT NULL, telephone_no VARCHAR(1) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, marital_status VARCHAR(7) DEFAULT NULL, postal_code VARCHAR(10) DEFAULT NULL, id_series VARCHAR(10) DEFAULT NULL, id_serial_no VARCHAR(10) DEFAULT NULL, soldier_status VARCHAR(10) DEFAULT NULL, degree_of_education VARCHAR(15) DEFAULT NULL, date_education DATETIME DEFAULT NULL, field_of_stady VARCHAR(50) DEFAULT NULL, marriage_date DATE DEFAULT NULL, home_address VARCHAR(255) DEFAULT NULL, image_file_name VARCHAR(100) DEFAULT NULL, account_no VARCHAR(15) DEFAULT NULL, bank_name VARCHAR(15) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, birth_date DATE DEFAULT NULL, INDEX IDX_5D9F75A1F4837C1B (org_id), INDEX IDX_5D9F75A120F583B4 (sallary_org_id), INDEX IDX_5D9F75A14D2A7E12 (building_id), INDEX IDX_5D9F75A1CD1DF15B (contract_type_id), INDEX IDX_5D9F75A1F8BD700D (unit_id), INDEX IDX_5D9F75A19C36DF85 (archive_file_org_id), INDEX IDX_5D9F75A18921F7C4 (unit_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, base_id INT DEFAULT NULL, base_date DATE NOT NULL, notice_no VARCHAR(20) NOT NULL, notice_date DATE NOT NULL, is_deleted TINYINT(1) NOT NULL, INDEX IDX_27BA704B8C03F15C (employee_id), INDEX IDX_27BA704B6967DF41 (base_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1F4837C1B FOREIGN KEY (org_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A120F583B4 FOREIGN KEY (sallary_org_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A14D2A7E12 FOREIGN KEY (building_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1CD1DF15B FOREIGN KEY (contract_type_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1F8BD700D FOREIGN KEY (unit_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A19C36DF85 FOREIGN KEY (archive_file_org_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A18921F7C4 FOREIGN KEY (unit_category_id) REFERENCES base (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704B6967DF41 FOREIGN KEY (base_id) REFERENCES base (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1F4837C1B');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A120F583B4');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A14D2A7E12');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1CD1DF15B');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1F8BD700D');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A19C36DF85');
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A18921F7C4');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B6967DF41');
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704B8C03F15C');
        $this->addSql('DROP TABLE base');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE history');
    }
}
