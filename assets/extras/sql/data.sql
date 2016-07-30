-- Truncate

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE `user`;
TRUNCATE TABLE `user_type`;

SET FOREIGN_KEY_CHECKS = 1;

-- UserType

INSERT INTO `user_type` (`id`, `name`, `description`, `date_update`, `date_create`, `removed`) VALUES
(1, 'Administrador', 'Administrador do sistema.', NOW(), NOW(), 0);

INSERT INTO `user_type` (`id`, `name`, `description`, `date_update`, `date_create`, `removed`) VALUES
(2, 'Limitado', 'Limitado.', NOW(), NOW(), 0);

-- User

INSERT INTO `user` (`id`, `id_user_type`, `name`, `email`, `password`, `picture`, `guid`, `date_update`, `date_create`, `removed`, `id_user_modified`) VALUES
(1, 1, 'Diogo Cezar', 'diogo@diogocezar.com', 'e164acc304fdd72d6ed8bf8945b00d060adf94d9', 'uploads/users/diogo@diogocezar.com.jpg', NULL, NOW(), NOW(), 0, 1);

INSERT INTO `user` (`id`, `id_user_type`, `name`, `email`, `password`, `picture`, `guid`, `date_update`, `date_create`, `removed`, `id_user_modified`) VALUES
(2, 1, 'Guest', 'guest@diogocezar.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, NOW(), NOW(), 0, 1);

INSERT INTO `user` (`id`, `id_user_type`, `name`, `email`, `password`, `picture`, `guid`, `date_update`, `date_create`, `removed`, `id_user_modified`) VALUES
(3, 2, 'Limited', 'limited@diogocezar.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, NOW(), NOW(), 0, 1);

-- UserType Update

UPDATE `user_type` set `id_user_modified` = 1 where `id` = 1;
UPDATE `user_type` set `id_user_modified` = 1 where `id` = 2;