
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- translation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `translation`;

CREATE TABLE `translation`
(
    `code` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- book
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book`
(
    `name` VARCHAR(255) NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- chapter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `chapter`;

CREATE TABLE `chapter`
(
    `book_id` INTEGER NOT NULL,
    `number` INTEGER NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    INDEX `chapter_fi_23450f` (`book_id`),
    CONSTRAINT `chapter_fk_23450f`
        FOREIGN KEY (`book_id`)
        REFERENCES `book` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- verse
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `verse`;

CREATE TABLE `verse`
(
    `chapter_id` INTEGER NOT NULL,
    `number` INTEGER NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    INDEX `verse_fi_4d72c3` (`chapter_id`),
    CONSTRAINT `verse_fk_4d72c3`
        FOREIGN KEY (`chapter_id`)
        REFERENCES `chapter` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- translation_verse
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `translation_verse`;

CREATE TABLE `translation_verse`
(
    `text` VARCHAR(1000) NOT NULL,
    `translation_id` INTEGER NOT NULL,
    `verse_id` INTEGER NOT NULL,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    INDEX `translation_verse_fi_cec8a0` (`translation_id`),
    INDEX `translation_verse_fi_4d66e2` (`verse_id`),
    CONSTRAINT `translation_verse_fk_cec8a0`
        FOREIGN KEY (`translation_id`)
        REFERENCES `translation` (`id`),
    CONSTRAINT `translation_verse_fk_4d66e2`
        FOREIGN KEY (`verse_id`)
        REFERENCES `verse` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
