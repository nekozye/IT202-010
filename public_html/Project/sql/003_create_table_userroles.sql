create table if not exists `UserRoles`
(
    `id`    int auto_increment not null,
    `user_id` int,
    `role_id` int,
    `is_active` TINYINT(1) default 1,
    `created`   timestamp default CURRENT_TIMESTAMP,
    `modified`  timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`role_id`) REFERENCES Roles(`id`),
    UNIQUE KEY (`user_id`, `role_id`)
)