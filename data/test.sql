INSERT INTO `User` (`id`, `email`, `username`, `vpisna_st`, `ime`, `priimek`, `password`, `datum_logina`, `enabled`, `confirmation`, `mesto`, `drzava`, `opis`, `splet`, `telefon`, `naslov`) VALUES
(1, 'abor@gmail.com', 'admin', 'E000000', 'Admin', 'Borkovič', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:36:57', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'abor@gmail.com', 'moderator', 'E000001', 'Moderator', 'Borkovič', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:50:40', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'abor@gmail.com', 'student', 'E000002', 'Študent', 'Borkovič', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:49:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
 
INSERT INTO `rbac_permission` (`id`, `name`) VALUES
(1, 'vprasanje_index'),
(2, 'vprasanje_pregled'),
(3, 'vprasanje_dodaj'),
(4, 'vprasanje_uredi'),
(5, 'vprasanje_brisi'),
(6, 'odgovor_dodaj'),
(7, 'user_uredi'),
(8, 'datoteke_index'),
(9, 'datoteke_view'),
(10, 'datoteke_add'),
(11, 'datoteke_edit'),
(12, 'datoteke_delete'),
(13, 'datoteke_myfiles'),
(14, 'datoteke_download');
 
INSERT INTO `rbac_role` (`id`, `parent_role_id`, `name`) VALUES
(1, NULL, 'admin'),
(2, 1, 'moderator'),
(3, 2, 'student'),
(4, 3, 'anonymous');
 
INSERT INTO `rbac_role_permission` (`id`, `role_id`, `permission_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 3, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 1, 7),
(8, 4, 8),
(9, 4, 9),
(10, 3, 10),
(11, 2, 11),
(12, 2, 12),
(13, 3, 13),
(14, 3, 14);
 
INSERT INTO `rbac_user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);
