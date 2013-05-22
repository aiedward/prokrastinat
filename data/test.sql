INSERT INTO `User` (`id`, `email`, `username`, `vpisna_st`, `ime`, `priimek`, `password`, `datum_logina`, `enabled`, `confirmation`, `mesto`, `drzava`, `opis`, `splet`, `telefon`, `naslov`) VALUES
(1, 'admin@borkovic.com', 'admin', 'E000000', 'Admin', 'Borkovič', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:36:57', 1, NULL, NULL, NULL, 'To je neki dolgi opis, kao', NULL, NULL, 'To je cesta 9'),
(2, 'moderator@borkovic.com', 'moderator', 'E000001', 'Moderator', 'Borkovich', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:50:40', 1, NULL, NULL, 'Slovenija', NULL, NULL, '040932921', NULL),
(3, 'student@borkovic.com', 'student', 'E000002', 'Študent', 'Borkovichevich', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:49:25', 1, NULL, 'Maribor', NULL, NULL, 'www.kreten.si', NULL, NULL);
 
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
(14, 'datoteke_download'),
(15, 'deska_dodaj'),
(16, 'user_pregled');
 
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
(14, 3, 14),
(15, 2, 15),
(16, 2, 16);
 
INSERT INTO `rbac_user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

INSERT INTO `kategorija` (`id`, `ime`) VALUES
(1, 'Računalniška omrežja'),
(2, 'Podatkovne baze'),
(3, 'Uporabniški vmesniki'),
(4, 'Razvoj programskih sistemov'),
(5, 'Razvoj aplikacij za internet'),
(6, 'Logične strukture in sistemi'),
(7, 'Obdelava geometrijskih podatko'),
(8, 'Prevajalniki'),
(9, 'Metode umetne inteligence'),
(10, 'Sistemska administracija'),
(11, 'Namenska programska oprema'),
(12, 'Osnove računalniškega vida'),
(13, 'Računalniška grafika in animac'),
(14, 'Strojno učenje in iskanje nove'),
(15, 'Računalniška večpredstavnost'),
(16, 'Varnost in zaščita'),
(17, 'Integracijsko programiranje'),
(18, 'Načrtovanje računalniških sist'),
(19, 'Uvod v vgrajene sisteme'),
(20, 'Uvod v evolucijske algoritme'),
(21, 'Preizkušanje strojne in progra'),
(22, 'Vodenje, inovativnost in preno'),
(23, 'Praktično usposabljanje'),
(24, 'Diplomsko delo'),
(25, 'Matematika II'),
(26, 'Osnove statistike'),
(27, 'Podatkovne strukture'),
(28, 'Razvoj in gradnja informacijsk'),
(29, 'Angleščina - jezik stroke'),
(30, 'Osnove računalniških sistemov'),
(31, 'Programiranje I');