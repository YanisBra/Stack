<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208144018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, author_id_id INT DEFAULT NULL, question_id_id INT DEFAULT NULL, reponse LONGTEXT NOT NULL, score INT DEFAULT NULL, preferred TINYINT(1) DEFAULT NULL, publication_date DATETIME NOT NULL, link VARCHAR(255) DEFAULT NULL, INDEX IDX_DADD4A2569CCBE9A (author_id_id), INDEX IDX_DADD4A254FAF8F53 (question_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, author_id_id INT DEFAULT NULL, question_subject_id_id INT DEFAULT NULL, answer_subject_id_id INT DEFAULT NULL, comment LONGTEXT NOT NULL, INDEX IDX_9474526C69CCBE9A (author_id_id), INDEX IDX_9474526CF69695C8 (question_subject_id_id), INDEX IDX_9474526C20717AA4 (answer_subject_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT NOT NULL, registration_date DATETIME NOT NULL, biography LONGTEXT DEFAULT NULL, validated TINYINT(1) NOT NULL, reputation INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderator (id INT NOT NULL, domain VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderator_tag (moderator_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_48BE55ED0AFA354 (moderator_id), INDEX IDX_48BE55EBAD26311 (tag_id), PRIMARY KEY(moderator_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, author_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, question LONGTEXT NOT NULL, publication_date DATETIME NOT NULL, validated TINYINT(1) DEFAULT NULL, country VARCHAR(255) NOT NULL, views INT DEFAULT NULL, INDEX IDX_B6F7494E69CCBE9A (author_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_tag (question_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_339D56FB1E27F6BF (question_id), INDEX IDX_339D56FBBAD26311 (tag_id), PRIMARY KEY(question_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A2569CCBE9A FOREIGN KEY (author_id_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A254FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C69CCBE9A FOREIGN KEY (author_id_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF69695C8 FOREIGN KEY (question_subject_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C20717AA4 FOREIGN KEY (answer_subject_id_id) REFERENCES answer (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moderator ADD CONSTRAINT FK_6A30B268BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moderator_tag ADD CONSTRAINT FK_48BE55ED0AFA354 FOREIGN KEY (moderator_id) REFERENCES moderator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE moderator_tag ADD CONSTRAINT FK_48BE55EBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E69CCBE9A FOREIGN KEY (author_id_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE question_tag ADD CONSTRAINT FK_339D56FB1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_tag ADD CONSTRAINT FK_339D56FBBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A2569CCBE9A');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A254FAF8F53');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C69CCBE9A');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF69695C8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C20717AA4');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78BF396750');
        $this->addSql('ALTER TABLE moderator DROP FOREIGN KEY FK_6A30B268BF396750');
        $this->addSql('ALTER TABLE moderator_tag DROP FOREIGN KEY FK_48BE55ED0AFA354');
        $this->addSql('ALTER TABLE moderator_tag DROP FOREIGN KEY FK_48BE55EBAD26311');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E69CCBE9A');
        $this->addSql('ALTER TABLE question_tag DROP FOREIGN KEY FK_339D56FB1E27F6BF');
        $this->addSql('ALTER TABLE question_tag DROP FOREIGN KEY FK_339D56FBBAD26311');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE moderator');
        $this->addSql('DROP TABLE moderator_tag');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
