CREATE TABLE IF NOT EXISTS `Roles`
(
    `id`            int AUTO_INCREMENT not null,
    `name`          varchar(100)    not null unique,
    `description`   varchar(100)    default '',
    `is_active`     TINYINT(1)      default 1,
    `created`       timestamp default CURRENT_TIMESTAMP,
    `modified`      timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
)