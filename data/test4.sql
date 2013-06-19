-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 19. jun 2013 ob 13.53
-- Različica strežnika: 5.5.27
-- Različica PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `boris`
--

-- --------------------------------------------------------

--
-- Struktura tabele `beseda`
--

CREATE TABLE IF NOT EXISTS `beseda` (
  `beseda` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `idf` decimal(10,6) NOT NULL,
  PRIMARY KEY (`beseda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `datoteka`
--

CREATE TABLE IF NOT EXISTS `datoteka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `kategorija_id` int(11) DEFAULT NULL,
  `imeDatoteke` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `randomImeDatoteke` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datum_uploada` datetime DEFAULT NULL,
  `st_prenosov` int(11) DEFAULT NULL,
  `st_ogledov` int(11) DEFAULT NULL,
  `velikost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_816E4490A76ED395` (`user_id`),
  KEY `IDX_816E44908051CF1F` (`kategorija_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `dodatnanovica`
--

CREATE TABLE IF NOT EXISTS `dodatnanovica` (
  `id` int(11) NOT NULL,
  `vir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `dodatnanovica`
--

INSERT INTO `dodatnanovica` (`id`, `vir`, `date`) VALUES
(36, 'http://www.studentske-novice.si/k4-na-poti-komercializacije/', 'maj 31, 2013'),
(37, 'http://www.studentske-novice.si/dobili-smo-prvake-univerze-v-mariboru/', 'maj 29, 2013'),
(38, 'http://www.studentske-novice.si/ekipna-nadvlada-tekmovalcev-fakultete-za-sport-na-nike-atletskem-mit', 'maj 28, 2013'),
(39, 'http://www.studentske-novice.si/otvoritev-letne-terase/', 'maj 27, 2013'),
(40, 'http://www.studentske-novice.si/za-konec-pa-presenecenje/', 'maj 27, 2013'),
(41, 'http://www.studentske-novice.si/koncal-se-je-ljubljana-stratup/', 'maj 27, 2013'),
(42, 'http://www.studentske-novice.si/jadranje-in-dalmatinski-kornati/', 'maj 27, 2013'),
(43, 'http://www.studentske-novice.si/jana-benedik-in-anze-leskovar-sta-zmagovalca-golfarna-turnirja-unive', 'maj 26, 2013'),
(44, 'http://www.studentske-novice.si/spet-doma-v-cirkusu/', 'maj 26, 2013'),
(45, 'http://www.studentske-novice.si/kaj-prinasa-reorganizacija-zavoda/', 'maj 25, 2013'),
(46, 'http://www.studentske-novice.si/zakljucek-majskih-v-companerosu/', 'maj 23, 2013'),
(47, 'http://www.studentske-novice.si/okrogla-miza-varnost-uporabnikov-na-druzbenih-omrezjih-v-evropski-un', 'maj 23, 2013'),
(48, 'http://www.studentske-novice.si/5v-electro-team-et/', 'maj 23, 2013'),
(49, 'http://www.studentske-novice.si/poslovil-se-je-19-teden-mladih/', 'maj 21, 2013'),
(50, 'http://www.studentske-novice.si/zf-in-fs-najboljsi-na-prvenstvu-univerze-v-ljubljani-v-odbojki-na-mi', 'maj 20, 2013'),
(51, 'http://www.studentske-novice.si/kdo-bo-na-polozaju-rektorja-najvecje-slovenske-univerze-nasledil-dr-', 'maj 19, 2013'),
(52, 'http://www.studentske-novice.si/novo-ozvocenje-nov-film-o-ambasadi-novi-valentino/', 'maj 19, 2013'),
(53, 'http://www.studentske-novice.si/sobotna-vrocica-rico-bernascon/', 'maj 19, 2013'),
(54, 'http://www.studentske-novice.si/uporabno-znanje-je-lahko-pridobljeno-na-zabaven-neformalen-nacin/', 'maj 18, 2013'),
(55, 'http://www.studentske-novice.si/navkljub-slabemu-vremenu-rekord-proge-na-kalvariji/', 'maj 18, 2013'),
(56, 'http://www.studentske-novice.si/modna-galerija-by-studio-oranz-dh-fashion/', 'maj 18, 2013'),
(57, 'http://www.studentske-novice.si/pimp-my-night-v-petek-zvecer-slike/', 'maj 15, 2013'),
(58, 'http://www.studentske-novice.si/cuker-afterwork-cetrtki-slike/', 'maj 11, 2013'),
(59, 'http://www.studentske-novice.si/aljaz-pegan-bilo-je-lepo-video/', 'maj 8, 2013');

-- --------------------------------------------------------

--
-- Struktura tabele `extremenovice`
--

CREATE TABLE IF NOT EXISTS `extremenovice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avtor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `povezava` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vsebina` varchar(15000) COLLATE utf8_unicode_ci NOT NULL,
  `kategorija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `kategorija`
--

CREATE TABLE IF NOT EXISTS `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1140 ;

--
-- Odloži podatke za tabelo `kategorija`
--

INSERT INTO `kategorija` (`id`, `ime`) VALUES
(1, 'Adaptivni sistemi'),
(2, 'Advanced internet technologies'),
(3, 'Aktuatorska tehnika'),
(4, 'Akustika'),
(5, 'Akustika in avdio tehnologija'),
(6, 'Algoritmi'),
(7, 'Algoritmi in podatkovne strukture'),
(8, 'Algoritmi po vzorih iz narave'),
(9, 'Algoritmi računalniške geometrije'),
(10, 'Algoritmi računalniške multimedije'),
(11, 'Algoritmi v računalniški praksi'),
(12, 'Alternativne tiskane oblike'),
(13, 'Analiza elektromagnetnih motenj v ees'),
(14, 'Analiza i'),
(15, 'Analiza ii'),
(16, 'Analiza iii'),
(17, 'Analiza in klasifikacija podatkov'),
(18, 'Analiza in razumevanje vzorcev'),
(19, 'Analiza in sinteza analognih vezij'),
(20, 'Analiza in snovanje tk omrežij**'),
(21, 'Analiza zmogljivosti računalniške opreme'),
(22, 'Angleščina – jezik stroke'),
(23, 'Angleščina – uvod v jezik stroke'),
(24, 'Angleški jezik'),
(25, 'Angleški jezik i'),
(26, 'Angleški jezik ii*'),
(27, 'Angleški jezik iii'),
(28, 'Antene in razširjanje valov'),
(29, 'Aplikacija optimizacijskih algoritmov v elektrotehniki'),
(30, 'Aplikacije računalniških algoritmov'),
(31, 'Aplikacijski strežniki'),
(32, 'Aplikativna elektromagnetika'),
(33, 'Arhitektura in organizacija računalnikov'),
(34, 'Arhitektura informacijskih sistemov'),
(35, 'Arhitektura interaktivnih medijskih vsebin'),
(36, 'Arhitektura računalnikov'),
(37, 'Arhitekture informacijskih sistemov'),
(38, 'Arhitekture is in vzorci'),
(39, 'Arhitekturni vzorci'),
(40, 'Avdio in video aplikacije v telekomunikacijah'),
(41, 'Avdio in video sistemi'),
(42, 'Avdio in video tehnologija'),
(43, 'Avtomatizac. v elektroenerg. sistemih'),
(44, 'Avtomatizacija ees'),
(45, 'Avtomatizacija industrijskih obratov'),
(46, 'Avtomatizacija procesnih obratov'),
(47, 'Avtomatizacija procesnih postopkov'),
(48, 'Avtomatizacija proizvodnih obratov'),
(49, 'Avtomatizacija proizvodnih postopkov'),
(50, 'Avtomatizacija v energetiki'),
(51, 'Avtomatsko učenje'),
(52, 'Baze podatkov in ekspertni sistemi'),
(53, 'Biološke regulacije: senzoričnomotorični dinamični sistemi'),
(54, 'Biomedical instrumentation'),
(55, 'Biometrika'),
(56, 'Brezžična omrežja'),
(57, 'Cad elektromagnetnih naprav'),
(58, 'Cad elektrotehniških naprav'),
(59, 'Cad elektrotehniških naprav - izbrana poglavja'),
(60, 'Cae sistemi'),
(61, 'Cae/cad praktikum'),
(62, 'Celovite informacijske rešitve'),
(63, 'Časovno-frekvenčna in časovno-merilna analiza signalnov in slik'),
(64, 'Daljinsko zaznavanje'),
(65, 'Diagnostični sistemi'),
(66, 'Dialoška načela javne komunikacije'),
(67, 'Diferencialne enačbe'),
(68, 'Digitalna obdelava signalov'),
(69, 'Digitalna obdelava signalov in slik'),
(70, 'Digitalna obdelava slike'),
(71, 'Digitalna tehnika'),
(72, 'Digitalna tehnika in globalne komunikacije'),
(73, 'Digitalne komunikacije'),
(74, 'Digitalne strukture'),
(75, 'Digitalne strukture in sistemi'),
(76, 'Digitalni filtri'),
(77, 'Digitalni radio in televizija'),
(78, 'Digitalni signalni krmilniki v avtomatiki'),
(79, 'Digitalni signalni procesorji'),
(80, 'Digitalni sistemi'),
(81, 'Digitalno procesiranje signalov'),
(82, 'Dinamične spletne rešitve'),
(83, 'Dinamika ees'),
(84, 'Dinamika in zaščita elektroenergetskih sistemov'),
(85, 'Dinamika sistemov'),
(86, 'Dinamika strojev'),
(87, 'Diplomsko delo'),
(88, 'Diskretna matematika'),
(89, 'Diskretne strukture'),
(90, 'Dokumentiranje'),
(91, 'Dokumentiranje in poročanje v informatiki'),
(92, 'Dokumentiranje z računalnikom'),
(93, 'Dostopnost in zaščita podatkov'),
(94, 'Dostopnost in zaščita podatkov**'),
(95, 'Ekonomija'),
(96, 'Ekonomija in management'),
(97, 'Ekonomija medijev'),
(98, 'Ekonomija medijev**'),
(99, 'Ekonomika podjetij'),
(100, 'Ekonomika podjetja'),
(101, 'Ekonomika poslov. ozd'),
(102, 'Ekonomika poslovanja'),
(103, 'Ekspertni sistemi'),
(104, 'Elektrarne'),
(105, 'Elektrarne ii'),
(106, 'Električne naprave v energetiki'),
(107, 'Električni in elektromehanski pretvorniki'),
(108, 'Električni pogoni'),
(109, 'Električni pogoni i'),
(110, 'Električni pogoni ii'),
(111, 'Električni stroji'),
(112, 'Elektrodinamika'),
(113, 'Elektrodinamika - izbrana poglavja'),
(114, 'Elektroenergetska omrežja'),
(115, 'Elektroenergetske naprave'),
(116, 'Elektroenergetske naprave in postroji'),
(117, 'Elektroenergetski sistemi'),
(118, 'Elektromagnetna skladnost v močnostni elektroniki'),
(119, 'Elektromagnetna združljivost'),
(120, 'Elektromagnetna združljivost v energetski elektroniki'),
(121, 'Elektromagnetno valovanje'),
(122, 'Elektromehanski pretvorniki'),
(123, 'Elektromotorski pogoni ii'),
(124, 'Elektronika'),
(125, 'Elektronika i'),
(126, 'Elektronika ii'),
(127, 'Elektronska komunikacijska vezja'),
(128, 'Elektronska vezja'),
(129, 'Elektronska vezja i'),
(130, 'Elektronska vezja ii'),
(131, 'Elektronski elementi'),
(132, 'Elektronski sestavi'),
(133, 'Elektronski sistemi v kmetijstvu'),
(134, 'Elektronsko poslovanje'),
(135, 'Elektrotehnični materiali'),
(136, 'Elektrotehnika'),
(137, 'Elektrotehniška optika'),
(138, 'Empirične raziskovalne metode'),
(139, 'Energetska elektronika'),
(140, 'Energetske pretvorbe in pogoni'),
(141, 'Energetski pretvorniki'),
(142, 'Energetski trg'),
(143, 'Epistemiologija novih medijev in tehnologij'),
(144, 'Ergonomija programske opreme'),
(145, 'Estetika'),
(146, 'Evolucijski algoritmi'),
(147, 'Evolucijsko programiranje'),
(148, 'Evolucijsko računanje'),
(149, 'Filozofija informacije'),
(150, 'Finančno upravljanje in vodenje podjetij ii'),
(151, 'Fizika'),
(152, 'Fizika i'),
(153, 'Fizika ii'),
(154, 'Fizikalne osnove polprevodnikov'),
(155, 'Formalne metode preverjanja pravilnosti sistemov**'),
(156, 'Formalne metode pri načrtovanju sistemov'),
(157, 'Formalne metode snovanja digitalnih sistemov'),
(158, 'Formalne metode v komunikacijah'),
(159, 'Formalne metode v programskem inženirstvu'),
(160, 'Formalne specifikacije sistemov'),
(161, 'Fotonika'),
(162, 'Fuzzy control'),
(163, 'Generativne metode'),
(164, 'Genetski algoritmi'),
(165, 'Geografski informacijski sistemi'),
(166, 'Geometrijsko modeliranje'),
(167, 'Geometrijsko modeliranje in virtualna okolja'),
(168, 'Gonila in prenosniki'),
(169, 'Gospodarjenje z energijo'),
(170, 'Gospodarsko pravo'),
(171, 'Govorne tehnologije'),
(172, 'Gradniki elektronskih sistemov'),
(173, 'Gradniki komunikacijskih sestavov'),
(174, 'Gradniki sistemov vodenja'),
(175, 'Gradniki telekomunikacijskih sestavov'),
(176, 'Gradnja informacijskih sistemov'),
(177, 'Grafična animacija'),
(178, 'Grafična komunikacija'),
(179, 'Grafični marketing'),
(180, 'Grafično načrtovanje za medije'),
(181, 'Grafično oblikovanje'),
(182, 'Haptični roboti in bilateralno teleoperiranje'),
(183, 'Heterogeni računalniški sistemi'),
(184, 'Hibridne metode strojnega učenja'),
(185, 'Hidroelektrarne'),
(186, 'Humatronika'),
(187, 'Identifikacija nelinearnih sistemov'),
(188, 'Identifikacija s pomočjo statistik višjih redov'),
(189, 'Identifikacije'),
(190, 'Implementacija programskih jezikov'),
(191, 'Implikacije informacijske družbe'),
(192, 'Individualno raziskovalno delo  2'),
(193, 'Individualno raziskovalno delo  4'),
(194, 'Individualno raziskovalno delo 1'),
(195, 'Individualno raziskovalno delo 2'),
(196, 'Individualno raziskovalno delo 3'),
(197, 'Individualno raziskovalno delo 4'),
(198, 'Industrijska avtomatizacija'),
(199, 'Industrijska elektronika'),
(200, 'Industrijska elektronika i'),
(201, 'Industrijska elektronika ii'),
(202, 'Industrijska krmilja'),
(203, 'Industrijska lokalna omrežja**'),
(204, 'Informacija, kodiranje in kriptografija'),
(205, 'Informacijska družba'),
(206, 'Informacijska omrežja in naprave'),
(207, 'Informacijska tehnika'),
(208, 'Informacijska tehnika in dokumentiranje'),
(209, 'Informacijska varnost'),
(210, 'Informacijski procesi in komuniciranje z uporabniki'),
(211, 'Informacijski sistemi'),
(212, 'Informacijski sistemi ii'),
(213, 'Informatika i'),
(214, 'Informatika ii'),
(215, 'Informatika in javna uprava'),
(216, 'Informatika in tehnologije komuniciranja'),
(217, 'Informatika v medijih'),
(218, 'Informatika v medijih i'),
(219, 'Informatika v medijih ii'),
(220, 'Informatika v medijih iii'),
(221, 'Informatika v medijih iv'),
(222, 'Informatizacija poslovnih procesov'),
(223, 'Inovacijski management'),
(224, 'Inovativne informacijske rešitve za medije'),
(225, 'Integracijsko programiranje'),
(226, 'Integrirana okolja za razvoj informacijskih sistemov'),
(227, 'Integrirana razvojna okolja in komuniciranje skupin'),
(228, 'Integrirana vezja'),
(229, 'Integrirana vezja*'),
(230, 'Integrirano upravljanje komunikacijskih omrežij'),
(231, 'Integrirano upravljanje omrežij in sistemov'),
(232, 'Inteligentna obdelava podatkov'),
(233, 'Inteligentna okolja in vseprisotne storitve'),
(234, 'Inteligentne informacijske rešitve'),
(235, 'Inteligentne regulacijske tehnike v mehatroniki'),
(236, 'Inteligentni sistemi'),
(237, 'Inteligentni sistemi v avtomatiki'),
(238, 'Interakcija človek-računalnik'),
(239, 'Interakcija človek-računalnik v industriji'),
(240, 'Interaktivne 3d vsebine za svetovni splet'),
(241, 'Internetne storitve v telekomunikacijah'),
(242, 'Internetne tehnologije'),
(243, 'Inženirstvo aplikacij'),
(244, 'Inženirstvo okolja'),
(245, 'Inženirstvo znanja za inteligentne sisteme'),
(246, 'Ird i'),
(247, 'Ird ii'),
(248, 'Ird iv'),
(249, 'Ird v'),
(250, 'Ird vi'),
(251, 'It platforme in arhitekture'),
(252, 'It storitve in pravna ureditev'),
(253, 'Izbirna predmeta za poletni semester'),
(254, 'Izbirna predmeta za zimski semester'),
(255, 'Izbirni matematični predmet'),
(256, 'Izbirni matematični predmet i'),
(257, 'Izbirni modul i'),
(258, 'Izbirni modul ii'),
(259, 'Izbirni netehnični predmet iz uni šp  i'),
(260, 'Izbirni netehniški predmet'),
(261, 'Izbirni netehniški predmet i'),
(262, 'Izbirni predmet'),
(263, 'Izbirni predmet  i'),
(264, 'Izbirni predmet 1'),
(265, 'Izbirni predmet 2'),
(266, 'Izbirni predmet 3'),
(267, 'Izbirni predmet 4'),
(268, 'Izbirni predmet epf i'),
(269, 'Izbirni predmet epf ii'),
(270, 'Izbirni predmet feri i'),
(271, 'Izbirni predmet feri ii'),
(272, 'Izbirni predmet feri iii'),
(273, 'Izbirni predmet i'),
(274, 'Izbirni predmet i iz nabora i'),
(275, 'Izbirni predmet i iz nabora ii'),
(276, 'Izbirni predmet ii'),
(277, 'Izbirni predmet ii iz nabora i'),
(278, 'Izbirni predmet ii iz nabora ii'),
(279, 'Izbirni predmet iii'),
(280, 'Izbirni predmet iv'),
(281, 'Izbirni predmet ix'),
(282, 'Izbirni predmet iz epf/feri'),
(283, 'Izbirni predmet iz feri'),
(284, 'Izbirni predmet iz feri/epf'),
(285, 'Izbirni predmet iz nabora ii'),
(286, 'Izbirni predmet smeri'),
(287, 'Izbirni predmet v'),
(288, 'Izbirni predmet vi'),
(289, 'Izbirni predmet vii'),
(290, 'Izbirni predmet viii'),
(291, 'Izbirni predmet x'),
(292, 'Izbirni predmet xi'),
(293, 'Izbirni predmet xii'),
(294, 'Izbirni predmet xiii'),
(295, 'Izbirni predmet xiv'),
(296, 'Izbirni predmet xv'),
(297, 'Izbirni predmeti'),
(298, 'Izbirni predmeti za poletni semester'),
(299, 'Izbirni predmeti za zimski semester'),
(300, 'Izbirni tuj strokovni jezik i'),
(301, 'Izbrana poglavja iz biometrike'),
(302, 'Izbrana poglavja iz brezžičnih komunikacij'),
(303, 'Izbrana poglavja iz digitalnega procesiranja signalov'),
(304, 'Izbrana poglavja iz digitalnih filtrov'),
(305, 'Izbrana poglavja iz domensko specifičnih jezikov'),
(306, 'Izbrana poglavja iz elektrotehnike'),
(307, 'Izbrana poglavja iz evolucijskega računanja'),
(308, 'Izbrana poglavja iz fizike'),
(309, 'Izbrana poglavja iz formalnih metod za porazdeljene sisteme'),
(310, 'Izbrana poglavja iz keramike'),
(311, 'Izbrana poglavja iz meritev v elektroniki'),
(312, 'Izbrana poglavja iz mikroračunalniških sistemov'),
(313, 'Izbrana poglavja iz mobilnih sistemov'),
(314, 'Izbrana poglavja iz modeliranja električnih strojev'),
(315, 'Izbrana poglavja iz multimedijskih sistemov'),
(316, 'Izbrana poglavja iz porazdeljenega procesiranja'),
(317, 'Izbrana poglavja iz računalniške obdelave signalov'),
(318, 'Izbrana poglavja iz simulacije vezij'),
(319, 'Izbrana poglavja iz storitveno in pomensko usmerjenega spleta'),
(320, 'Izbrana poglavja iz teorije razpoznavanja vzorcev'),
(321, 'Izbrana poglavja iz teorije sočasnosti'),
(322, 'Izbrana poglavja iz teorije vod. meh. sist.'),
(323, 'Izbrana poglavja iz varnosti in zaščite'),
(324, 'Izbrana poglavja nelinearnih regulacijskih sistemov'),
(325, 'Izbrani algoritmi'),
(326, 'Izbrani projektni predmet i'),
(327, 'Izbrani projektni predmet ii'),
(328, 'Izbrani projektni predmet iii'),
(329, 'Izbrani projektni predmet iv'),
(330, 'Izdelava in zagovor doktorske disertacije'),
(331, 'Izdelavne tehnologije'),
(332, 'Jezikovne tehnologije'),
(333, 'Kakovost podatkov'),
(334, 'Kakovost,  zanesljivost in preizkušanje'),
(335, 'Kakovost, zanesljivost in preizkušanje'),
(336, 'Katerikoli matematični predmet iz domačih ali tujih univerz'),
(337, 'Katerikoli netehniški predmet iz um ali  drugih univerz'),
(338, 'Katerikoli predmet iz domačih ali tujih univerz'),
(339, 'Katerikoli predmet iz um'),
(340, 'Katerikoli predmet iz un šp feri'),
(341, 'Katerikoli predmet iz un šp um'),
(342, 'Katerikoli predmet iz vs šp rit'),
(343, 'Katerikoli predmet iz vs šp um'),
(344, 'Katerikoli predmet uni iz programa e in rit'),
(345, 'Katerikoli predmet uni iz um'),
(346, 'Katerikoli predmet vs programa iz um'),
(347, 'Katerikoli predmet vs strokovnega programa iz um'),
(348, 'Kinematični sistemi vodenja robotov'),
(349, 'Kodiranje in prenos signalov, slik in videa'),
(350, 'Kognitivni sistemi'),
(351, 'Kombinatorična optimizacija'),
(352, 'Kompleksna analiza'),
(353, 'Komponente in sestavi'),
(354, 'Kompresija signalov'),
(355, 'Komuniciranje in delo v skupinah'),
(356, 'Komuniciranje, motiviranje in reševanje konfliktov'),
(357, 'Komunikacija človek računalnik v industrijskih procesih'),
(358, 'Komunikacija človek, računalnik'),
(359, 'Komunikacija človek, stroj'),
(360, 'Komunikacija človek-računalnik'),
(361, 'Komunikacija z naročniki in uporabniki'),
(362, 'Komunikacije v avtomatiki'),
(363, 'Komunikacijska integrirana vezja'),
(364, 'Komunikacijska kompetenca in medijska pismenost'),
(365, 'Komunikacijska kultura'),
(366, 'Komunikacijske in računalniške mreže'),
(367, 'Komunikološke raziskovalne metode'),
(368, 'Koncepti in modeli medijev v informacijski družbi'),
(369, 'Koncepti za modeliranje vizualnih informacij'),
(370, 'Konstruiranje z računalnikom'),
(371, 'Kontrola kakovosti in zanesljivost'),
(372, 'Konvergenca in integracija sistemov'),
(373, 'Konvergenca medijev'),
(374, 'Konvergenčne tehnologije in vsebine'),
(375, 'Konvergenčni medijski sistemi'),
(376, 'Kreativni pristop k računalniški animaciji'),
(377, 'Kriptografija'),
(378, 'Kritično mišlenje in izražanje'),
(379, 'Kritično mišljenje in izražanje'),
(380, 'Krmilna tehnika'),
(381, 'Krmilniki in mikroračunalniki'),
(382, 'Krmilno regulacijski sistemi'),
(383, 'Krmilno-regulacijski sistemi'),
(384, 'Kvaliteta programske opreme'),
(385, 'Kvantitativne metode odločanja v managementu'),
(386, 'Laboratory in statistics'),
(387, 'Linearna algebra'),
(388, 'Logične strukture in sistemi'),
(389, 'Magistrsko delo'),
(390, 'Management človeških virov'),
(391, 'Management odnosov s strankami'),
(392, 'Management programov in projektov'),
(393, 'Management storitev'),
(394, 'Matematične osnove vodenja sistemov'),
(395, 'Matematika'),
(396, 'Matematika i'),
(397, 'Matematika ii'),
(398, 'Matematika iii'),
(399, 'Matematika iv'),
(400, 'Matematika v računalništvu'),
(401, 'Materiali in tehnologije'),
(402, 'Materiali s posebnimi lastnostmi in pojavi'),
(403, 'Materiali v elektrotehniki'),
(404, 'Materiali v elektrotehniki - izbrana poglavja'),
(405, 'Matrična in funkcionalna analiza'),
(406, 'Mediji in demokracija'),
(407, 'Mediji in popularna kultura'),
(408, 'Mediji v družbi'),
(409, 'Mediji, državljanstvo in identiteta'),
(410, 'Medijska etika'),
(411, 'Medijska komunikologija'),
(412, 'Medijska komunikologija in odnosi z javnostmi'),
(413, 'Medijska politika in družba'),
(414, 'Medijske in programske zvrsti'),
(415, 'Medijsko pravo'),
(416, 'Medijsko pravo**'),
(417, 'Medkulturno komuniciranje'),
(418, 'Mednarodna ekonomika ii'),
(419, 'Mednarodno in medkulturno komuniciranje'),
(420, 'Medprocesorske komunikacije'),
(421, 'Mehanizmi'),
(422, 'Mehanski sistemi'),
(423, 'Mehatronika'),
(424, 'Mehki pristop razvoja sistemov'),
(425, 'Mehki regulacijski sistemi'),
(426, 'Mehki sistemi vodenja'),
(427, 'Mehko računanje pri nelinearnih regulacijah'),
(428, 'Merilni sistemi'),
(429, 'Meritve'),
(430, 'Meritve - praktikum'),
(431, 'Meritve v elektroniki'),
(432, 'Meritve v elektrotehniki'),
(433, 'Meritve v telekomunikacijah'),
(434, 'Metoda končnih in metoda robnih elementov v elektrotehniki'),
(435, 'Metode gradnje informacijskih sistemov'),
(436, 'Metode in orodja za formalno verifikacijo'),
(437, 'Metode in tehnologije komuniciranja'),
(438, 'Metode integracije informacijskih sistemov'),
(439, 'Metode komuniciranja'),
(440, 'Metode umetne inteligence'),
(441, 'Metode znanstveno raziskovalnega dela'),
(442, 'Metodi končnih in robnih elementov  v elektrotehniki'),
(443, 'Metodika konstruiranja'),
(444, 'Mikro in signalni procesorji'),
(445, 'Mikroekonomija in podjetniška ekonomika'),
(446, 'Mikroelektronika'),
(447, 'Mikrokrmilniki'),
(448, 'Mikroprocesorji'),
(449, 'Mikroprocesorski sistemi'),
(450, 'Mikroprocesorski sistemi i'),
(451, 'Mikroprocesorski sistemi ii'),
(452, 'Mikroračunalniki'),
(453, 'Mikroračunalniški sistemi'),
(454, 'Mikroračunalniški sistemi i'),
(455, 'Mikroračunalniški sistemi ii'),
(456, 'Množični mediji'),
(457, 'Mobilne komunikacije'),
(458, 'Mobilne telekomunikacije'),
(459, 'Mobilni in vseprisotni elektronski sistemi'),
(460, 'Mobilni roboti'),
(461, 'Mobilno in vseprisotno računalništvo'),
(462, 'Močnostna elektronika'),
(463, 'Močnostni ojačevalniki'),
(464, 'Modeli in odločitveni sistemi'),
(465, 'Modeliranje električnih strojev'),
(466, 'Modeliranje in animacija naravnih objektov'),
(467, 'Modeliranje in identifikacije'),
(468, 'Modeliranje in načrtovanje elektromehanskih sistemov'),
(469, 'Modeliranje in reševanje časovno odvisnih elektromagnetnih pojavov'),
(470, 'Modeliranje in simulacija'),
(471, 'Modeliranje in simulacija ees'),
(472, 'Modeliranje in simulacije'),
(473, 'Modeliranje in simulacije telekomunikacijskih sistemov'),
(474, 'Modeliranje in vodenje'),
(475, 'Modeliranje in vodenje elektromehanskih sistemov'),
(476, 'Modeliranje procesov'),
(477, 'Modeliranje v informacijskih sistemih**'),
(478, 'Mrežno usmerjeno računanje'),
(479, 'Multimedia'),
(480, 'Multimedia in navidezna resničnost'),
(481, 'Multimediji'),
(482, 'Multimedijski praktikum'),
(483, 'Multimedijski sistemi'),
(484, 'Multimedijsko omreženje'),
(485, 'Multimodalni komunikacijski vmesniki'),
(486, 'Multimodalni vmesniki'),
(487, 'Multiresolucijska analiza signalov'),
(488, 'Načrtovalski vzorci'),
(489, 'Načrtovanje analognih integriranih vezij'),
(490, 'Načrtovanje digitalnih sistemov z vhdl'),
(491, 'Načrtovanje elektromagnetnih naprav'),
(492, 'Načrtovanje elektronskih merilnih sistemov'),
(493, 'Načrtovanje elektronskih sistemov'),
(494, 'Načrtovanje in analiza algoritmov'),
(495, 'Načrtovanje in obratovanje (elektro)energetskih sistemov'),
(496, 'Načrtovanje in preverjanje sistemov'),
(497, 'Načrtovanje interakcije človek-stroj'),
(498, 'Načrtovanje mikroelektronskih vezij'),
(499, 'Načrtovanje modularnih električnih strojev'),
(500, 'Načrtovanje navitij električnih strojev'),
(501, 'Načrtovanje računalniških sistemov'),
(502, 'Načrtovanje strojne opreme vgrajenih sistemov'),
(503, 'Načrtovanje tiskanih vezij in elektromagnetna združljivost'),
(504, 'Načrtovanje zanesljivosti sistemov'),
(505, 'Načrtovanje, vodenje in trženje integriranih sistemov v nanoelektroniki'),
(506, 'Naključni signali in šum'),
(507, 'Namenska programska oprema'),
(508, 'Napajalni viri v elektroniki'),
(509, 'Napajalniki'),
(510, 'Naprave za transformacijo in prenos'),
(511, 'Napredna kriptografija'),
(512, 'Napredna obdelava signalov'),
(513, 'Napredna obdelava slik'),
(514, 'Napredne metode digitalnega procesiranja signalov, slik in videa'),
(515, 'Napredne metode razvoja telekomunikacijskih storitev'),
(516, 'Napredne metode za iskanje znanja'),
(517, 'Napredne raziskovalne metode v računalništvu'),
(518, 'Napredni algoritmi'),
(519, 'Napredni programirljivi elektronski sistemi'),
(520, 'Napredni regulacijski sistemi'),
(521, 'Napredno programiranje'),
(522, 'Nastopanje v medijih'),
(523, 'Navidezna resničnost'),
(524, 'Nelinearna dinamika in vodenje'),
(525, 'Nelinearna elektronika'),
(526, 'Nelinearna regulacija stikalnih usmernikov'),
(527, 'Nelinearne metode vodenja servosistemov'),
(528, 'Nelinearno procesiranje signalov'),
(529, 'Nemški jezik'),
(530, 'Nemški jezik i'),
(531, 'Nemški jezik ii*'),
(532, 'Nemški jezik iii'),
(533, 'Nevro, nano in kvantno računalništvo'),
(534, 'New media & society'),
(535, 'Normativni vidik informacijske družbe in elektronskih komunikacij'),
(536, 'Numerična analiza'),
(537, 'Numerična matematika'),
(538, 'Numerične metode'),
(539, 'Numerične metode v elektrotehniki'),
(540, 'Numerično modeliranje direktnih in inverznih problemov emp'),
(541, 'Obdelava eno in večdimenz. biomed. sig.'),
(542, 'Obdelava geometrijskih podatkov'),
(543, 'Obdelava procesnih signalov'),
(544, 'Obdelava signalov'),
(545, 'Obdelava signalov in slik'),
(546, 'Obdelava slik in govora'),
(547, 'Objektno in funkcijsko programiranje'),
(548, 'Oblikovanje interaktivnih navideznih svetov'),
(549, 'Oblikovanje vizualne komponente spleta'),
(550, 'Obnašanje kovin pri varjenju'),
(551, 'Obratovanje elektroenergetskih sistemov'),
(552, 'Obvladovanje elektronskih vsebin in komunikacij'),
(553, 'Obvladovanje kakovosti'),
(554, 'Obvladovanje procesov in kakovosti'),
(555, 'Obvladovanje procesov kakovosti'),
(556, 'Ocenitev nevarnosti in varnostne politike v informacijski zaščiti'),
(557, 'Od problema do programa'),
(558, 'Odločitveni modeli'),
(559, 'Odločitveni sistemi'),
(560, 'Odnosi z javnostmi'),
(561, 'Okolja za razvoj informacijskih sistemov'),
(562, 'Omrežja tcp/ip'),
(563, 'Operacijske raziskave'),
(564, 'Operacijski sistemi'),
(565, 'Operativno planiranje'),
(566, 'Optične komunikacije'),
(567, 'Optični senzorji'),
(568, 'Optimiranje izdelkov'),
(569, 'Optimizacija poslovnih procesov'),
(570, 'Optimizacija v elektroenergetiki'),
(571, 'Optimizacijske metode'),
(572, 'Optoelektronika'),
(573, 'Organizacija avdiovizualne produkcije'),
(574, 'Organizacija in arhitektura računalnikov'),
(575, 'Organizacija in management'),
(576, 'Organizacija in obdelava podatkov'),
(577, 'Organizacija in vodenje informacijskih obdelav'),
(578, 'Organizacija obdelave podatkov'),
(579, 'Organizacija televizijske produkcije'),
(580, 'Organizacijska teorija'),
(581, 'Organiziranje projektov'),
(582, 'Orodja za razvoj aplikacij'),
(583, 'Osnove algoritmov'),
(584, 'Osnove bioinformatike'),
(585, 'Osnove ekonomije'),
(586, 'Osnove ekonomske teorije'),
(587, 'Osnove elektronike'),
(588, 'Osnove elektrotehnike'),
(589, 'Osnove elektrotehnike i'),
(590, 'Osnove elektrotehnike ii'),
(591, 'Osnove financ'),
(592, 'Osnove fotografije'),
(593, 'Osnove geometrijskega modeliranja in računalniške grafike'),
(594, 'Osnove ikt'),
(595, 'Osnove informacijskih sistemov'),
(596, 'Osnove informacijskih sistemov in tehnologij komuniciranja'),
(597, 'Osnove inteligentnih sistemov'),
(598, 'Osnove jezikovnih tehnologij'),
(599, 'Osnove konfiguriranja omrežnih naprav'),
(600, 'Osnove marketinga'),
(601, 'Osnove mikroelektronike'),
(602, 'Osnove modeliranja in simulacije'),
(603, 'Osnove novinarstva*'),
(604, 'Osnove omrežnih tehnologij'),
(605, 'Osnove optoelektronike'),
(606, 'Osnove organizacije avdiovizualne produkcije'),
(607, 'Osnove organizacije in managementa'),
(608, 'Osnove organizacije in splošnega managementa'),
(609, 'Osnove procesne avtomatizacije'),
(610, 'Osnove programskega inženirstva'),
(611, 'Osnove programskega inženirstva                 '),
(612, 'Osnove računalniške arhitekture'),
(613, 'Osnove računalniškega vida'),
(614, 'Osnove računalniških sistemov'),
(615, 'Osnove računovodstva'),
(616, 'Osnove računovodstva z bilanciranjem'),
(617, 'Osnove regulacijske tehnike'),
(618, 'Osnove robotike'),
(619, 'Osnove sistemske programske opreme'),
(620, 'Osnove statistike'),
(621, 'Osnove svetovnega spleta'),
(622, 'Osnove telekomunikacij'),
(623, 'Osnove verjetnostnega računa in statist.'),
(624, 'Osnove vizualnega oblikovanja'),
(625, 'Paralelni procesi v računalniških sistemih'),
(626, 'Paralelni računalniki'),
(627, 'Paralelno procesiranje'),
(628, 'Periferne naprave in uporabniški vmesniki'),
(629, 'Personalizacija in tehnologije semantičnega spleta'),
(630, 'Pisanje za elektronske medije'),
(631, 'Platforme informacijskih sistemov'),
(632, 'Platforme informacijskih sistemov in komunikacijski nivoji'),
(633, 'Podatkovne baze'),
(634, 'Podatkovne baze i'),
(635, 'Podatkovne baze ii'),
(636, 'Podatkovne baze za medije'),
(637, 'Podatkovne in računalniške komunikacije'),
(638, 'Podatkovne komunikacije'),
(639, 'Podatkovne strukture'),
(640, 'Podatkovne strukture in algoritmi'),
(641, 'Podatkovno modeliranje in baze'),
(642, 'Podatkovno rudarjenje'),
(643, 'Podjetništvo'),
(644, 'Politika podjetja in strateški management'),
(645, 'Pomensko in storitveno usmerjeni splet'),
(646, 'Ponovna uporaba pri razvoju informacijskih sistemov'),
(647, 'Porazdeljena in računska inteligenca'),
(648, 'Porazdeljena umetna inteligenca'),
(649, 'Porazdeljeni merilni sistemi'),
(650, 'Porazdeljeni računalniški sistemi'),
(651, 'Porazdeljeni računalniški sistemi in masovni večprocesorski sistemi'),
(652, 'Porazdeljeno procesiranje'),
(653, 'Poročilo o individualnem raziskovalnem delu'),
(654, 'Portali in sistemi znanja'),
(655, 'Portalne tehnologije in upravljanje z znanjem'),
(656, 'Posebne elektromagnetne naprave'),
(657, 'Poslovna angleščina'),
(658, 'Poslovna inteligenca'),
(659, 'Poslovna nemščina'),
(660, 'Poslovni aplikacijski portali'),
(661, 'Poslovno pravo'),
(662, 'Poslovno računovodstvo'),
(663, 'Postopki hitrega načrtovanja vodenja izmeničnih pogonov v električnih in hibridnih vozilih'),
(664, 'Povezljivi sistemi in inteligentne storitve'),
(665, 'Praktično usposabljanje'),
(666, 'Praktikum'),
(667, 'Praktikum - grafika za medije'),
(668, 'Praktikum - pisanje za radio in televizijo'),
(669, 'Praktikum i'),
(670, 'Praktikum ii'),
(671, 'Praktikum iii'),
(672, 'Praktikum iz informatike'),
(673, 'Praktikum iz omrežnih tehnologij'),
(674, 'Praktikum iz programirljivih logičnih vezij'),
(675, 'Praktikum iz računalniške grafike in obdelave slik'),
(676, 'Praktikum iz senzorske tehnologije'),
(677, 'Praktikum matlab/simulink'),
(678, 'Praktikum v avtomatiki in robotiki'),
(679, 'Praktikum, grafično snovanje, oblikovanje in tiskane oblike'),
(680, 'Praktikum, radio in televizija'),
(681, 'Praktikum: grafično snovanje in oblikovanje i'),
(682, 'Praktikum: grafično snovanje in oblikovanje ii'),
(683, 'Praktikum: napredno grafično oblikovanje'),
(684, 'Praktikum: pisanje za elektronske medije'),
(685, 'Praktikum: produkcija za elektronske medije'),
(686, 'Praktikum: produkcija za medije'),
(687, 'Praktikum: spletni sistemi in vsebine'),
(688, 'Predmet i izbranega modula'),
(689, 'Predmet i izbranega modula (m4-m6)'),
(690, 'Predmet i izbranega projekta'),
(691, 'Predmet ii izbranega modula'),
(692, 'Predmet ii izbranega projekta'),
(693, 'Predmet iii izbranega modula'),
(694, 'Predmet iii izbranega modula (m4-m6)'),
(695, 'Predmet iii izbranega projekta'),
(696, 'Predmet iv izbranega modula'),
(697, 'Predmet iv izbranega modula (m4-m6)'),
(698, 'Predmet iv izbranega projekta'),
(699, 'Predmet v izbranega projekta'),
(700, 'Predmet vi izbranega projekta'),
(701, 'Predmet vii izbranega projekta'),
(702, 'Predmet viii izbranega projekta'),
(703, 'Prehodni pojavi v ees'),
(704, 'Prehodni pojavi v energetskih sistemih'),
(705, 'Preizkušanje električnih strojev'),
(706, 'Preizkušanje in zanesljivost'),
(707, 'Preizkušanje opreme'),
(708, 'Preizkušanje računalniške opreme'),
(709, 'Preizkušanje strojne in programske opreme'),
(710, 'Preklopne strukture in sistemi'),
(711, 'Premet ii izbranega modula (m4-m6)'),
(712, 'Prenos električne energije'),
(713, 'Prenos energije'),
(714, 'Prenos signalov'),
(715, 'Prenos signalov in podatkov'),
(716, 'Prenosni sistemi'),
(717, 'Preskušanje električne opreme'),
(718, 'Pretvarjanje in raba energije'),
(719, 'Pretvorniki za motorne pogone'),
(720, 'Prevajalniki'),
(721, 'Prevajanje programskih jezikov'),
(722, 'Prevzemi in združitve'),
(723, 'Pridobivanje informacij z inteligentnimi agenti'),
(724, 'Principi geografskih informacijskih sistemov'),
(725, 'Principi modeliranja in animacije naravnih objektov'),
(726, 'Principi modernih sistemov gis'),
(727, 'Principi operacijskih sistemov'),
(728, 'Principi porazdeljene in računske inteligence'),
(729, 'Principi programskih jezikov'),
(730, 'Principi računalniške geometrije'),
(731, 'Principi razvoja protokolnih skladov'),
(732, 'Principi učenja na daljavo'),
(733, 'Priprava grafičnih oblik'),
(734, 'Priprava medijskih vsebin'),
(735, 'Procesiranje govornih in slikovnih signalov'),
(736, 'Procesiranje naravnega jezika'),
(737, 'Procesiranje procesnih, slikovnih in video signalov'),
(738, 'Procesiranje procesnih,slikovnih in video signalov'),
(739, 'Procesiranje signalov'),
(740, 'Procesiranje signalov, slik in videa'),
(741, 'Procesiranje slikovnih in govornih signalov'),
(742, 'Procesna avtomatizacija'),
(743, 'Procesni sistemi vodenja'),
(744, 'Profesionalna etika'),
(745, 'Programiranje'),
(746, 'Programiranje i'),
(747, 'Programiranje ii'),
(748, 'Programiranje v matlabu'),
(749, 'Programiranje za elektrotehnike i'),
(750, 'Programiranje za elektrotehnike ii'),
(751, 'Programiranje za medije'),
(752, 'Programiranje za telekomunikacije i'),
(753, 'Programiranje za telekomunikacije ii'),
(754, 'Programska okolja za telekomunikacijske storitve'),
(755, 'Programska oprema tk sistemov'),
(756, 'Programska oprema v elektroenergetiki'),
(757, 'Programska oprema v telekomunikacijah'),
(758, 'Programske platforme za razvoj is'),
(759, 'Programske platforme za razvoj medijskih vsebin in virtualnih skupnosti'),
(760, 'Programski jeziki'),
(761, 'Programski vzorci'),
(762, 'Programsko inženirstvo'),
(763, 'Programsko inženirstvo za sisteme vodenja'),
(764, 'Proizvodne tehnologije'),
(765, 'Proizvodni informacijski sistemi'),
(766, 'Proizvodni sistemi'),
(767, 'Proizvodnja električne energije'),
(768, 'Proizvodnja električne energije in gospodarjenje'),
(769, 'Proizvodnja in razdeljevanje električne energije'),
(770, 'Projekt'),
(771, 'Projekt iz elektronike'),
(772, 'Projekt iz telekomunikacij'),
(773, 'Projekti in organizacija is'),
(774, 'Projektiranje električnih pogonov'),
(775, 'Projektiranje električnih strojev'),
(776, 'Projektiranje elektromagnetnih naprav'),
(777, 'Projektiranje z računalnikom'),
(778, 'Projektni management'),
(779, 'Projektni predmet i'),
(780, 'Projektni predmet ii'),
(781, 'Projektni predmet iii'),
(782, 'Projektni predmet iv'),
(783, 'Projektno usmerjen strateški management'),
(784, 'Prosto izbirni netehniški predmet'),
(785, 'Prosto izbirni predmet'),
(786, 'Prosto izbirni predmet i'),
(787, 'Prosto izbirni predmet ii'),
(788, 'Prosto izbirni predmet iz um i'),
(789, 'Prosto izbirni predmet iz um ii'),
(790, 'Protokoli v telekomunikacijah'),
(791, 'Psihologija vizualnih komunikacij'),
(792, 'Računalnik v elektroniki'),
(793, 'Računalniška animacija'),
(794, 'Računalniška animacija za medije'),
(795, 'Računalniška dinamika tekočin'),
(796, 'Računalniška geometrija'),
(797, 'Računalniška grafika'),
(798, 'Računalniška grafika in animacija'),
(799, 'Računalniška multimedia'),
(800, 'Računalniška multimedija'),
(801, 'Računalniška obdelava signalov in slik'),
(802, 'Računalniška obdelava slik'),
(803, 'Računalniška omrežja'),
(804, 'Računalniška periferija'),
(805, 'Računalniška periferija*'),
(806, 'Računalniška podpora kreativnosti'),
(807, 'Računalniška simulacija sistemov'),
(808, 'Računalniška večpredstavnost'),
(809, 'Računalniške arhitekture'),
(810, 'Računalniške komponente'),
(811, 'Računalniške komunikacije in mreže'),
(812, 'Računalniške komunikacije in omrežja'),
(813, 'Računalniški modeli objektov in procesov'),
(814, 'Računalniški sisemi in strukture'),
(815, 'Računalniški vid'),
(816, 'Računalniško modeliranje in načrtovanje naprav'),
(817, 'Računalniško načrtovanje vezij'),
(818, 'Računalniško podprta verifikacija'),
(819, 'Računalniško podprta verifikacja'),
(820, 'Računalniško podprti merilni sistemi'),
(821, 'Računalniško podprto delo in komuniciranje'),
(822, 'Računalniško vodenje procesov'),
(823, 'Računalniško vodenje tehnoloških procesov'),
(824, 'Računalništvo'),
(825, 'Računovodstvo za managerje'),
(826, 'Radijska produkcija'),
(827, 'Radijski programi'),
(828, 'Radio in radijski programi'),
(829, 'Razdeljevanje električne energije'),
(830, 'Raziskava marketinga'),
(831, 'Raziskave elektrotehniških materialov'),
(832, 'Razpoznavanje vzorcev'),
(833, 'Razpršena proizvodnja in oskrba z energijo'),
(834, 'Razsvetljava'),
(835, 'Razsvetljava in  instalacije'),
(836, 'Razvoj aplikacij'),
(837, 'Razvoj aplikacij za internet'),
(838, 'Razvoj in gradnja informacijskih sistemov'),
(839, 'Razvoj in implementacija računalniških iger'),
(840, 'Razvoj in uporaba komponent v javi'),
(841, 'Razvoj in uporaba samoučečih sistemov'),
(842, 'Razvoj in upravljanje programskih sistemov'),
(843, 'Razvoj in vzdrževanje elektroenergetskih sistemov'),
(844, 'Razvoj in vzdrževanje energetskih sist.'),
(845, 'Razvoj informacijskih rešitev in storitev'),
(846, 'Razvoj informacijskih sistemov'),
(847, 'Razvoj informacijskih storitev'),
(848, 'Razvoj inteligentnih komunikacijskih okolij'),
(849, 'Razvoj izdelkov'),
(850, 'Razvoj programske opreme'),
(851, 'Razvoj programskih sistemov'),
(852, 'Razvoj spletnih sistemov'),
(853, 'Razvoj vseprisotnih informacijskih rešitev'),
(854, 'Regulacije'),
(855, 'Regulacije i'),
(856, 'Regulacije ii'),
(857, 'Regulacije iii'),
(858, 'Regulacijska tehnika'),
(859, 'Regulacijska tehnika i'),
(860, 'Regulacijska tehnika ii'),
(861, 'Reševanje problemov s programiranjem'),
(862, 'Revidiranje informacijskih sistemov'),
(863, 'Režija'),
(864, 'Režija in realizacija'),
(865, 'Robotika i'),
(866, 'Robotika ii'),
(867, 'Robotizacija'),
(868, 'Robotski sistemi'),
(869, 'Robustni sistemi'),
(870, 'Rtv tehnologija'),
(871, 'Sdl-praktikum'),
(872, 'Segmentiranje slik s pomočjo šablon'),
(873, 'Seminar 1'),
(874, 'Seminar 2'),
(875, 'Seminar 3'),
(876, 'Seminar i'),
(877, 'Seminar ii'),
(878, 'Senzorji'),
(879, 'Senzorska tehnika i'),
(880, 'Senzorska tehnika ii'),
(881, 'Senzorski sistemi'),
(882, 'Servomotorji'),
(883, 'Servopogoni'),
(884, 'Servosistemi'),
(885, 'Servosistemi i'),
(886, 'Signali'),
(887, 'Signali in sistemi'),
(888, 'Signali in slike'),
(889, 'Signali smer elektronika'),
(890, 'Signali v merilni tehniki'),
(891, 'Signali v merilni tehniki smer avt., moč., meh.'),
(892, 'Simulacija električnih vezij'),
(893, 'Simulacija vezij'),
(894, 'Simulacije'),
(895, 'Simulacije in modeliranje'),
(896, 'Simulacije in operacijske raziskave'),
(897, 'Sistemi cad, cam'),
(898, 'Sistemi cad,cam,cim'),
(899, 'Sistemi cae/cim'),
(900, 'Sistemi cae/cim (s)'),
(901, 'Sistemi daljinskega vodenja'),
(902, 'Sistemi energijske elektronike'),
(903, 'Sistemi mehatronike'),
(904, 'Sistemi močnostne elektronike'),
(905, 'Sistemi odločanja'),
(906, 'Sistemi proizvodne informatike'),
(907, 'Sistemi realnega časa'),
(908, 'Sistemi s spremenljivo strukturo'),
(909, 'Sistemi v realnem času'),
(910, 'Sistemi vodenja kakovosti v informatiki'),
(911, 'Sistemi vodenja, navigacije in krmiljenje'),
(912, 'Sistemi za avtomatizacijo'),
(913, 'Sistemi za upravljanje delovnih aktivnosti'),
(914, 'Sistemi znanja'),
(915, 'Sistemska administracija'),
(916, 'Sistemska informacijska analiza'),
(917, 'Sistemska podpora ikt'),
(918, 'Sistemska programska oprema'),
(919, 'Skladiščenje podatkov in poročanje'),
(920, 'Sliding mode pri robotskih manipulacijah'),
(921, 'Slijepo razdvajanje signala i analiza nezavisnih komponenata'),
(922, 'Snovanje in uvajanje managementskih konceptov v prakso'),
(923, 'Snovanje računalniških in digitalnih sistemov'),
(924, 'Snovanje računalniških sistemov'),
(925, 'Snovanje sistemov vodenja'),
(926, 'Snovanje sodobnih vgrajenih sistemov'),
(927, 'Snovanje telekomunikacijskih storitev'),
(928, 'Snovanje tk programske opreme'),
(929, 'Snovanje tk storitev'),
(930, 'Socialno inženirstvo'),
(931, 'Sociološki in poklicni vidiki'),
(932, 'Socio-tehnološki sistemi'),
(933, 'Sodobna digitalna obdelava signalov'),
(934, 'Sodobna programska orodja'),
(935, 'Sodobne storitve v telekomunikacijah'),
(936, 'Sodobne tehnologije za elektronske medije'),
(937, 'Sodobni elektronski sklopi'),
(938, 'Sodobni sistemi daljinskega vodenja'),
(939, 'Sodobni sistemi vodenja'),
(940, 'Software engineering ii'),
(941, 'Specialne elektromagnetne naprave'),
(942, 'Specifikacija in simulacija protokolov'),
(943, 'Spletne tehnologije'),
(944, 'Spletne tehnologije in označevalni jeziki'),
(945, 'Spletno programiranje'),
(946, 'Spletno računalništvo'),
(947, 'Splošna energetika'),
(948, 'Splošna teorija električnih strojev'),
(949, 'Spoznavna teorija - metodologija in metodika raziskovanja'),
(950, 'Sprejemniki, antene in modulacije'),
(951, 'Stabilnost elektroenergetskih sistemov'),
(952, 'Standardi in kakovost is'),
(953, 'Standardizacija in zagotavljanje kakovosti'),
(954, 'Statistične metode'),
(955, 'Statistične metode pri razpoznavanju vzorcev'),
(956, 'Statistično procesiranje signalov'),
(957, 'Statistika'),
(958, 'Statistika in naključni procesi'),
(959, 'Statistika in zanesljivost'),
(960, 'Statistika z raziskovalnimi metodami'),
(961, 'Stereoskopski sistemi'),
(962, 'Stikalne naprave in aparati'),
(963, 'Stikalne naprave in visokonapetostni sistemi'),
(964, 'Storitve v mobilnih komunikacijah'),
(965, 'Storitvena znanost'),
(966, 'Storitvena znanost in inovacije'),
(967, 'Storitveno inženirstvo in storitvena znanost'),
(968, 'Storitveno usmerjene arhitekture'),
(969, 'Strategije vzdrževanja'),
(970, 'Strateški management človeških virov'),
(971, 'Strateški management dobavnih verig'),
(972, 'Strateški vidiki managementa e-poslovanja'),
(973, 'Strateško komuniciranje'),
(974, 'Strateško planiranje'),
(975, 'Strojni elementi'),
(976, 'Strojni vid'),
(977, 'Strojno učenje in iskanje novega znanja'),
(978, 'Strokovna angleščina'),
(979, 'Stroškovno računovodstvo'),
(980, 'Svetovanje pri nakupu in uporabi računalniških sistemov'),
(981, 'Širokopasovna omrežja in protokoli'),
(982, 'Športna vzgoja'),
(983, 'Tehnični in pravni normativi'),
(984, 'Tehnika visokih napetosti in velikih tokov'),
(985, 'Tehnike avdio in video produkcije'),
(986, 'Tehniška mehanika'),
(987, 'Tehnologija sporazumevanja'),
(988, 'Tehnologije razvoja inteligentnih rešitev'),
(989, 'Tehnologije sodelovanja'),
(990, 'Tehnologije v medijski produkciji'),
(991, 'Tehnologije za vseprisotne aplikacije'),
(992, 'Telekomunikacije'),
(993, 'Telekomunikacije in radiodifuzija'),
(994, 'Telekomunikacijska omrežja'),
(995, 'Telekomunikacijska omrežja i'),
(996, 'Telekomunikacijska omrežja ii'),
(997, 'Telekomunikacijska tehnika'),
(998, 'Telekomunikacijski komutacijski sistemi'),
(999, 'Telekomunikacijski sistemi'),
(1000, 'Telekomunikacijski sistemi in storitve'),
(1001, 'Telerobotika'),
(1002, 'Televizijska produkcija'),
(1003, 'Televizijski programi'),
(1004, 'Teoretska elektrotehnika'),
(1005, 'Teoretska elektrotehnika - izbrana poglavja'),
(1006, 'Teorija digitalnih medijev'),
(1007, 'Teorija električnih strojev'),
(1008, 'Teorija elektromagnetnega polja'),
(1009, 'Teorija elektromehanske pretvorbe'),
(1010, 'Teorija grafov'),
(1011, 'Teorija in zgodovina komuniciranja'),
(1012, 'Teorija informacij in kodiranje'),
(1013, 'Teorija informacijskih sistemov'),
(1014, 'Teorija informcijskih sistemov'),
(1015, 'Teorija is'),
(1016, 'Teorija medijev in množični mediji'),
(1017, 'Teorija občutljivosti in robustni sistemi'),
(1018, 'Teorija podjetništva - izbirni'),
(1019, 'Teorija programskih jezikov'),
(1020, 'Teorija regul. i'),
(1021, 'Teorija signalov'),
(1022, 'Teorija sistemov'),
(1023, 'Teorija sistemov*'),
(1024, 'Teorija vezij'),
(1025, 'Terminalska oprema'),
(1026, 'Termodinamika'),
(1027, 'Termoelektrarne'),
(1028, 'Testiranje in zanesljivost sistemov'),
(1029, 'Testiranje programske opreme'),
(1030, 'Tipografija in alternativne tiskane oblike'),
(1031, 'Tiskani mediji s praktikumom'),
(1032, 'Tuji jezik'),
(1033, 'Tuji jezik  ii'),
(1034, 'Tuji jezik 3'),
(1035, 'Tuji jezik i'),
(1036, 'Tuji jezik ii'),
(1037, 'Tuji jezik iii'),
(1038, 'Tuji jezik iv'),
(1039, 'Tv in video produkcija'),
(1040, 'Učinkovitost programskega inženirstva'),
(1041, 'Umetna inteligenca'),
(1042, 'Umetna inteligenca v elektroenergetiki'),
(1043, 'Umetnost in grafika'),
(1044, 'Umetnost in mediji'),
(1045, 'Uporaba električne energije'),
(1046, 'Uporaba multimedijskih komunikacij in storitev'),
(1047, 'Uporaba nevronskega omrežja v elektroenergetskem sistemu'),
(1048, 'Uporaba umetne inteligence v elektroenergetskem sistemu'),
(1049, 'Uporabniška programska oprema'),
(1050, 'Uporabniški vmesniki'),
(1051, 'Uporabniški vmesniki v telekomunikacijskih storitvah'),
(1052, 'Upravljanje ikt'),
(1053, 'Upravljanje in inteligentna omrežja**'),
(1054, 'Upravljanje in strateški management'),
(1055, 'Upravljanje informacij'),
(1056, 'Upravljanje informacijskih tehnologij in storitev'),
(1057, 'Upravljanje kakovosti storitev'),
(1058, 'Upravljanje medkulturnega prostora'),
(1059, 'Upravljanje omrežij**'),
(1060, 'Upravljanje poslovnih procesov'),
(1061, 'Upravljanje storitev**'),
(1062, 'Upravljanje tehnologij komuniciranja'),
(1063, 'Upravljanje zahtev'),
(1064, 'Uvod v analizo vezij'),
(1065, 'Uvod v evolucijske algoritme'),
(1066, 'Uvod v funkcionalno analizo'),
(1067, 'Uvod v komuniciranje'),
(1068, 'Uvod v množične medije'),
(1069, 'Uvod v operacijske sisteme'),
(1070, 'Uvod v računalniške sisteme'),
(1071, 'Uvod v računalniški vid in razpoznavanje vzorcev'),
(1072, 'Uvod v računalniško geometrijo'),
(1073, 'Uvod v računalništvo'),
(1074, 'Uvod v statistiko'),
(1075, 'Uvod v svetovni splet'),
(1076, 'Uvod v telekomunikacije'),
(1077, 'Uvod v vgrajene sisteme'),
(1078, 'Vakuumska metrologija'),
(1079, 'Vakuumske tehnologije'),
(1080, 'Varnost in zaščita'),
(1081, 'Varnost sistemov in kriptografija*'),
(1082, 'Varnost v telekomunikacijskih omrežjih'),
(1083, 'Varnostno kritični računalniški sistemi'),
(1084, 'Varovanje omrežnih naprav'),
(1085, 'Verifikacija in validacija programske opreme'),
(1086, 'Verifikacija in validacija sistemov'),
(1087, 'Verjetnost in statistika v družboslovju'),
(1088, 'Verjetnost in statistika v tehniki'),
(1089, 'Verjetnostni algoritmi'),
(1090, 'Verjetnostni račun in statistika'),
(1091, 'Verjetnostni račun in statistika*'),
(1092, 'Verjetnostni račun, statistika in naključni procesi'),
(1093, 'Veščine komuniciranja'),
(1094, 'Vezja in signali'),
(1095, 'Vgrajeni in vseprisotni računalniški sistemi'),
(1096, 'Vgrajeni sistemi'),
(1097, 'Virtualna instrumentacija'),
(1098, 'Virtualna orodja za urjenje'),
(1099, 'Visokofrekvenčna tehnika'),
(1100, 'Visokonapetostna tehnika'),
(1101, 'Vizualizacija bioloških procesov'),
(1102, 'Vizualna kultura'),
(1103, 'Vizualne komunikacije'),
(1104, 'Vizualni pomen, vizualna kultura in ideologija'),
(1105, 'Vizualno oblikovanje'),
(1106, 'Vlsi integracija elektronskih sistemov*'),
(1107, 'Vlsi integracija mikroelektronskih sistemov'),
(1108, 'Vmesniki in pretvorniki'),
(1109, 'Vodenje dinamičnih sistemov'),
(1110, 'Vodenje elektroenergetskih sistemov'),
(1111, 'Vodenje elektromehanskih sistemov'),
(1112, 'Vodenje in vrednotenje projektov razvoja e-vsebin in e-storitev'),
(1113, 'Vodenje izmeničnih pogonov v električnih in hibridnih vozilih'),
(1114, 'Vodenje mehatronskih naprav z uporabo mehke logike'),
(1115, 'Vodenje procesov v energetiki'),
(1116, 'Vodenje projektov'),
(1117, 'Vodenje projektov in projektno komuniciranje'),
(1118, 'Vodenje projektov informacijskih sistemov'),
(1119, 'Vodenje projektov is'),
(1120, 'Vodenje robotov po položaju in sili'),
(1121, 'Vodenje, inovativnost in prenos znanja'),
(1122, 'Vrednostna analiza'),
(1123, 'Vrednotenje računalniških sistemov'),
(1124, 'Vrednotenje telekomunikacijskih sistemov'),
(1125, 'Vrednotenje tk sistemov'),
(1126, 'Vsebine elektronskih medijev'),
(1127, 'Vseprisotni sistemi v medijih'),
(1128, 'Zagotavljane in upravljanje kakovosti'),
(1129, 'Zanesljivost informacijskih sistemov'),
(1130, 'Zanesljivost računalniških sistemov'),
(1131, 'Zaščita'),
(1132, 'Zaščita elektroenergetskih sistemov'),
(1133, 'Zaščita podatkov'),
(1134, 'Zaščita računalniških sistemov'),
(1135, 'Zaščita v ees'),
(1136, 'Zaščita v računalniških okoljih'),
(1137, 'Zaščitna tehnika in avtomatizacija'),
(1138, 'Zgodovina vizualnih komunikacij'),
(1139, 'Znanost, mišljenje in komunikacija');

-- --------------------------------------------------------

--
-- Struktura tabele `kategorija_user`
--

CREATE TABLE IF NOT EXISTS `kategorija_user` (
  `user_id` int(11) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`kategorija_id`),
  KEY `IDX_227F9131A76ED395` (`user_id`),
  KEY `IDX_227F91318051CF1F` (`kategorija_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `objava_id` int(11) DEFAULT NULL,
  `vsebina` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `datum_objave` datetime NOT NULL,
  `tip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3A09B17BA76ED395` (`user_id`),
  KEY `IDX_3A09B17B777BAB62` (`objava_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `komentar`
--

INSERT INTO `komentar` (`id`, `user_id`, `objava_id`, `vsebina`, `datum_objave`, `tip`) VALUES
(1, 2, 67, '<p>Zaženi to datoteko,....</p>', '2013-06-19 13:27:40', 'odgovor');

-- --------------------------------------------------------

--
-- Struktura tabele `mape`
--

CREATE TABLE IF NOT EXISTS `mape` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Odloži podatke za tabelo `mape`
--

INSERT INTO `mape` (`id`, `ime`, `pot`) VALUES
(1, 'Vsi', 'map/ALL.png'),
(2, 'A-klet', 'map/A.png'),
(3, 'B-prtlicje', 'map/B.png'),
(4, 'C-objekt', 'map/C.png'),
(5, 'D-1nadstropje', 'map/D.png'),
(6, 'E-prtlicje', 'map/E.png'),
(7, 'F-prtlicje', 'map/F.png'),
(8, 'F-1nadstropje', 'map/1F.png'),
(9, 'G1-1medetaza', 'map/G1-1M.png'),
(10, 'G1-1nadstropje', 'map/G1-1N.png'),
(11, 'G1-2medetaza', 'map/G1-2M.png'),
(12, 'G1-2nadstropje', 'map/G1-2N.png'),
(13, 'G1-klet', 'map/G1-K.png'),
(14, 'G1-mansarda', 'map/G1-Man.png'),
(15, 'G1-prtlicje', 'map/G1-P.png'),
(16, 'G2-1nadstropje', 'map/G2-1N.png'),
(17, 'G2-2nadstropje', 'map/G2-2N.png'),
(18, 'G2-3nadstropje', 'map/G2-3N.png'),
(19, 'G2-4nadstropje', 'map/G2-4N.png'),
(20, 'G2-medetaza', 'map/G2-M.png'),
(21, 'G2-prtlicje', 'map/G2-P.png');

-- --------------------------------------------------------

--
-- Struktura tabele `novica`
--

CREATE TABLE IF NOT EXISTS `novica` (
  `id` int(11) NOT NULL,
  `opis` varchar(301) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `novica`
--

INSERT INTO `novica` (`id`, `opis`) VALUES
(36, 'Klub K4 je že dobrih 24 let gojilnica ljubljanske alternative zato ne preseneča plaz kritik in obtožb, ki so se na novo vodstvo usule po napovedi njegovega zaprtja 15.3.2013.'),
(37, 'Dan, ko se študentje zabavamo na Lampiončkih, je tudi dan, ko ekipe tekmujejo za naslov medfakultetnega prvaka Univerze v Mariboru. '),
(38, 'Športna zveza univerze v Ljubljani je v vetrovnem ponedeljku, 27. 5. 2013, organizirala Nike atletski miting Univerze v Ljubljani, ki je potekal v Šiški na atletskemu stadionu ŽAK. '),
(39, 'Niti deževno vreme ni pokvarilo otvoritve velike letne terase kluba Plusminus.'),
(40, 'Zapomnite si že enkrat: najslajše pride na koncu in bistvo je pogosto očem skrito.'),
(41, 'Ta vikend (24. in 26. 5) je v Tehnološkem parku v Ljubljani potekal tridnevni dogodek Ljubljana Startup. Cilj dogodka je bil združiti mlade ambiciozne ljudi iz različnih področij, ki jim je podjetništvo blizu in v manj kot treh dneh iz osnovne ideje predstaviti produkt, ki bi lahko prestavljal začete'),
(42, 'Ko nas pobožajo prvi sončni žarki in se temperatura otrese zimske sramežljivosti, nam kaj hitro po glavah prične valovati morje. Večina Slovencev se po statistiki najprej ozre na sosednjo Hrvaško. Študenti seveda nismo izvzeti, le da okupiramo vsako leto iste tradicionalne &#8216;žurerske meke&#8217;'),
(43, 'Športna zveza Univerze v Ljubljani je v petek, 17. 5. 2013, v deževnemu vremenu na golfskem igrišču Trnovo organizirala Golfarna turnir Univerze v Ljubljani v golfu. '),
(44, 'Osrednje zbrališče zabave željnih nočnih ptičev v prestolnici je sinoči gostilo dogodek Ultra Countdown, edino podalpsko ogrevanje za največji regionalni elektronski spektakel vseh časov – festival Ultra Europe. '),
(45, 'Z letošnjim študijskem letom se je spremenilo vodstvo in upravljanje institucije, ki skrbi za stanovalce študentkih domov v Ljubljani. '),
(46, 'Letošnje majske igre so kljub dobremu programu dobile grenak priokus zaradi dežja.'),
(47, 'Kaj se dogaja z našimi osebnimi podatki, ki jih vnašamo v okviru udejstvovanja na različnih družbenih omrežjih ter jih nehote ali hote posredujemo v okviru drugih internetnih storitev, ter kako so ti podatki varovani?'),
(48, 'V petek 24. maja se je na Gospodarskem razstavišču odvijala doslej največja zabavo DeeJay Time Back in Time. V Zagreb se je poklicalo Boytronica, šefa skupine Electro Team alias ET, ki bo kot posebna gostja nastopila z vsemi svojimi velikimi plesnimi hiti, vključno z legendarnim &#8220;Tek je 12 sati'),
(49, '18. maja se je v Kranju odvil največji mladinski festival v Sloveniji – festival kulture, izobraževanja, mladinskega ustvarjanja, športa in sociale, ki ga je organiziral Klub študentov Kranj.'),
(50, 'V izredno lepem sončnem vremenu so se odbojkarji iz dvorane preselili na mivko in se pomerili na univerzitetnem prvenstvu v odbojki na mivki.'),
(51, 'Na rektorat Univerze v Ljubljani sta prispela dva predloga kandidature. Fakulteta za strojništvo je predlagala dr. Jožefa Duhovnika, Fakulteta za družbene vede pa dr. Ivana Svetlika. '),
(52, 'Sobotna noč v Ambasadi Gavioli je šla v anale kot še en nepozaben sladkorček za ljubitelje klubske kulture.'),
(53, 'Tokratna Plusminusova sobotna vročica se je pričela že ob 20.uri, s prenosom oddaje &#8216;M.S.N. dance radio show&#8217; v živo iz terase kluba na Radio Top 106,8.'),
(54, 'Po vsej Sloveniji je že drugič potekala akcija pod imenom »Noč – moč neformalnega«.'),
(55, '4. nočni tek na Kalvarijo se je zaključil z rekordom Kranjčana Matjaža Mikloša.'),
(56, 'V petek 17.5. so ljubitelji ekstravagantnih stylingov in odlične house glasbe definitivno prišli na svoje.'),
(57, 'V petek so v klubu Plusminus (Kolosej Maribor) odmevali Hip-Hop in R&#8217;n''B ritmi.'),
(58, 'V Kavarni Cuker (Kolosej Maribor) se je pričela nova sezona Cuker afterwork zabav.'),
(59, 'Z legendo slovenskega športa Aljažem Peganom smo se pogovorili o poti, ki jo je prehodil do danes.'),
(60, 'test'),
(61, 'test'),
(62, 'test'),
(63, 'test');

-- --------------------------------------------------------

--
-- Struktura tabele `objava`
--

CREATE TABLE IF NOT EXISTS `objava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `kategorija_id` int(11) DEFAULT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vsebina` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `datum_objave` datetime NOT NULL,
  `tip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F5CC01CFA76ED395` (`user_id`),
  KEY `IDX_F5CC01CF8051CF1F` (`kategorija_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Odloži podatke za tabelo `objava`
--

INSERT INTO `objava` (`id`, `user_id`, `kategorija_id`, `naslov`, `vsebina`, `datum_objave`, `tip`) VALUES
(36, 2, NULL, 'K4 na poti komercializacije?', '<strong>Začelo se je z zamenjavo vodstva.</strong><br/>Zamenjava vodstva <strong>Zavoda K6/4</strong>, katerega del je poleg <strong>Kiberpipe</strong>, kavarne <strong>Metropol</strong> in galerije <strong>Kapelica</strong> tudi klub<strong> K4</strong>, se je sicer začelo že lansko leto, ko je ljubljanski ŠOU prvič poskušal zamenjati direktorja, a mu to ni uspelo, saj nobeden izmed kandidatov ni pridobil zahtevane količine glasov sveta. Dokončno izvedeni drugi krog volitev se je zato zgodil marca letošnjega leta, ko je bil z večino za novega direktorja Zavoda izbran <strong>Aleš Logar</strong>. Kot novi direktor je na tem mestu zamenjal <strong>Miloša Krajnca</strong>.<br/>Po navedbah slednjega v odprtem pismu javnosti naj bi Logar po hitrem postopku s kadrovskim cunamijem na ključna mesta nove ekipe postavil svoje prijatelje. Navaja tudi, da naj bi bila večina vključena v študentsko organizacijo <strong>Povezani</strong>, ki naj bi bila tudi odgovorna za <strong>Logarjevo umestitev</strong> na direktorski stolček. Obtoženi navedbe zavrača.<br/><strong>Zaprtje K4</strong><br/>Novo vodstvo se je po umestitvi odločilo, da<strong> klub K4</strong> do nadaljnega zapre zaradi ugotovljenih nepravilnosti, nejasnosti v dosedanjem poslovanju in na novo ugotovljenem slabem finančnem stanju ter nepripravljenosti dosedanje ekipe na dogovor o sodelovanju. Tudi ob to se <strong>Krajnc</strong> v svojem pismu obregne, saj naj bi bil<strong> Logar</strong> v prvem razpisu za direktorja celo povabljen na pregled finančnega stanja, vendar je povabilo zavrnil. Prav tako je bil<strong> Zavod K6/4</strong> dolžan letno poročati ŠOU v Ljubljani trenutno stanje financ, zato nastali primanjkljaj, katerega je Logar ocenil na skorajda pol milijona evrov nikakor ne bi smel biti nov podatek. Če ne drugega je bivši direktor na ljubljanski ŠOU celo apeliral prošnjo za pomoč sanacije nastalega stanja, vendar mu potrebnega denarja niso odobrili. Ob nestrinjanju stare ekipe z že omenjenim kadrovskim cunamijem tako zaprtje kluba sploh ni presenetljivo.<br/><strong>Polemike okoli novega programa in ljudska iniciativa</strong><br/>Ljudska iniciativa se je še pred zaprtjem kluba organizirala in poleg peticije, katero je podpisalo čez 2000 ljudi organiziralo tudi 1. klubsko vstajo, na katero je prišlo okoli 150 ljudi. V peticiji so zapisali, da se zavzemajo za ohranitev kluba K4 kot prostora progresivne in neodvisne kulturne ter glasbene produkcije, ohranitev Zavoda K6/4 kot neprofitne, odprte, urbane platforme za vse vrste umetnosti, odstop novega vodstva Zavoda K6/4 in ustanovne ter vodstvene spremembe v delovanju Zavoda.<br/>Morda bi bilo vse pozabljeno a v tednih po zaprtju kluba je novo vodstvo predstavilo nov program za klub K4 in njemu sorodne projekte. Le teh programi se niso spremenili, klub K4 pa je doživel močan preskok v polkomercialno glasbo. To je privedlo do še večjega ogorčenja, ne samo s strani javnosti, temveč tudi s strani sodelujoči DJ ekip. Večina jih namreč ali ni bila pripravljena sodelovati zaradi novega programa in vizije ali pa k sodelovanju sploh niso bile povabljeni, kljub zagotovilom novega direktorja, da K4 ne bo postal novi Cirkus, saj je njegova vloga na alternativni kulturni sceni prevelika.<br/><strong>Sanacija nastalih razmer</strong><br/>Po besedah <strong>Logarja</strong> je naročena zunanja revizija Zavoda, prav tako se izvaja krizni management. <strong>Kavarna Metropol</strong> zaradi premajhnega profita ne bo več del <strong>Zavoda K6/4</strong> in naj bi se spremenila v t.i. študentsko menzo. Pogovori potekajo tudi o odprtju <strong>hotela </strong>na Kersnikovi 4, v katerega naj bi ŠOU vložil zajetnih <strong>500 tisočakov</strong>, obetal pa si <strong>letni promet</strong> v višini<strong> 80.000 evrov</strong>. ŠOU v Ljubljani je Zavodu <strong>odpisal 73.000 dolga</strong>, za kar jih je prosil že <strong>Krajnc</strong>, hkrati pa znižal najemnino za prostore do septembra letošnjega leta za 60%. Zavod naj bi ob vseh ukrepih in pomoči ŠOUa, ki mu je namenil <strong>50.000 evrov</strong> za sanacijo in <strong>110.000 evrov</strong> za redno dejavnost, preživel.<br/><strong>Kdo je kriv?</strong><br/>Vprašanje ostaja, kdo je torej krivec, ki je <strong>K4</strong> postavil na rob obstoja in s tem ogrozil tudi celotni, za njim stoječi Zavod. Nekateri, vključno s ŠOU, to pripisujejo nekomercializiranosti samega kluba, ki zaradi svoje alternativnosti pač privlači omejen krog obiskovalcev. <strong>Galerija Kapelica</strong> je namreč sposobna preživeti sama, <strong>Kiberpipa</strong> prav tako. Kot kaže naj bi se kultura zopet morala umakniti ekonomiji, ker to od nas pač zahteva čas. Vprašanje pa je, ali od nas zahteva čas tudi to, da je ljubljanski ŠOU namerno Zavodu skozi leta zmanjševala svojo pomoč, čeravno naj bi na letni bazi zagotovil vsaj stroške »hladnega pogona«. Med leti 2004 in 2007 naj bi se tako zmanjšalo financiranje Zavoda za 170.000 evrov, kavarni Metropol se je začela zaračunavati kom', '2013-06-19 13:19:27', 'dodatna_novica'),
(37, 2, NULL, 'Dobili smo prvake Univerze v Mariboru', 'Tokrat se je finalni turnir odvijal v dvorani UŠC. Že zjutraj so s tekmami pričeli igralci v posamičnih športih. Na turnirju v badmintonu je slavil <strong>Primož Makuc</strong>, ki je že na prvih dveh turnirjih osvojil prvo oziroma drugo mesto. Na drugo mesto se je uvrstil <strong>Mitja Verdnik</strong>, ki je osvojil drugi turnir, tretje mesto pa je presenetljivo zasedel <strong>Tadej Medved</strong>, ki se je le za las uvrstil v finale. Prvakinja v namiznem tenisu je zasluženo postala <strong>Manca Fajmut</strong>, ki je osvojila najvišje mesto tudi na obeh predfinalnih turnirjih. Drugo mesto je zasedla <strong>Staša Matis</strong>, ki je prav tako zasedla drugo mesto v obeh predtekmovalnih turnirjih. Borba za tretje mesto je bila bolj napeta, na koncu pa je <strong>Katarina Rebernjak</strong> pokazala najboljšo formo in premagala preostale tekmice. V moški konkurenci je na finalnem turnirju manjkal glavni favorit. Prvak Univerze je na koncu postal <strong>Mitja Verdnik</strong>, ki se prvega turnirja sploh ni udeležil, na drugem pa je zasedel 4. mesto. Drugi je bil <strong>David Peteršinek</strong>, ki je na obeh predturnirjih osvojil 2. mesto, tretje mesto pa je zasedel <strong>Anže Šimic</strong>, ki ni uspel ubraniti dveh drugih mest iz predtekmovalnih turnirjev.<br/>Naslednje so bile na vrsti tekme za 3. mesto v skupinskih športih. Igralke so se pomerile v odbojki, moški pa so se poleg odbojke borili še v košarki in nogometu. Tekmo za 3. mesto so prepričljivo osvojile odbojkarice Fakultete za gradbeništvo, ki so premagale študentke iz celjske Fakultete za logistiko. Tekma za tretje uvrščnega v moški konkurenci je bila bolj napeta, saj so se igralci Fakultete za kmetijstvo in biosistemske vede zelo približali ekipi Ekonomsko-poslovne fakultete, vendar jim na koncu ni uspelo zasesti stopničk v odbojkarski konkurenci. Tekma v košarki je minila brez večjih preobratov, z 10 točkami razlike so bili igralci EPF boljši od ekipe Fakultete za gradbeništvo. Na tekmi za 3. mesto v nogometu žoga kar ni hotela v gol. Šele po penalih so z 4:3 slavili igralci Fakultete za strojništvo proti ekipi EPF.<br/>Medfakulteteno prvenstvo UM se je zaključilo s finalnimi tekmami, kjer smo dobili prvake Univerze v Mariboru. Prvo finalno tekmo so odigrale odbojkarice Medicinske fakultete in Filozofske fakultete. Prepričljivo so slavile medicinke, ki so ugnale nasprotnice s 25:14 in 25:13. Odbojkarji Pedagoške fakultete so nastopili zelo suvereno in naslova prvaka jim ni mogla odvzeti niti ekipa Fakultete za gradbeništvo. Boljši so bili 2:0 v setih, kar pomeni, da so prvaki postali odbojkarji Pedagoške fakultete. Borba za košarkarskega prvaka je bilazelo napeta. Izenačena tekma med ekipama Fakultete za elektrotehniko, računalništvo in informatiko ter Fakultete za strojništvo je bila neodločena prav do zadnjega sodnikovega žvižga. Na koncu so bili za dve točki boljši strojniki. Zadnja tekma letošnjega finala je bila tekma med ekipama Fakultete za organizacijske vede in Fakultete za gradbeništvo. Prvi polčas še ni odločil o zmagovalcu, na koncu pa so slavili na FOV. Rezultat 2:1 jim je prinesel naslov pravka v malem nogometu.<br/>Vse tekme medfakultetenega prvenstva so pozorno spremljali tudi selektorji. Po nekaj težkih odločitvah so izbrali tekmovalce, ki bodo Univerzo v Mariboru 29. 5. v Kopru zastopali na Državnem univerzitetnem prvenstvu.<br/><strong>REZULTATI:</strong><br/><strong>Namizni tenis – ženske</strong><br/>1. Manca Fajmut<br/>2. Staša Matis<br/>3. Katarina Rebernak<br/><strong>Namizni tenis – moški</strong><br/>1. Mitja Verdnik<br/>2. David Peteršinek<br/>3. Anže Šimic<br/><strong>Badminton</strong><br/>1. Primož Maruc<br/>2. Mitja Verdnik<br/>3. Tadej Medved<br/><strong>Odbojka – ženske</strong><br/>1. Medicinska fakulteta<br/>2. Filozofska fakulteta<br/>3. Fakulteta za gradbeništvo<br/><strong>Odbojka &#8211; moški</strong><br/>1. Pedagoška fakulteta<br/>2. Fakulteta za gradbeništvo<br/>3. Ekonomsko-poslovna fakulteta<br/><strong>Košarka</strong><br/>1. Fakulteta za strojništvo<br/>2. Fakulteta za elektrotehniko, računalništvo in informatiko<br/>3. Ekonomsko-poslovna fakulteta<br/><strong>Nogomet</strong><br/>1. Fakulteta za organizacijske vede<br/>2. Fakulteta za gradbeništvo<br/>3. Fakulteta za strojništvo<br/>S.Š.<br/><span style="font-size: 10px;">foto: arhiv Zdrave zabave</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:28', 'dodatna_novica'),
(38, 2, NULL, 'Ekipna nadvlada tekmovalcev Fakultete za šport na Nike atletskem mitingu Univerze v Ljubljani', 'Glede na deževno obdobje, ki nas sicer spremlja, so tekmovalci imeli srečo z lepim vremenom. Nekaj sramežljivega sonca, predvsem pa veter, ki se je boril, kot da bi sam tekmoval. Tekmovalci so se morali dobro ogreti, saj je živemu srebru, na skoraj 20 Celzijevih, jugozahodnik prekrižal načrte. Kljub temu so nastopajoči naredili dobro atmosfero, predvsem pa dobre rezultate. V kraljici športa so letos ekipno kraljevali tekmovalci Fakultete za šport. Tesno ji je sledila Filozofska fakulteta. Izkazalo se je tudi ostalih 14 fakultet, ki so osvojile točke.<br/>Na klasični atletski disciplini (100m) je blestel <strong>Uroš Jovanovič</strong> (FKKT) z rezultatom 10´85, sledila sta mu <strong>Jernej Jeras</strong> iz MF (11´17) in <strong>Lenart Grkman</strong> FA (11´42). V nežnejšemu spolu je povedla <strong>Alja Sitar</strong> (FU), ki je premagala razdaljo v 12´13 s, za njo uvrščeni pa sta bili <strong>Laura Strajnar</strong> (MF; 13´23) in<strong> Urša Belaj</strong> iz FŠ (13´45).<br/>V teku na 400 metrov se je pomerilo največ tekmovalcev, in sicer v treh skupinah. Najboljši je bil <strong>Aljaž Požes</strong> (FKKT) z rezultatom 48´64, za njim sta se uvrstila <strong>Jan Breznikar</strong> (FFA; 49´78) in <strong>Krištof Knap</strong> (MF; 50´00). Dekleta so prav tako osvojila dobre rezultate in sicer prva <strong>Pina Gorišek</strong> (FF; 1:00´07), drugouvrščena <strong>Eva Kavka</strong> (BF; 1:00´54) in bronasta <strong>Eva Trpin</strong> (FF 1:06´34).<br/>Discipline 800 metrov so se pri moških udeležili sami »difovci«, med njimi pa je le <strong>Tadej Verbošt</strong> premagal magično mejo dveh minut, in sicer z rezultatom 1:59´46, na drugem mestu mu je sledil <strong>Mario Dugonik</strong> (2:00´51), na tretjem pa <strong>Peter Vitez</strong> (2:05´18). Med študentkami je osvojila zlato <strong>Eva Kavka</strong> (BF; 2:22´09), srebrna je bila <strong>Anja Robavs</strong> (FF; 2:23´69), brona se je pa veselila <strong>Breda Škedelj</strong> iz BF (2:29´33).<br/>Najvzdržljivejše discipline na tekmovanju, tek na 3000m, se je udeležilo 6 tekmovalcev. V času 9:47´48 je <strong>Maticu Plazniku</strong> (FS) uspelo premagati omenjeno razdaljo in se prebiti na prvo mesto. Tik za njim se je cilja veselil <strong>Luka Suhadolnik</strong> (NTF) z rezultatom 9:49´24, na tretje mesto je pa pritekel <strong>Boštjan Jenčič</strong> (FMF; 9:56´65). Prve tri tekmovalke so se izkazale z odličnim rezultatom, in sicer pod 11 minut. Prva je bila <strong>Tina Čačilo</strong> iz FFA (10:47´60), srebro je vzela <strong>Klara Ljubi</strong> iz EF, tretje mesto pa je zasedla <strong>Sara Jaklič</strong> (ZF) z rezultatom 10:53´12.<br/>Tekmovalke in tekmovalci so pomerili še v tehničnih disciplinah.<br/>Najvišje je skočila <strong>Maruša Novak</strong> (FU), in sicer 1´70 m, za njo je bila <strong>Maja Ana Strnad</strong> (FFA) s preskočenimi 1´55 m, tretjeuvrščena pa <strong>Maja Berčič</strong> (PeF; 1´25m).<br/>V daljino se je pognalo 5 študentk. Zlato si je privoščila <strong>Laura Strajnar</strong> (MF; 5´42m), srebro <strong>Urša Belaj</strong> iz FŠ (5´28), na odlično tretje mesto pa je skočila <strong>Neža Grkman</strong> iz MF (5´06m). Za skok v daljino se je od prijavljenih 5 opogumil le en tekmovalec, <strong>Gregor Podvršček</strong> iz EF in je skočil na prvo mesto s skokom, dolgim 5´19m.<br/>Suvanja krogle so se lotile štiri študentke. Povedla je <strong>Sitar Alja</strong> iz FU s kroglo, sunjeno čez 8 metrov (8´33m), sledila ji je <strong>Tjaša Fužir</strong> (FF; 7´80m), na tretjem mestu pa je moč pokazala tudi <strong>Ajda Pristavec</strong> iz FŠ (7´73m). Kroglo so sunili trije študentje, najdlje jo je pognal <strong>Marko Bone</strong> iz FŠ, in sicer 10´72, nekaj za njo je sledila krogla <strong>Jana Jereba</strong> iz FŠ (10´30m), na tretje mesto pa jo je sunil <strong>Krištof Knap</strong> iz MF (8´88m).<br/>Kot zadnja, a hkrati za mnoge najatraktivnejša disciplina, je nastopila štafeta 4 x 100 m. Najprej sta se pomerili dve ekipi pripadnikov moškega spola in sicer »računalničarji« (FRI) proti »kemikom« (FKKT). Slednji so slavili z rezultatom 46´29, zanje pa so tekli <strong>Uroš Jovanovič</strong>, <strong>Aljaž Požes</strong>, <strong>Luka Marlot</strong> in <strong>Aleksander Kranjc</strong>. V nasprotni ekipi so se borili Jan Jug, Žane Ban, Erik Torkli in Silvester Jakša ter dosegli čas 48´32. Nato je sledil nežnejši spol, v katerem sta za zlato tekli Fakulteta za šport in Filozofska fakulteta. Dekleta iz Aškrčeve so stale na najvišji stopnički z rezultatom 52´65, medtem ko so »difovke« na stopnički niže dobile srebro z doseženim časom 56´48.<br/>Velika pohvala za ponovno udeležbo na tekmovanju gre najzvestejšemu tekmovalcu, <strong>prof. Rastislavu Šušteršiču</strong>, iz Filozofske fakultete. Študentje, zgledujte se po njem!<br/>Nagrade za najboljše so prispevali: NIKE Slovenija, E-študentski servis, ŠOU v Ljubljani in Športna zveza Univerze v Ljubljani.<br/>M.R.<br/><span style="font-size: 10px;">fo', '2013-06-19 13:19:28', 'dodatna_novica'),
(39, 2, NULL, 'Otvoritev letne terase +-', 'Znani švicarski DJ in producent Mike Candys je na party lokacijo ob reki Dravi privabil množico ljudi ter jih s svojim setom pripeljal do ekstaze. Za vročo atmosfero so poskrbele tudi punce iz promo-teama kluba Plusminus ter simpatične hostese. Po prvem delu nastopa se je dogajanje iz terase preselilo v notranjost kluba, kjer so obiskovalci žurali na dveh plesiščih, do zgodnjih jutranjih ur.<br/>J.H.<br/><span style="font-size: 10px">foto: Sami Rahim</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:28', 'dodatna_novica'),
(40, 2, NULL, 'Za konec pa presenečenje&#8230;', 'Kar je obetalo rutinski zaključek doslej najuspešnejše Reloadove sezone, v kateri so Novo Gorico obiskali Paco Osuna, Len Faki, Joseph Capriati, Eric Sneo, Luigi Madonna, Gary Beck, Dave Clarke, Dubfire, Siniša Tamamović in za veliko piko na i še Marko Nastić, se je na koncu izteklo v epski podalšek v nedeljsko popoldne, na katerem se je za mikseto še enkrat nenajavljeno znašel Joseph Capriati. Da so afterji eden najboljših delov Reloadovih žurov, smo se že navadili, da bo tokratni že zaradi zgodovinskega datuma izjemen, je bilo tudi obljubljeno, tale češnja na vrhu torte pa je bila darilo ekipe vsem žurerjem, ki se vozite na mesečna druženja ob izbranem tehnu ob naši zahodni meji. Hvala za vse preplesane noči v naši družbi in se vidimo spet jeseni.<br/>G.Z.<br/><span style="font-size: 10px;">foto: Bojan Pipalovič</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(41, 2, NULL, 'Končal se je Ljubljana Startup', 'V petek so udeleženci (68) izmed 27ih izbrali <strong>10 najboljših poslovnih idej</strong>, nato pa so se formirale ekipe z različnimi komplementarnimi znanji, potrebnimi za realizacijo le teh. Sledil je deloven vikend, kjer so ekipam na pomoč pri reševanju težav in zagat priskočili tudi mentorji,<strong> Andraž Logar</strong> iz podjetja ThirdFrameStudios (3fs),<strong> Rok Stritar</strong> z Ekonomske fakultete (EF) in podjetja Kibuba ter<strong> Blaž Zupan</strong>, iz EF iz podjetja Optiprint.<br/>Po intenzivne delovnem vikendu je v nedeljo sledila predstavitev poslovnih idej (t.i. »<em>elevator pitch</em>«) pred zbrano komisijo. Predstavljeno so bile raznovrstne inovativne ideje od različnih prototipov mobilnih aplikacij, spletnih storitev do praktičnih fizičnih produktov. Zbrana komisija (<strong>Aleš Pustovrh</strong> iz CoBIK-a, <strong>Kristjan Pečanac</strong> iz startup šole Hekovnik, <strong>Aleš Vahčič</strong> iz Ekonomske fakultete v Ljubljani, direktor Tehnološkega Parka Ljubljana <strong>Iztok Lesjak</strong> ter predstavnik podjetja RSG Capital <strong>David Božič</strong>) je zato imela težko nalogo, a na koncu le izbrala <strong>zmagavolca</strong>.<br/>Za zmagovalno ekipo startup vikenda je bila izbrana ekipa »<strong>Colormix</strong>«, ki je ustvarila prototip izdelka<strong> ColorCocktail</strong> (izdelek uporaben v frizerskih salonih pri mešanju barve). Podeljena pa je bila tudi <strong>posebna nagrada</strong> s strani <strong>Hekovnika</strong> in sicer možnost udeležbe na njihovi startup šoli. To nagrado je prejela ekipa<strong> T-ask</strong>, ki je s pomočjo mobilne aplikacije razvila nov način komuniciranja na poslovnih konferencah, fakultetah ipd.<br/>Vse ekipe so preživele zelo zanimiv vikend in se strinjajo, da je takšen dogodek zelo zanimiva in poučna izkušnja. Zato vsi skupaj z organizatorji pozivajo, da se <strong>Ljubljana Startupa</strong> naslednje leto udeležiš tudi<strong> TI!</strong><br/>M.O<br/><span style="font-size: 10px">Foto: Dejan Žerdin</span><br/>FOTO GALERIJA:<br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(42, 2, NULL, 'Jadranje in dalmatinski Kornati', 'Ob prvi misli na jadranje nas je večina skomignila z rameni in si rekla, da za kaj takega študenti pač nimamo denarja. Vendar če se za trenutek zamislimo, koliko denarja se pretopi v pijače po klubih, v hrano iz marketov ali celo restavracij in nenazadnje v apartmaje, katerih cena je v sezoni prav smešno &#8216;zatečena&#8217;, ugotovimo, da smo poleti &#8216;radi&#8217; zapravljivi. Jadranje na drugi strani lahko predstavlja zelo poceni obliko užitkarjenja na morju.Vse več je organizatorjev jadranja, ki vam splanirajo ugodno plovbo.<strong> Cene</strong> so zelo različne, odvisno je predvsem od termina (spomladi in jeseni je jadranje ugodnejše, vreme pa v Dalmaciji nič slabše od poletnega). Jadrnico s skiperjem se da najeti tudi že za<strong> cca. 200 evrov</strong> po osebi čez cel vikend (tu pa tam za isto ceno tudi cel teden), v ceno pa je vključena še jedača in pijača, kolikor vam srce poželi. Ključ do uspeha je <strong>zgodnja rezervacija</strong>.<br/>Zdaj, ko smo ugotovili, da je lahko jadranje<strong> dostopno tudi študentski populaciji</strong>, pa se prepustimo vsem pozitivnim doživetjem, ki jih zagotavljajo razpeta jadra. Sama sem se odpravila na valove v odlični ekipi, kjer je bil moj največji problem loviti sapo zaradi prekomernega smeha, ki me je kronično grabil celotno potovanje. Našo &#8216;ekspedicijo&#8217; smo pričeli v <strong>marini</strong> <strong>Biograda na Moru</strong> od koder smo zajadrali proti slovitim dalmatinskim<strong> Kornatom</strong>. Tukaj je morje pravljično, barve variirajo od smaragdno zelene pa do safirno modre. Tisto kar je posebej privlačno pri jadranju pa je<strong> adrenalin</strong>. Zategovanje vrvi, vrtenje…hm…jadralske terminologije pa še nisem popolnoma zapopadla. Kakor koli kakšna močna moška roka je še kako zaželjena na jadrnici, saj plovba na jadra zahteva vso posadko v pripravljenosti, s tem pa ji vdahne tudi čar in razgibanost. Glavni nevarnosti na jadranju sta<strong> boom</strong>, ki se premakne ob menjavi strani jader in pa lastna nerodnost, saj se človek (podkrepljen še s kakšnim promilom preveč) kaj hitro lahko prekopicne v morje. No, poleti to drugo pravzaprav ni takšna nevarnost, če pa vreme ponagaja in se morje jezno razburka pa vseeno dobro objemite kar koli kar vas bo zadržalo na palubi. Pot smo nadaljevali na otok <strong>Murter</strong>, famozen po svojih divjih zabavah in po &#8216;prespani&#8217; noči odvihrali na <strong>otok Žut</strong>. Tam so nas čakali <strong>gurmanski užitki</strong>, ki jih lahko ponudi le prava <strong>domača konoba</strong>, od sveže ulovljenih rib, do jagnjetine izpod peke, le vegetarijanci bi se obrisli pod nosom, priznam. Da pa vse skupaj naredimo že naravnost kičasto, pa v to popolno sliko moramo postaviti še<strong> delfine</strong>. Ti so skakali in se igrali okoli naše Azre (kot je bilo ime jadrnici) na poti v pristan. Nekoliko žalostni, ker je bilo vsega že konec, a vseeno vidno utrujeni, smo se odmajali domov. Za spomin pa so se tla majala še kakšen dan <img src=''http://www.studentske-novice.si/wp-includes/images/smilies/icon_smile.gif'' alt="icon smile Jadranje in dalmatinski Kornati" class=''wp-smiley'' title="Jadranje in dalmatinski Kornati"> <br/>Jadranje je hedonizem v svoji najčistejši obliki, pika.<br/>M.G.<br/><span style="font-size: 10px;">Foto: Manja Gatalo</span><br/>FOTO GALERIJA:<br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(43, 2, NULL, 'Jana Benedik in Anže Leskovar sta zmagovalca golfarna turnirja Univerze v Ljubljani', 'Tekmovanja so se udeležili študentje in profesorji Univerze v Ljubljani. Vremenska napoved za ta dan je bila slaba, vendarle pa to izkušenih golfistov ni odvrnilo od navdušenja nad igro in zagretostjo za dobrimi rezultati. Na eni izmed 18 lukenj je prav vsakega od njih ujelo nekaj dežnih kapelj, kljub temu pa so ob koncu vsi pokazali veliko mero dobre volje in pozdravili idejo o organizaciji tovrstnega turnirja tudi v prihodnje. Z obiskom sta turnir počastila tudi predsednik Športne zveze Univerze v Ljubljani, <strong>dr. Milan Žvan</strong>, in podpredsednik ŠZUL, <strong>dr. Otmar Kugovnik</strong>.<br/>Sicer pa je na tekmovanju nastopilo polovica študentov in polovica zaposlenih, kar je svojevrstna posebnost v vrsti tekmovanj, ki jih organizira Športna zveza UL. Ekipna zmaga je vendarle šla fakulteti, ki so jo zastopali le študentje, in sicer Fakulteti za strojništvo.<br/>Bruto zmagovalka tekmovanja je bila <strong>Jana Benedik</strong>, študentka Ekonomske fakultete, bruto zmagovalec pa <strong>Anže Leskovar</strong> iz Fakultete za strojništvo. Podelili so še nagrade za najboljše tri neto uvrstitve v kategoriji študentje in zaposleni (1. mesto <strong>Vid Selič</strong> (FS) 2. mesto <strong>Anže Leskovar</strong> (FS) 3. mesto <strong>Ciril Ribičič</strong> (PF). Posebni nagradi so namenili tudi gostoma turnirja, <strong>Mojci Braz</strong> iz Fakultete za komercialne in poslovne vede in <strong>Anteju Madjaru</strong>, članu Akademskega golf kluba, ki je tudi sicer članica ŠZUL.<br/><strong>Rezultati BRUTO:</strong><br/>1. Anže Leskovar FS  33 38 7,7 (-0,4)<br/>2. Vid Selič FS 30 40 11,1 (-1,1)<br/>3. Ante Madjar 22 29 10,9 (+0,1)<br/>4. Gregor Novak EF 22 27 9,3 (+0,1)<br/>5. Borut Pistotnik FŠ 11 25 25,4 (+0,1)<br/>6.Ciril Ribičič PF 11 30 24,3 (+0,1)<br/>7.Ljubo Lah FA 10 29 36,0 (0)<br/>8. Jana Benedik EF 10 19 17,9 (+0,1)<br/>9. Mojca Braz 8 27 30,3 (+0,2)<br/>10. Igor Bartenjev MF 7 21 23,5 (+0,1)<br/>11. Andrej Umek FGG 4 19 33,0 (+0,2)<br/>12. Žiga Avsec FMF DSQ DSQ 0,7 (+0,2)<br/><strong>Rezultati NETO:</strong><br/> 1. Vid Selič FS 30 40 11,1 (-1,1)<br/> 2. Anže Leskovar FS 33 38 7,7 (-0,4)<br/> 3. Ciril Ribičič PF 11 30 24,3 (+0,1)<br/> 4. Ante Madjar 22 29 10,9 (+0,1)<br/> 5. Ljubo Lah FA 10 29 36,0 (0)<br/> 6. Gregor Novak EF 22 27 9,3 (+0,1)<br/> 7. Mojca Braz 8 27 30,3 (+0,2)<br/> 8. Borut Pistotnik FŠ 11 25 25,4 (+0,1)<br/> 9. Igor Bartenjev MF 7 21 23,5 (+0,1)<br/> 10. Jana benedik EF 10 19 17,9 (+0,1)<br/> 11. Andrej Umek FGG 4 19 33,0 (+0,2)<br/> 12. Žiga Avsec FMF DSQ DSQ 0,7 (+0,2)<br/>M.R.<br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(44, 2, NULL, 'Spet doma-v Cirkusu', 'Žur je bil še posebno vroč, ker je po enoletni odstotnosti z domačih odrov, v Cirkusu nastopil naš elektronski wunderkind Beltek. Ljubljančan je pokazal s čim je še minuli vikend navdušil razvajeno občinstvo londonske klubske inštitucije Ministry of Sound, pred tem pa klube in festivale od Miamija in Buenos Airesa do Moskve. Glasbeni izbor, s katerim so ob njem stregli še Alex Cvetkov, Daniel Greenx, Drawle in DJ Frko je bil odličen prerez tega, kar vas čaka na Ultri, po energiji na plesišču pa lahko sinočnjo zabavo uvrstimo med vrhunce pomladnega žurerskega razvrata v Cirkusu.<br/>G.Z.<br/><span style="font-size: 10px">foto: Marko Delbello Ocepek</span><br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(45, 2, NULL, 'Kaj prinaša reorganizacija zavoda?', '<em>»Nov zavod sprememb za stanovalce domov ne prinaša,«</em> zagotavlja <strong>Meta Škufca</strong>, direktorica novega zavoda pod imenom Študentski dom Ljubljana. Sklep o zavodu, ki po novem združuje Dom podiplomcev in gostujočih profesorjev Ljubljana in Študentskih domov v Ljubljani je bil sprejet poleti, 31. avgusta 2012 pa objavljen v Uradnem listu RS.<br/>Združitev je, v skladu <strong>Vlade Republike Slovenije</strong> o ukrepih za racionalizacijo javnega sektorja in izvajanju javnih služb, predlagalo <strong>Ministrstvo za izobraževanje, znanost, kulturo in šport</strong> (MIZKŠ). »<em>Spremembe ne prinašajo slabosti</em>,« je odziv <strong>Mete Škufca</strong> na ukrep, ki je del aktualne varčevalne politike in finančnega poseganja vlade na vsa resorna področja.<br/>Novi zavod naj bi zaradi združitve posloval z nižjimi stroški. »<em>Od slej bo poenotena nabava materialov, spremembe bodo prinesle ukinitev naročanja storitev pri zunanjih izvajalcih del oziroma dobaviteljih in opravljanje le-teh kot so računovodske storitve, storitve pranja perila in storitve vzdrževanja objektov</em>,« pojasnjuje direktorica. Te storitve so sicer bile poenotene in urejene že v delu starega statuta, ki ureja dejavnosti prejšnjega zavoda, razlika je le v tem, da se<strong> Dom podiplomcev</strong> in gostujočih profesorjev Ljubljana priključi k že obstoječemu sistemu ostalih študentskih domov. To prinaša približno 170 novih stanovalcev iz doma podiplomcev, kar za ustanovo, ki šteje 7500 že obstoječih študentov ne prinaša večjih obremenitev. Prav tako je nesmiselno govoriti o namenu znižanja stroškov poslovanja, saj je dosedanji<strong> zavod Študentski domovi v Ljubljani</strong> posloval pozitivno. »<em>Zakaj Študentski dom podiplomcev preprosto nismo priključili k že obstoječemu zavodu?</em>« se na tem mestu sprašuje <strong>Miha Luzar</strong>, predsednik Študentskega sveta stanovalcev (ŠSS), saj meni da bi ravno s tem pokazali transparentno ravnanje s financami, ravno ta ukrep pa bi bil v luči varčevalnih ukrepov. Z ustanovitvijo novega zavoda so namreč nastali tudi novi stroški.<br/>Novi zavod Študentski dom Ljubljana z združitvijo dveh prej ločenih institucij prinaša tudi spremembe v vodstvu in upravljanju. Namesto dveh bo sedaj zavod vodil en direktor, prav tako pa prinaša tudi okrnjeno zasedbo sveta zavoda, ki je organa upravljanja. V zavodu Študentski dom Ljubljana je članov pet, pred tem pa jih je bilo devet. Taka sprememba prinaša drugačno razmerje moči odločanja, saj se je po sprejetem sklepu zmanjšalo število članov, ki so neposredno povezani z življenjem v študentskih domovih.<br>\nSvet po novi ureditvi sestavljajo trije predstavniki imenovani s strani MIZKŠ, eden je predstavnik ŠSS, drugega pa izvolijo zaposleni zavoda med sabo. Po prejšnjem statutu pa so prostor v svetu ob že omenjenih imeli še predstavnik Univerze v Ljubljani, predstavnik Študentske organizacije Univerze v Ljubljani, predstavnik Mestne občine Ljubljana in namesto enega dva predstavnika zaposlenih v zavodu. Tak ukrep prinaša, da so se razmere moči v organu odločanja močno spremenile.<br/>Skladno s sprejetim Sklepom o ustanovitvi javnega zavoda <strong>Študentski dom Ljubljana</strong> je z dnem vpisa Študentski dom Ljubljana v sodni register prenehal mandat obema direktorjema zavodov. Zavod je zato 15. februarja objavil javni razpis za novega direktorja, začasno pa je vlada imenovala vršilko dolžnosti direktorja javnega zavoda Študentski dom Ljubljana<strong> Meto Škufca</strong> in jo pooblastila, da opravi priprave za začetek dela javnega zavoda skladno s sprejetim sklepom.<br/>Marca je vlada, ki je takrat opravljala zgolj tekoče posle, potrdila direktorico <strong>Meto Škufca</strong>, ki je do takrat bila v. d. in je sicer aktivna članica stranke SDS, za direktorico novega zavoda. Čeprav se je na razpis prijavilo več kandidatov, razgovorov ni bilo. Odgovor na ta očitek je, da razgovor ni zakonsko obvezujoča oblika načina izbire kandidata, ki se prijavlja na razpis. Hkrati pa se pojavljajo tudi očitki, da je bil razpis prirejen, saj se je v nekaterih točkah razlikoval od tistih iz prejšnjih let. V prejšnjih razpisih so zahtevali, da prijavljeni kandidat »aktivno obvlada vsaj en svetovni jezik«, v zadnjem razpisu tega pogoja ni več. Poleg tega so v prejšnjih razpisih zahtevali »najmanj pet let delovnih izkušenj na vodilnih mestih«, v zadnjem razpisu pa so ta pogoj omilili in zahtevali »pet let delovnih izkušenj na vodstvenih delovnih mestih«. Zaradi takih sprememb so nekateri člani sveta zavoda prepričani, da je v ozadju želja po imenovanju Škufce na direktorski položaj.<br/>V zavodu se trenutno dogovarjajo o novih strokovnih sodelavcih. Mnenja se krešejo in prvotna ideja o novem zavodu, ki bo zniževal stroške se zdi vedno bolj oddaljena. Novi zaposleni pomenijo nove stroške, vprašanje ki pa se postavlja pa je: »<em>Kdo bo to poravnal?</em>«<br/>', '2013-06-19 13:19:29', 'dodatna_novica'),
(46, 2, NULL, 'Zaključek majskih v Companerosu', 'Vsi, željni zabavanja dolgo v noč, pa so se &#8221;preselili&#8221; v Companeros.<br/>N.K.<br/><span style="font-size: 10px">foto: Tit Bonač</span><br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(47, 2, NULL, 'Okrogla miza: Varnost uporabnikov  na družbenih omrežjih v Evropski uniji', 'Postavljena vprašanja so bila osrednja tema okrogle mize: »<strong><em>Varnost uporabnikov na družbenih omrežjih v Evropski uniji</em></strong>«, ki je potekala <strong>21.5.2013</strong> na na<strong> Evropski pravni fakulteti v Novi Gorici</strong> (v organizaciji društva <strong>ELSA Nova Gorica</strong>).<br/>Osrednja gosta okrogle mize sta bila<strong> Gorazd Božič</strong>; vodja nacionalnega odzivnega centra za omrežne incidente <strong>SI-CERT</strong> (Slovenian Computer Emergency Response Team), ki že od leta 1995 preiskuje vdore v računalnike in pomaga uporabnikom pri raznovrstnih drugih zlorabah, ter<strong> svetovalka Urada informacijskega pooblaščenca RS</strong> <strong>Polona Tepina</strong>, ki se prav tako pri svojem delu vsakodnevno srečuje s problematiko varstva osebnih podatkov na spletu.<br/>Rdeča nit razprave je slonela na dejstvu, da nas razvoj tehnologije in virtualnih možnosti pelje v smeri, da vedno več osebnih podatkov izgubljamo in jih puščamo nezavarovane, kar vodi v raznovrstne zlorabe (kraja identitete, vdor v zasebne datoteke, objava osebnih zadev na družbenih omrežjih, ipd). Vsekakor je na tem področju zato pomembna ustrezna regulacija, ki bo obvarovala uporabnike storitev in ob enem omejila ponudnike pri razpolaganju s podatki ki se zbirajo v njihovih bazah. Na ravni <strong>Evropske Unije</strong> se v ta namen pripravlja<strong> Uredba o varstvu osebnih podatkov</strong>, ki prinaša veliko novosti, ki bodo doprinesle k zvišanju stopnje varstva tako za posameznike, kot za podjetja in gospodarstvo.<br/>Ker pa tehnologija ter razvoj spletnih storitev in različne vrste prevar prednjačijo pred nacionalno kot tudi <strong>Evropsko regulacijo</strong>, je bistvenega pomena osveščanje posameznikov o bolj previdnem razpečevanju osebnih podatkov na spletu. Na tem področju ni ranljiva zgolj mladina, ki se kot del vsakdana udejstvuje na družbenih omrežjih ampak tudi odrasli posamezniki, podjetja, itd.<br/>Regulacija tega področja je brez pomena, če tudi posamezniki oziroma uporabniki ne prevzamemo del odgovornosti za svoja dejanja.<br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(48, 2, NULL, '5V: Electro Team &#8211; ET', '<strong>Kako se spominjate snemanja hita Tek je 12 sati, ki je poleti 1993 sprožil eksplozijo dance glasbe v celi regiji?</strong><br>\nVse skupaj se je začelo že nekaj mesecev prej, ko sem za Sandija Cenova remiksal skladbo &#8220;Ljubav za sve&#8221;. Takrat sem vedel, kam se moramo usmeriti, saj smo prej ustvarjali hip hop, r&amp;b in plesno glasbo z angleškimi besedili, po neuspehu prvega albuma pa je skupina skoraj razpadla. Pozimi leta 1993 sem si v Londonu ogledal nastope nekaterih takrat najbolj vročih dance skupin in dobil navdih za novi zvok ET-ja. Prvi plod te vizije je bil &#8220;Tek je 12 sati&#8221;, ki smo ga posneli, ko sem pri sponzorjih napraskal denar za snemanje. In ta skladba je potem res spremenila podobo glasbene scene v celi bivši Jugoslaviji.<br/><strong>Tudi v Sloveniji vam je sledil kup podobnih skupin. Se spomnite kakšnega slovenskega benda ali hita iz tistih časov?</strong><br>\nČe sem iskren, se ne spomnim niti enega izvajalca izven Hrvaške, ki je tedaj ustvarjal podobno glasbo kot ET. Zagotovo so obstajali, a nam se je takrat toliko dogajalo, da to enostavno ni prišlo do nas. So pa danes razmere povsem drugačne in v Sloveniji je cel kup odličnih ustvarjalcev vrhunske elektronske plesne glasbe različnih žanrov.<br/><strong>Zanimivo, kako se je elektronska glasba v Sloveniji v dveh desetletjih razcvetela, na Hrvaškem pa je nikoli niso zares sprejeli, čeprav sta vam sledili še dve veliki plesni skupini, Colonia in Karma.</strong><br>\nPri nas je za večino ljudi v medijih dance še vedno le hipen trend, kar je smešno. Kot da nikoli niso bili v diskoteki ali prižgali MTV-ja. Najhujši so samooklicani kritiki, ki se nikoli niso odlepili od Woodstocka. Najbolj žalostno pa je, da naši glasbeniki Coloniji nikoli niso priznali, da je zelo uspešna skupina, čeprav se lahko pohvalijo z več uspehi kot tričetrt scene skupaj. To je tipična hrvaška zavist. Podobno je s Karmo, ki je osvojila Češko, a se to večini doma zdelo nepomembno.<br/><strong><a href="http://www.studentske-novice.si/wp-content/uploads/2013/05/ET_01.jpg"><img class="size-medium wp-image-2462 alignleft" alt="ET 01 215x300 5V: Electro Team   ET" src="http://www.studentske-novice.si/wp-content/uploads/2013/05/ET_01-215x300.jpg" width="215" height="300" title="5V: Electro Team   ET"></a>Kateri so bili vaši največji uspehi po Vanninem odhodu?</strong><br>\nKot so včasih ljudje noreli na &#8220;Tek je 12 sati&#8221;, danes mladina nori na &#8220;Prazan stan&#8221; in druge hite, ki sva jih v zadnjih letih posnela s Katarino. V tem pogledu se ni kaj dosti spremenilo. Vsaka pevka je dala skupini svoj pečat in vsak od devetih album je navrgel vsaj nekaj hitov. ET je obstajal pred Vanno in po njej in vsaka pevka, ki je zapustila to skupino, je s tem tvegala kariero, saj je zvok ET-ja zelo prepoznaven in zaznamuje vsakogar, ki deluje v kolektivu. Vanna je zaznamovala neko obdobje. Tako kot je svoj pečat pustila Lana in zdaj Katarina, ki je pevka z najdaljšim stažem v Electro Teamu. Kot večina skupin smo se morali zvočno prilagoditi temu, da mladi na Hrvaškem najrajeje poslušajo turbofolk, a še vedno raje naredim tak kompromis in ustvarjam nekaj svežega, kot da bi dvajset let kolobaril isti zvok 90. let.<br/><strong>Kaj pripravljate za petkove nastop na zabavi DeeJay Time Back in Time na Gospodarskem razstavišču?</strong><br>\nOriginalen nastop, saj se nam je v 26. letih dela nabralo ogromno dobrih pesmi in lahko izvedemo koncert poln hitov sestavljen izključno na avtorskem repertoraju. Zabavali se boste lahko tako ob starejših uspešnicah Electro Teama pa tudi skladbah, s katerimi smo osvajali radijski eter in lestvice v zadnjih letih. Prepričani smo, da se bodo obiskovalci dobro zabavali, plesali in odpeli z nami večino, če ne kar vse pesmi.<br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(49, 2, NULL, 'Poslovil se je 19. teden mladih', 'V 9 festivalskih dneh ga je obiskalo 15.000 obiskovalcev, največ mladih in mladih po srcu pa je pritegnil prav zadnji večer, ko so na velikem odru Tedna mladih nastopili Elvis Jackson in S.A.R.S.<br/>Večerni program festivala je bil plačljiv, pri čemer je prost vstop na večino večernih dogodkov Tedna mladih 2013 omogočala festivalska zapestnica z dobrodelno noto. 1 € od vsake zapestnice je KŠK namenil 20-letnemu Kranjčanu, ki se je pred tremi leti huje poškodoval in postal tetraplegik.<br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(50, 2, NULL, 'ZF in FŠ najboljši na prvenstvu Univerze v Ljubljani v odbojki na mivki', 'V sredo, 15. 5. 2013, je na igriščih ob Športni hiši Ilirija v moški konkurenci tekmovalo osem ekip, v ženski konkurenci pa enajst. V ekipni konkurenci je zmagala Fakulteta za šport z osvojenimi 180 točkami. V obeh kategorijah je bilo odigrano skupaj 52 tekem na treh igriščih. Po končanem tekmovanju so najboljše ekipe prejele medalje in nagrade, zmagovalna fakulteta pa tudi pokal za prvo mesto.<br/>V moški konkurenci sta se magovalca predskupin (ekipi Bahč/Boženk in Simončič/Novak) pomerili v finalu. Malce presenetljivo sta prvi niz dobila izzivalca  lanskih zmagovalcev, <strong>Mitja Simončič</strong> in <strong>Iztok Novak</strong>. Po porazu v prvem nizu sta lanska zmagovalca, <strong>Anže Bahč</strong> in <strong>Tadej Boženk</strong> strnila vrste in prepričljivo osvojila 2.in 3. niz ter s tem še podaljšala niz nepremagljivosti na študentskih tekmovanjih v odbojki na mivki. Tekma za tretje mesto je bila ponovitev tekme iz skupine A, Zagorc/Orginc pa sta le še potrdila zmago v skupinskem delu in osvojila končno tretje mesto.<br/>Pri dekletih sta <strong>Marina Crnjac</strong> in <strong>Zala Verbole</strong> na videz brez težav osvojili končno prvo mesto. Na igrišču pa vseeno ni bilo vedno tako enostavno. Predvsem v četrtfinalu in polfinalu sta se morali pošteno potruditi. Zanimivo je bilo tudi v spodnjem delu razpredelnice, saj sta končni finalistki, Mehle/Grgičevič izgubili srečanje drugega kroga, in sta se v polfinale prebili skozi repasaž. Tekme v repasažu so bile zelo izenačene, ena izmed najbolj napetih tekem pa je bilo drugo polfinale, ki sta ga po zmagi v tretjem nizu dobili prav Mehle/Grgičevič. Dekleta so prikazala dobro igro s številnimi lepimi potezami predvsem v obrambi, kjer je veljalo da nobena žoga ni izgubljena dokler ne pade na tla.<br/><strong>Rezultati:</strong><br/>MOŠKI<br/>1. Bahč, Boženk (ZF)<br/>2. Simončič, Novak (FŠ)<br/>3. Zagorc, Ogrinc (FS)<br/>4. Rejc, Ambrožič (FKKT)<br/>5. Novak, Brumen (FE)<br/>6. Bezek, Grah (EF)<br/>7. Lajkovič, Alegro (FŠ)<br/>8. Pirc, Petkovšek (FS)<br/>ŽENSKE<br/> 1. Crnjac, Verbole (FŠ)<br/> 2. Mehle, Grgičevič (FFA)<br/> 3. Morgan, Ulčer (MF)<br/> 4. Pleško, Janežič (FŠ)<br/> 5. Pungartnik, Vodopivec (FŠ)<br/> 6. Ropret, Vidovič (FFA)<br/> 7. Guštin, Kraševec (FKKT)<br/> 8. Grilc, Četina (MF)<br/>9. Baron, Prestor (FŠ)<br/>10. Intihar, Suljanović (MF)<br/>11. Štrukelj, Duvnjak (PeF)<br/>M.R.<br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(51, 2, NULL, 'Kdo bo na položaju rektorja nasledil dr. Radovana Stanislava Pejovnika? (VIDEO, SLIKE)', 'Sprva je kazalo, da bodo kandidati trije, vendar <strong>dr. Dušan Mramor</strong>, kandidat ekonomske fakultete, kljub izglasovanemu sklepu senata EF, k svoji kandidaturi ni dal soglasja.<br/>Nekdanji dekan FDV in minister za delo, družino in socialne zadeve <strong>dr. Ivan Svetlik, </strong>je<strong> </strong>že<strong> </strong>na sami otvoritvi kandidature, ki je minulo sredo potekala na FDV predstavil nekatera programska izhodišča. Za nas je dejal:<em> &#8221;V kandidaturo za rektorja Univerze v Ljubljani grem z željo, da povežem skupnost zaposlenih in študentov v prizadevanjih za uresničitev Strategije UL 2020. To so v prvi vrsti dvig kakovosti izobraževanja, okrepitev raziskovalnih skupin, povečan prenos znanja v delovna okolja, poglobljena internacionalizacija, ohranitev znanja kot javne dobrine ter zaščita ugleda univerze kot javne, celovite, avtonomne in v prihodnost usmerjene institucije. Verjamem, da 6000 zaposlenih in 50000 studentov to zmore.&#8221; </em><br/><div class=''et-learn-more et-open clearfix''>\n					<h3 class=''heading-more open''>VIDEO<span class=''et_learnmore_arrow''><span></span></span></h3>\n					<div class=''learn-more-content''><iframe src="http://www.youtube.com/embed/mOraedJFqVs" height="315" width="100%" allowfullscreen="" frameborder="0"></iframe></div>\n				</div><br/>Kot poroča Dnevnik,<strong> Dr. Jožef Duhovnik</strong> programa še ni napisal, eden glavnih poudarkov v njegovem mandatu pa naj bi bil dvig kakovosti študija.<br/>Volitve za novega rektorja Univerze v Ljubljani bodo 18. junija.  Kandidata pa se bosta prvič soočila že prihodnjo sredo.<br/>M.J.<br/><span style="font-size: 10px;">foto: Jan Merc</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(52, 2, NULL, 'Novo ozvočenje, nov film o Ambasadi, novi Valentino', 'Valentino Kanzyani je v svojem svežem konceptu Back to the Future lepo zmešal glasbo preteklosti, sedanjosti in prihodnosti ter uspešno krstil novo ozvočenje Audio Martin. Svoje je k zgodbi prispevalo tudi celonočno chill-out popotovanje z E/Tapom v priveeju, kjer so si obiskovalci lahko za uvod v glasbeno noč ogledali dokumentarni film Katedrala luksuznih barv. V njem iz prve roke izvemo kup zanimivosti o enem najlepših mediteranskih klubov. Za zamudnike bo v naslednjih mesecih organizirana dodatna projekcija filma, ki je obvezno gradivo za vse ljubitelje elektronske glasbe, popkulture in Ambasade Gavioli.<br/>G.Z.<br/><span style="font-size: 10px">foto: Dejan Hren</span><br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(53, 2, NULL, 'Sobotna vročica – Rico Bernascon', 'Večer se je ob dobri glasbi prelil v noč, katero je dodatno segrel Rico Bernasconi. Nemški DJ in producent hitov &#8216;Party in Mykonos&#8217;, &#8216;Party all the time&#8217; ter drugih uspešnic je poskrbel za odlično atmosfero in zabavo do zgodnjih jutranjih ur.<br/>J.H.<br/><span style="font-size: 10px">foto: Sami Rahim</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(54, 2, NULL, 'Uporabno znanje je lahko pridobljeno na zabaven – neformalen način', 'Njen namen je širšo javnost opozoriti na pomen neformalno pridobljenega znanja in vlogo nevladnih organizacij kot »ponudnikov« neformalnega učenja. Akcijo je organiziral Zavod Nefiks v sodelovanju s partnerskimi organizacijami konzorcija mreže MINVOS, potekalala pa je od mraka do polnoči po sedmih večjih slovenskih mestih. Pridružile so se ji nevladne organizacije, društva, inštituti in mladinski centri mreže iz Ljubljane, Maribora, Kopra, Novega mesta, Celja, Velenja in Zagorja. Skupaj se je po vsej Sloveniji predstavilo več kot trideset nevladnih organizacij(NVO). Vsebine so se predvajale preko projektorjev na ulične zidove ter na televizijskih zaslonih gostinskih lokalov v centrih mest.<br/><a href="http://www.studentske-novice.si/wp-content/uploads/2013/05/IMG_1439.jpg"><img class="size-medium wp-image-2570 alignleft" alt="IMG 1439 300x225 Uporabno znanje je lahko pridobljeno na zabaven – neformalen način" src="http://www.studentske-novice.si/wp-content/uploads/2013/05/IMG_1439-300x225.jpg" width="300" height="225" title="Uporabno znanje je lahko pridobljeno na zabaven – neformalen način"></a>Nevladne organizacije so predvsem društva, ustanove in (zasebni) zavodi. Tvorijo nevladni (tretji) sektor oz.  civilno družbo. Opravljajo pomembni funkciji: zagovorniško in storitveno. Z akcijo želijo okolici predstaviti, kako pomembne so za lokalno okolje in prikazati široko polje učenja, ki ga vključenim posameznikom lahko nudijo.<br/>Predstavitev dela nevladnih mladinskih organizacij je potekala v obliki zabavne video in foto prezentacje, kjer so mimoidočim in obiskovalcem predstavljali pomen svojih dejavnosti v domačem in širšem okolju. Mimoidoči so bili tako kot lani tudi letos nad akcijo navdušeni. Jože, mimoidoči: »Kljub slabemu vremenu  ste mi polepšali večer. Navdušen sem, da obstajajo organizacije, ki so pripravljene prostovoljno prispevati k neformalnemu izobraževanju mladih.«<br/>', '2013-06-19 13:19:30', 'dodatna_novica'),
(55, 2, NULL, 'Navkljub slabemu vremenu rekord proge na Kalvariji', '&nbsp;<br/><strong>Zdrava zabava</strong> (Univerzitetna športna zveza Maribor) je kljub slabi vremenski napovedi izpeljala 4. nočni tek na Kalvarijo – edition by Soundbiro. Vsi prijavljeni tekači so premagali naporno progo (455 stopnic). Kot uvod in presenečenje za gledalce je tek otvoril eden najboljših smučarjev prostega sloga<strong> Filip Flisar</strong>, ki se je s kolesom spustil po vseh 455 stopnicah. Takoj za njim se je po pobočju Kalvarije spustil še <strong>Urh Pantner</strong>, večkratni državni prvak z monociklom.<br/>Nato so tekmovalci pričeli premagovati težavno progo. Že prvi tekmovalec<strong> Matjaž Mikloša</strong> je pripravil presenečenje, saj je postavil nov rekord proge 1:45,13. Do konca tekmovanja sta se mu je najbolj približala <strong>Miha Kvas</strong> in <strong>Andrej Golob</strong>, vendar nihče ni mogel premagati odličnega Matjaža. V ženski konkurenci je s časom 2:38,06 slavila <strong>Karmen Klančnik</strong>. Tik za njo pa sta se uvrstili <strong>Manja Frece</strong> in <strong>Špela Zupan</strong>.<br/>Kalvarija je bila vidna daleč naokoli, saj je Zdrava zabava skupaj s Soundbirojem poskrbela za nepozabne svetlobne efekte. Nočni tek na Kalvarijo tako velja za edinstveno prireditev, ki je prepoznana med profesionalnimi športniki in rekreativci. <em>»Letos je bil najmlajši udeleženec teka star 10 let, najstarejši pa 66,«</em> je povedal <strong>Marjan Pučnik</strong>, predsednik Univerzitetne športne zveze Maribor. Zagotovo pa so zmagovalci vsi, ki so prišli do cilja zahtevne proge.<br/><strong>Rezultati:</strong><br/>Ženske:<br/>1. Karmen Klančnik 2:38,06 2. Manja Frece 2:41,99 3. Špela Zupan 2:43,65<br/>Moški:<br/>1. Matjaž Mikloša 1:45,13 2. Miha Kvas 1:46,22 3. Andrej Golob 1:57,81<br/>', '2013-06-19 13:19:31', 'dodatna_novica'),
(56, 2, NULL, 'Modna galerija by Studio Oranž &amp; DH Fashion', 'V okviru &#8216;Modne galerije&#8217; sta se obiskovalcem kluba Plusminus predstavila Goran s svojo ekipo frizerskega studia Oranž ter David – novost na modni sceni, ki je premierno pokazal svojo blagovno znamko DH Fashion. Vsi, ki ste dogodek zamudili, nekaj utrinkov iz modno obarvane noči najdete v galeriji slik.<br/>J.H.<br/><span style="font-size: 10px">foto: Sami Rahim</span><br/><strong>FOTO GALERIJA</strong><br/>', '2013-06-19 13:19:31', 'dodatna_novica'),
(57, 2, NULL, 'Pimp my night v petek zvečer (SLIKE)', 'Za zabavo do zgodnjih jutranjih ur je skrbel rezident<strong> Dj Martini</strong>, večer pa sta z nastopom v živo popestrila velenjski raper <strong>Benjamin Džini a.k.a. Ghet</strong> ter mariborčan <strong>Emkej</strong>.<br/>J.<br/><span style="font-size: 10px;">Foto: Sami Rahim</span><br/>', '2013-06-19 13:19:31', 'dodatna_novica'),
(58, 2, NULL, 'CUKER afterwork četrtki (SLIKE)', 'Druženja ob reki Dravi potekajo vsak četrtek od 17.ure naprej, kjer se lahko razvajate s finger food prigrizki, cocktaili, brezplačno degustacijo priznanih vin ter izbrano glazbo DJ-ev.<br/>Se vidimo na najdaljši v mestu! Terasi, seveda.<br/>J.<br/><span style="font-size: 10px;">foto: Sami Rahim</span><br/>', '2013-06-19 13:19:31', 'dodatna_novica'),
(59, 2, NULL, 'Aljaž Pegan: Bilo je lepo (VIDEO)', '', '2013-06-19 13:19:31', 'dodatna_novica');
INSERT INTO `objava` (`id`, `user_id`, `kategorija_id`, `naslov`, `vsebina`, `datum_objave`, `tip`) VALUES
(60, 2, NULL, 'ČESTITAMO - Najboljši študent UM je Iztok Fister', '<p>Univerza v Mariboru je v sodelovanju z Elektrom Maribor d. d. izvedla razpis za izbor najbolj&scaron;ega &scaron;tudenta Univerze v Mariboru.&nbsp;<br /><br />Izmed 25-ih odličnih &scaron;tudentov je komisija, ki so jo sestavljali prof. dr. Zoran Ren (Fakulteta za strojni&scaron;tvo UM), prof. dr. Mihaela Koletnik (Filozofska fakulteta UM), Nika Sajko (oddelek za izobraževanje Univerze v Mariboru) ter &scaron;tudentki Tea Markotić in Eva Senica, za naj &scaron;tudenta izbrala:&nbsp;<br /><strong><br />Iztoka Fisterja,</strong>&nbsp;&scaron;tudenta&nbsp;2. letnika magistrskega &scaron;tudijskega programa Računalni&scaron;tvo in informacijske tehnologije Fakultete za elektrotehniko, računalni&scaron;tvo in informatiko, ki trenutno pripravlja magistrsko nalogo &raquo;A comprehensive review of bat algorithms and their hybridization&laquo;, pod mentorstvom dr. Marjana Mernika ter somentorstvom profesorja iz Velike Britanije. Kako velik interes in veselje ima do raziskovalnega dela, kaže njegova bibliografija, ki trenutno obsega 15 enot. Med njimi je 8 izvirnih znanstvenih člankov, od tega so 3 dela objavljena v JRC revijah, in 5 konferenčnih člankov. Za svoje raziskovalno delo je prejel že vrsto nagrad &ndash; zmaga na konferenci ERK 2010 za najbolj&scaron;i prispevek, nagrada FERI 2010 za posebne dosežke, Perlachova nagrada 2011 za najbolj&scaron;o diplomo.</p>\r\n<p>&nbsp;</p>\r\n<p>Več informacij:<br /><span style="font-family: Arial;"><a style="color: #1c4980;" href="http://www.um.si/univerza/medijsko-sredisce/novice/Strani/novice.aspx?p=311">http://www.um.si/univerza/medijsko-sredisce/novice/Strani/novice.aspx?p=311</a></span></p>', '2013-06-19 13:20:42', 'novica'),
(61, 2, NULL, ' Objavljamo razpis za vpis v podiplomske študijske programe v študijskem letu 2013/2014', '<p><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">31. 5. 2013 je bil na&nbsp;podlagi 40. člena Zakona o visokem &scaron;olstvu (Ur l. RS, &scaron;t. 32/2012), Pravilnika o razpisu za vpis in izvedbi vpisa v visokem &scaron;olstvu, sklepa Senata Univerze v Mariboru in pridobljenega soglasja Vlade Republike Slovenije objavljen&nbsp;RAZPIS ZA VPIS V PODIPLOMSKE &Scaron;TUDIJSKE PROGRAME V &Scaron;TUDIJSKEM LETU 2013/2014</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp;</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Več informacij najdete na spletni strani:&nbsp;</span><a style="color: #1c4980; font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" href="http://www.feri.uni-mb.si/podrocje.aspx?id=496"><span style="font-family: Arial;">http://www.feri.uni-mb.si/podrocje.aspx?id=496</span></a></p>', '2013-06-19 13:21:37', 'novica'),
(62, 2, NULL, 'BREZPLAČEN OBISK ŠTUDENTOV na forumu IFIRT 2013', '<p><strong style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">V prilogah najdete obvestila o&nbsp;<span style="font-family: Arial;">rokih za prijavo tem in zagovorov diplomskih delo v &scaron;tudijskem letu 2012/2013 za:<br />- &scaron;tudijske programe 1. stopnje<br />- &scaron;tudijske programe 2. stopnje<br />- &scaron;tudijske programe sprejete pred 11. 6. 2004.<br /><br /><em>To obvestilo je bilo prvič objavljeno 9. 1. 2013.</em></span></strong></p>', '2013-06-19 13:22:23', 'novica'),
(63, 2, NULL, 'Objavljamo razpis za vpis v podiplomske študijske programe v študijskem letu 2013/2014', '<p><em>V prilogah najdete obvestila o&nbsp;<span style="font-family: Arial;">rokih za prijavo tem in zagovorov diplomskih delo v &scaron;tudijskem letu 2012/2013 za:<br />- &scaron;tudijske programe 1. stopnje<br />- &scaron;tudijske programe 2. stopnje<br />- &scaron;tudijske programe sprejete pred 11. 6. 2004.<br /><br />To obvestilo je bilo prvič objavljeno 9. 1. 2013.</span></em></p>', '2013-06-19 13:22:54', 'novica'),
(64, 2, 1041, 'Rezultati vm. izpita pri predmetu Umetna inteligenca', '<p><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Spo&scaron;tovani &scaron;tudenti,</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp; V prilogi objavljam rezultate 3. vmesnega izpita pri predmetu Umetna inteligenca. Vpogled v naloge bo možen v petek 21. 6. 2013 od 8:00 do&nbsp; 9:00.</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Lep pozdrav,</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp; Andrej Nerat</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><strong style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">PS.:<br />&nbsp; &Scaron;e enkrat vas opozarjam, da se zagovor projektnih vaj prestavi iz ponedeljka 24. 6. 2013 na petek 21. 6. 2013 od 11:00 naprej.</strong></p>', '2013-06-19 13:23:48', 'oglas'),
(65, 2, 1041, 'Prestavitev zagovorov projektnih vaj pri predmetu Umetna inteligenca', '<p><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Spo&scaron;tovani &scaron;tudenti,</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp; Zaradi zadržanosti asistenta se zagovori projektnih vaj pri predmetu Umetna inteligenca prestavijo iz ponedeljka 24. 6. 2013 na&nbsp;</span><strong style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">petek 21. 6. 2013 od 11:00 naprej</strong><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">. Vse skupine morajo prinesti pripravljene izdelke in&nbsp;</span><strong style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">obvezno</strong><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp;</span><strong style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">poročila</strong><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp;o delu v posamezni skupini. Na zagovoru morajo biti navzoči vsi člani skupine.</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Lep pozdrav,</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">&nbsp; Andrej Nerat</span></p>', '2013-06-19 13:24:26', 'oglas'),
(66, 2, 16, 'Družovec Marjan - govorilne ure 26.6.2013', '<p><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">V sredo 26.6.2013 bodo govorilne ure med 8:00 in 10:00.&nbsp;</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Hvala za razumevanje</span><br style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;" /><span style="font-family: tahoma, verdana, sans-serif; font-size: 12px; line-height: 16.796875px; text-align: justify;">Družovec Marjan</span></p>', '2013-06-19 13:25:02', 'oglas'),
(67, 2, NULL, 'Programiranje how to', '<p>Programiranje 2<br /><br /></p>\r\n<p>Zanima me kako se ustvari<br /><br /><br /><br />Hvala za odgovor!</p>', '2013-06-19 13:27:07', 'vprasanje'),
(68, 1, NULL, 'Kako se ustvari...?', '<p>Kako se implementira naslednji algoritem:<br /><br /><br /><br /><br />Hvala za odgovore</p>', '2013-06-19 13:29:31', 'vprasanje');

-- --------------------------------------------------------

--
-- Struktura tabele `objava_beseda`
--

CREATE TABLE IF NOT EXISTS `objava_beseda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beseda_id` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `objava_id` int(11) DEFAULT NULL,
  `frekvenca` int(11) NOT NULL,
  `tf` decimal(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3CF93610FF061AC5` (`beseda_id`),
  KEY `IDX_3CF93610777BAB62` (`objava_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `objava_oznaka`
--

CREATE TABLE IF NOT EXISTS `objava_oznaka` (
  `oznaka_id` int(11) NOT NULL,
  `objava_id` int(11) NOT NULL,
  PRIMARY KEY (`oznaka_id`,`objava_id`),
  KEY `IDX_40351ECCB41AF6DC` (`oznaka_id`),
  KEY `IDX_40351ECC777BAB62` (`objava_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `odgovor`
--

CREATE TABLE IF NOT EXISTS `odgovor` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `odgovor`
--

INSERT INTO `odgovor` (`id`, `rating`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `odgovor_userrated`
--

CREATE TABLE IF NOT EXISTS `odgovor_userrated` (
  `odgovor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`odgovor_id`,`user_id`),
  KEY `IDX_5731DA4DFB1608F8` (`odgovor_id`),
  KEY `IDX_5731DA4DA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `odgovor_user_rated`
--

CREATE TABLE IF NOT EXISTS `odgovor_user_rated` (
  `odgovor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`odgovor_id`,`user_id`),
  KEY `IDX_7A1A5CFCFB1608F8` (`odgovor_id`),
  KEY `IDX_7A1A5CFCA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `odgovor_user_rated`
--

INSERT INTO `odgovor_user_rated` (`odgovor_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `oglas`
--

CREATE TABLE IF NOT EXISTS `oglas` (
  `id` int(11) NOT NULL,
  `datum_zapadlosti` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `oglas`
--

INSERT INTO `oglas` (`id`, `datum_zapadlosti`) VALUES
(64, '2013-06-27'),
(65, '2013-06-27'),
(66, '2013-07-25');

-- --------------------------------------------------------

--
-- Struktura tabele `oznaka`
--

CREATE TABLE IF NOT EXISTS `oznaka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `predmet`
--

CREATE TABLE IF NOT EXISTS `predmet` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `predmet`
--

INSERT INTO `predmet` (`id`, `ime`) VALUES
(8, 'FIZIKA II'),
(17, 'MIKROKRMILNIKI'),
(20, 'REGULACIJE I'),
(21, 'SENZORJI'),
(24, 'TEORIJA SISTEMOV'),
(26, 'MERITVE V ELEKTRONIKI'),
(27, 'MIKROPROCESORJI'),
(28, 'RAcUNALNISKO NAcRTOVANJE VEZIJ'),
(29, 'UVOD V ANALIZO VEZIJ'),
(30, 'ELEKTRIcNE NAPRAVE V ENERGETIKI'),
(31, 'ELEKTRIcNI POGONI'),
(32, 'ELEKTRODINAMIKA'),
(33, 'RAZDELJEVANJE ELEKTRIcNE ENERGIJE'),
(34, 'MODELIRANJE IN VODENJE'),
(35, 'ANGLEScINA '),
(39, 'FIZIKA II'),
(40, 'INTERNETNE TEHNOLOGIJE'),
(42, 'MATEMATIKA II'),
(46, 'OSNOVE ELEKTROTEHNIKE II'),
(47, 'RAcUNALNISTVO'),
(48, 'AKTUATORSKA TEHNIKA'),
(52, 'INDUSTRIJSKA ELEKTRONIKA'),
(54, 'KOMUNIKACIJE V AVTOMATIKI'),
(55, 'KRMILNA TEHNIKA'),
(56, 'KRMILNIKI IN MIKRORAcUNALNIKI'),
(58, 'SENZORSKA TEHNIKA I'),
(63, 'ELEKTRONIKA II'),
(64, 'MERITVE V ELEKTRONIKI'),
(65, 'MIKROPROCESORSKI SISTEMI I'),
(66, 'PRENOS SIGNALOV'),
(67, 'PROCESIRANJE SIGNALOV'),
(70, 'VMESNIKI IN PRETVORNIKI'),
(71, 'ELEKTRIcNI POGONI'),
(75, 'PROIZVODNJA ELEKTRIcNE ENERGIJE'),
(77, 'VISOKONAPETOSTNA TEHNIKA'),
(78, 'VODENJE ELEKTROMEHANSKIH SISTEMOV'),
(79, 'ZAScITNA TEHNIKA IN AVTOMATIZACIJA'),
(80, 'ELEKTRONIKA'),
(81, 'GRADNIKI TELEKOMUNIKACIJSKIH SESTAVOV'),
(82, 'MERITVE V TELEKOMUNIKACIJAH'),
(83, 'MIKRO IN SIGNALNI PROCESORJI'),
(84, 'OSNOVE OMREZNIH TEHNOLOGIJ'),
(354, 'DIFERENCIALNE ENAcBE'),
(356, 'MERITVE V ELEKTROTEHNIKI'),
(358, 'OSNOVE ELEKTROTEHNIKE II'),
(361, 'PROGRAMIRANJE ZA ELEKTROTEHNIKE II'),
(368, 'OSNOVE RAcUNOVODSTVA'),
(390, 'PLATFORME INFORMACIJSKIH SISTEMOV'),
(391, 'PODATKOVNE BAZE'),
(392, 'PRAKTIKUM I'),
(394, 'RAZVOJ IN UPORABA KOMPONENT V JAVI'),
(397, 'ARHITEKTURE IS IN VZORCI'),
(403, 'OBVLADOVANJE PROCESOV IN KAKOVOSTI'),
(404, 'PODATKOVNE BAZE II'),
(405, 'PRAKTIKUM II'),
(407, 'UPRAVLJANJE TEHNOLOGIJ KOMUNICIRANJA'),
(409, 'KOMUNICIRANJE IN DELO V SKUPINAH'),
(411, 'NAPREDNO PROGRAMIRANJE'),
(424, 'MATEMATIKA II'),
(425, 'ORODJA ZA RAZVOJ APLIKACIJ'),
(428, 'RAZVOJ APLIKACIJ ZA INTERNET'),
(430, 'SISTEMI ODLOcANJA'),
(433, 'VARNOST IN ZAScITA'),
(500, 'AVDIO IN VIDEO TEHNOLOGIJA'),
(503, 'KRITIcNO MISLJENJE IN IZRAZANJE'),
(505, 'MNOZIcNI MEDIJI'),
(508, 'PROGRAMIRANJE ZA MEDIJE'),
(509, 'UVOD V STATISTIKO'),
(510, 'TUJI JEZIK I'),
(513, 'ORGANIZACIJA AVDIOVIZUALNE PRODUKCIJE'),
(518, 'RAZVOJ SPLETNIH SISTEMOV'),
(520, 'TEHNIKE AVDIO IN VIDEO PRODUKCIJE'),
(522, 'VIZUALNE KOMUNIKACIJE'),
(523, 'VSEBINE ELEKTRONSKIH MEDIJEV'),
(524, 'RAcUNALNISKA ANIMACIJA ZA MEDIJE'),
(525, 'TIPOGRAFIJA IN ALTERNATIVNE TISKANE OBLIKE'),
(526, 'ALGORITMI IN PODATKOVNE STRUKTURE'),
(528, 'DISKRETNE STRUKTURE'),
(529, 'INTERAKCIJA cLOVEK-RAcUNALNIK'),
(535, 'PROGRAMIRANJE II'),
(552, 'ORGANIZACIJA IN ARHITEKTURA RAcUNALNIKOV'),
(553, 'OSNOVE ALGORITMOV'),
(554, 'PODATKOVNE STRUKTURE'),
(556, 'PROGRAMIRANJE II'),
(558, 'STROKOVNA ANGLEScINA'),
(559, 'UVOD V OPERACIJSKE SISTEME'),
(725, 'EKONOMIJA IN MANAGEMENT'),
(727, 'MERITVE'),
(729, 'PROGRAMIRANJE ZA TELEKOMUNIKACIJE II'),
(732, 'UVOD V TELEKOMUNIKACIJE'),
(734, 'DIGITALNE KOMUNIKACIJE'),
(737, 'ELEKTRONSKA KOMUNIKACIJSKA VEZJA'),
(738, 'MIKRORAcUNALNISKI SISTEMI'),
(742, 'TELEKOMUNIKACIJSKA OMREZJA I'),
(750, 'LINEARNA ALGEBRA'),
(753, 'MATERIALI II'),
(756, 'OSNOVE ELEKTROTEHNIKE'),
(764, 'VALOVANJE IN ZGRADBA SNOVI'),
(777, 'PLANETNA GONILA'),
(801, 'MODELIRANJE IN IDENTIFIKACIJE'),
(802, 'DIGITALNE STRUKTURE IN SISTEMI'),
(810, 'UVOD V RAcUNALNISKO GEOMETRIJO'),
(811, 'UMETNA INTELIGENCA'),
(813, 'SISTEMSKA PROGRAMSKA OPREMA'),
(815, 'SPLETNO PROGRAMIRANJE'),
(816, 'SISTEMSKA ADMINISTRACIJA'),
(817, 'SIGNALI IN SLIKE'),
(818, 'PREVAJANJE PROGRAMSKIH JEZIKOV'),
(821, 'OSNOVE RAcUNALNISKEGA VIDA'),
(822, 'LOGIcNE STRUKTURE IN SISTEMI'),
(823, 'NAMENSKA PROGRAMSKA OPREMA'),
(825, 'PROGRAMSKI JEZIKI'),
(830, 'PROJEKT 1'),
(966, 'PRAKTIKUM V AVTOMATIKI IN ROBOTIKI'),
(967, 'KOMUNIKACIJE V AVTOMATIKI'),
(974, 'PROJEKT IZ ELEKTRONIKE'),
(977, 'DINAMIKA EES'),
(979, 'NAcRTOVANJE ELEKTROMAGNETNIH NAPRAV'),
(983, 'SERVOSISTEMI I'),
(985, 'PROJEKT IZ TELEKOMUNIKACIJ'),
(986, 'PODJETNISTVO'),
(989, 'MOBILNE TELEKOMUNIKACIJE'),
(990, 'INTERNETNE STORITVE V TELEKOMUNIKACIJAH'),
(992, 'SISTEMI MEHATRONIKE'),
(993, 'HIDRAVLIKA IN PNEVMATIKA'),
(994, 'PROJEKT 3'),
(999, 'SENZORSKA TEHNIKA II'),
(1005, 'RAZSVETLJAVA'),
(1006, 'MOBILNE KOMUNIKACIJE'),
(1008, 'EKONOMIJA MEDIJEV'),
(1009, 'MEDIJSKA ETIKA'),
(1010, 'PRAKTIKUM: SPLETNI SISTEMI IN VSEBINE'),
(1011, 'TUJI JEZIK III-ANGLESKI JEZIK'),
(1012, 'PRAKTIKUM, GRAFIcNO SNOVANJE IN OBLIKOVANJE II'),
(1014, 'VODENJE PROJEKTOV'),
(1015, 'STATISTIKA'),
(1016, 'PRAKTIKUM III'),
(1018, 'SPLETNE TEHNOLOGIJE IN OZNAcEVALNI JEZIKI'),
(1019, 'DINAMIcNE SPLETNE RESITVE'),
(1020, 'INFORMACIJSKI PROCESI IN KOMUNICIRANJE Z UPORABNIKI'),
(1021, 'OKOLJA ZA RAZVOJ IS'),
(1022, 'ALGORITMI V RAcUNALNISKI PRAKSI'),
(1023, 'RAcUNALNISKA OMREZJA'),
(1024, 'VODENJE, INOVATIVNOST IN PRENOS ZNANJA'),
(1025, 'SOCIOLOSKI IN POKLICNI VIDIKI'),
(1027, 'PRAKTIKUM'),
(1028, 'UVOD V RAcUNALNISKI VID IN RAZPOZNAVANJE'),
(1032, 'PRAKTIcNO USPOSABLJANJE'),
(1033, 'DIPLOMSKO DELO'),
(1034, 'DIPLOMSKO DELO'),
(1035, 'DIPLOMSKO DELO'),
(1037, 'DIPLOMSKO DELO'),
(1038, 'DIPLOMSKO DELO'),
(1040, 'PRAKTIcNO USPOSABLJANJE'),
(1041, 'DIPLOMSKO DELO'),
(1042, 'DIPLOMSKO DELO'),
(1043, 'PRAKTIcNO USPOSABLJANJE'),
(1044, 'DIPLOMSKO DELO'),
(1046, 'DIPLOMSKO DELO'),
(1047, 'OSNOVE FINANC'),
(1051, 'VIRTUALNO MODELIRANJE IZDELKOV'),
(1054, 'SENZORSKI SISTEMI'),
(1055, 'AVTOMATIZACIJA PROIZVODNIH POSTOPKOV'),
(1056, 'SNOVANJE SISTEMOV VODENJA'),
(1057, 'SISTEMI DALJINSKEGA VODENJA'),
(1059, 'MIKROPROCESORSKI SISTEMI'),
(1060, 'NAcRTOVANJE MIKROELEKTRONSKIH VEZIJ'),
(1061, 'PODATKOVNE IN RAcUNALNISKE KOMUNIKACIJE'),
(1062, 'NAcRTOVANJE DIGITALNIH SISTEMOV Z VHDL'),
(1063, 'MOBILNI IN VSEPRISOTNI ELEKTRONSKI SISTEMI'),
(1064, 'MODELIRANJE IN VODENJE ELEKTROMEHANSKIH SISTEMOV'),
(1065, 'ELEKTRIcNI STROJI'),
(1066, 'MATERIALI S POSEBNIMI LASTNOSTMI IN POJAVI'),
(1067, 'IZBRANA POGLAVJA IZ ELEKTROTEHNIKE'),
(1069, 'INTELIGENTNE REGULACIJSKE TEHNIKE V MEHATRONIKI'),
(1070, 'RAcUNALNISKA OBDELAVA SIGNALOV IN SLIK'),
(1071, 'OSNOVE BIOINFORMATIKE'),
(1072, 'POMENSKO IN STORITVENO USMERJENI SPLET'),
(1073, 'INTELIGENTNI SISTEMI'),
(1074, 'POVEZLJIVI SISTEMI IN INTELIGENTNE STORITVE'),
(1075, 'KVALITETA PROGRAMSKE OPREME'),
(1076, 'PRINCIPI GEOGRAFSKIH INFORMACIJSKIH SISTEMOV'),
(1078, 'NEVRO, NANO IN KVANTNO RAcUNALNISTVO'),
(1079, 'SIROKOPASOVNA OMREZJA IN PROTOKOLI'),
(1080, 'SNOVANJE TELEKOMUNIKACIJSKIH STORITEV'),
(1085, 'UPRAVLJANJE POSLOVNIH PROCESOV'),
(1086, 'ELEKTRONSKO POSLOVANJE'),
(1087, 'CELOVITE INFORMACIJSKE RESITVE'),
(1088, 'SIMULACIJE IN OPERACIJSKE RAZISKAVE'),
(1090, 'TEHNOLOGIJE RAZVOJA INTELIGENTNIH RESITEV'),
(1091, 'POSLOVNA INTELIGENCA'),
(1092, 'KAKOVOST PODATKOV'),
(1093, 'IT PLATFORME IN ARHITEKTURE'),
(1094, 'ARHITEKTURNI VZORCI'),
(1095, 'TEHNOLOGIJE ZA VSEPRISOTNE APLIKACIJE'),
(1096, 'SPLETNE TEHNOLOGIJE'),
(1098, 'KRMILNA TEHNIKA'),
(1099, 'DIGITALNI SIGNALNI KRMILNIKI V AVTOMATIKI'),
(1102, 'OBRATOVANJE ELEKTROENERGETSKIH SISTEMOV'),
(1103, 'PERSONALIZACIJA IN TEHNOLOGIJE SEMANTIcNEGA SPLETA'),
(1104, 'TERMINALSKA OPREMA'),
(1105, 'MEDNARODNO IN MEDKULTURNO KOMUNICIRANJE'),
(1106, 'ORGANIZACIJA TELEVIZIJSKE PRODUKCIJE'),
(1107, 'VIZUALNA KULTURA'),
(1108, 'MANAGEMENT PROGRAMOV IN PROJEKTOV'),
(1109, 'KOMUNICIRANJE, MOTIVIRANJE IN RESEVANJE KONFLIKTOV'),
(1115, 'NAPREDNI TEHNOLOSKI SISTEMI'),
(1116, 'SISTEMSKO PROJEKTIRANJE IN KONSTRUIRANJE'),
(1120, 'KONCEPTI IN MODELI MEDIJEV V INFORMACIJSKI DRUZBI'),
(1121, 'NAcRTOVANJE TISKANIH VEZIJ IN ELEKTROMAGNETNA ZDRUZLJIVOST'),
(1127, 'MEDIJI IN POPULARNA KULTURA'),
(1191, 'NAPAJALNI VIRI V ELEKTRONIKI'),
(1194, 'APLIKACIJE RAcUNALNISKIH ALGORITMOV'),
(1201, 'MAGISTRSKO DELO'),
(1203, 'MAGISTRSKO DELO'),
(1204, 'PRINCIPI OPERACIJSKIH SISTEMOV'),
(1205, 'MATEMATIKA V RAcUNALNISTVU'),
(1206, 'MAGISTRSKO DELO'),
(1207, 'EMPIRIcNE RAZISKOVALNE METODE'),
(1208, 'MAGISTRSKO DELO'),
(1210, 'KOMUNIKACIJSKA INTEGRIRANA VEZJA'),
(1211, 'MAGISTRSKO DELO'),
(1212, 'MAGISTRSKO DELO'),
(1213, 'MAGISTRSKO DELO'),
(1217, 'SISTEMI VIRTUALNEGA INZENIRINGA'),
(1218, 'MEHATRONSKI KRMILNI IN SERVO SISTEMI'),
(1219, 'VIRTUALNI OBDELOVALNI SISTEMI'),
(1220, 'CESTNA IN TIRNA VOZILA'),
(1221, 'MODELIRANJE DINAMIcNIH SISTEMOV'),
(1224, 'RAZVOJ IZDELKA'),
(1226, 'OBNOVLJIVI VIRI ENERGIJE'),
(1228, 'INTERAKTIVNE 3D VSEBINE ZA SVETOVNI SPLET'),
(1237, 'APLIKACIJSKI STREZNIKI'),
(1240, 'PSIHOLOGIJA VIZUALNIH KOMUNIKACIJ'),
(1248, 'MATEMATIKA ZA INZENIRJE 2'),
(1249, 'STROJNI ELEMENTI'),
(1250, 'TEHNISKA MEHANIKA ZA MEHATRONIKE'),
(1256, 'KRMILNA TEHNIKA'),
(1258, 'NAcRTOVANJE ELEKTRONSKIH SISTEMOV'),
(1259, 'PROGRAMSKI VZORCI'),
(1260, 'PRIPRAVA MEDIJSKIH VSEBIN'),
(1261, 'INTELIGENTNI SISTEMI V AVTOMATIKI'),
(1264, 'MEDIJI V DRUZBI'),
(1265, 'STRATESKI MANAGEMENT cLOVESKIH VIROV'),
(1266, 'MEDNARODNA EKONOMIKA II'),
(1268, 'SISTEMSKA ADMINISTRACIJA'),
(1269, 'ALGORITMI RAcUNALNISKE GEOMETRIJE'),
(1270, 'MATEMATIcNE OSNOVE VODENJA SISTEMOV'),
(1271, 'JEZIKOVNE TEHNOLOGIJE'),
(1272, 'TUJI JEZIK III - NEMSKI JEZIK'),
(1273, 'PROJEKT II'),
(1274, 'PRILAGODLJIVI OBDELOVALNI SISTEMI'),
(1275, 'VZDRZEVANJE MEHATRONSKIH SISTEMOV');

-- --------------------------------------------------------

--
-- Struktura tabele `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL,
  `sifra` int(11) NOT NULL,
  `priimek_ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `habilitacija` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priimek` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `profesor`
--

INSERT INTO `profesor` (`id`, `sifra`, `priimek_ime`, `naziv`, `habilitacija`, `email`, `priimek`, `ime`) VALUES
(9914, 10005, 'BABIC RUDOLF', 'dr.', 'izr. prof.', 'rudolf.babic@uni-mb.si', 'BABIC', 'RUDOLF'),
(9915, 10007, 'URAN SUZANA', 'dr.', 'doc.', 'suzana.uran@uni-mb.si', 'URAN', 'SUZANA'),
(9916, 10008, 'BONACIĆ DAVOR', 'mag.', 'viS. pred.', 'bonacic@uni-mb.si', 'BONACIĆ', 'DAVOR'),
(9925, 10031, 'MATKO VOJKO', 'dr.', 'izr. prof.', 'vojko.matko@um.si', 'MATKO', 'VOJKO'),
(9928, 10036, 'CURK BORIS', 'dr.', 'doc.', 'boris.curk@uni-mb.si', 'CURK', 'BORIS'),
(9930, 10039, 'HORVAT BOGOMIR', 'dr.', 'red. prof.', 'bogo.horvat@uni-mb.si', 'HORVAT', 'BOGOMIR'),
(9932, 10042, 'KEZMAH BOSTJAN', 'mag.', 'viS. pred.', 'bostjan.kezmah@uni-mb.si', 'KEZMAH', 'BOSTJAN'),
(9933, 10043, 'KLAJNSEK GREGOR', 'dr.', 'doc.', 'gregor.klajnsek@uni-mb.si', 'KLAJNSEK', 'GREGOR'),
(9935, 10046, 'JEZERNIK KAREL', 'dr.', 'red. prof.', 'karel.jezernik@uni-mb.si', 'JEZERNIK', 'KAREL'),
(9936, 10048, 'VRBANEC JOSIP', 'mag.', NULL, 'josip.vrbanec@uni-mb.si', 'VRBANEC', 'JOSIP'),
(9943, 10061, 'BREGANT ALBIN', 'mag.', 'asist.', 'albin.bregant@uni-mb.si', 'BREGANT', 'ALBIN'),
(9944, 10062, 'HERCOG DARKO', 'dr.', 'doc.', 'darko.hercog@um.si', 'HERCOG', 'DARKO'),
(9945, 10063, 'KITAK PETER', 'dr.', 'doc.', 'peter.kitak@uni-mb.si', 'KITAK', 'PETER'),
(9947, 10066, 'KUMPERSCAK VITODRAG', 'dr.', 'red. prof.', 'vito.kumperscak@uni-mb.si', 'KUMPERSCAK', 'VITODRAG'),
(9948, 10067, 'KUTNJAK MILAN', 'mag.', 'viS. pred.', 'milan.kutnjak@uni-mb.si', 'KUTNJAK', 'MILAN'),
(9951, 10071, 'ANGLEITNER GERHARD', 'mag.', NULL, 'gerhard.angleitner@uni-mb.si', 'ANGLEITNER', 'GERHARD'),
(9952, 100161, 'TERBUC MARTIN', 'dr.', NULL, 'martin.terbuc@uni-mb.si', 'TERBUC', 'MARTIN'),
(9953, 10079, 'MIKOLA LADISLAV', 'mag.', 'viS. pred.', 'ladislav.mikola@uni-mb.si', 'MIKOLA', 'LADISLAV'),
(9955, 10083, 'KACIC ZDRAVKO', 'dr.', 'red. prof.', 'zdravko.kacic@um.si', 'KACIC', 'ZDRAVKO'),
(9961, 10101, 'ZAGRADISNIK IVAN', 'dr.', 'red. prof.', 'ivan.zagradisnik@uni-mb.si', 'ZAGRADISNIK', 'IVAN'),
(9962, 10106, 'DOLINAR DRAGO', 'dr.', 'red. prof.', 'dolinar@uni-mb.si', 'DOLINAR', 'DRAGO'),
(9963, 10109, 'WELZER DRUZOVEC TATJANA', 'dr.', 'red. prof.', 'tatjana.welzer@um.si', 'WELZER DRUZOVEC', 'TATJANA'),
(9966, 10117, 'OJSTERSEK MILAN', 'dr.', 'izr. prof.', 'ojstersek@uni-mb.si', 'OJSTERSEK', 'MILAN'),
(9969, 10130, 'TOVORNIK BORIS', 'dr.', 'izr. prof.', 'boris.tovornik@uni-mb.si', 'TOVORNIK', 'BORIS'),
(9970, 10132, 'VORSIC JOSIP', 'dr.', 'red. prof.', 'vorsic@uni-mb.si', 'VORSIC', 'JOSIP'),
(9972, 10145, 'ZUMER VILJEM', 'dr.', 'red. prof.', 'zumer@uni-mb.si', 'ZUMER', 'VILJEM'),
(9977, 10161, 'HARNIK JOZE', NULL, NULL, 'joze.harnik@uni-mb.si', 'HARNIK', 'JOZE'),
(9978, 10163, 'TRLEP MLADEN', 'dr.', 'red. prof.', 'mladen.trlep@uni-mb.si', 'TRLEP', 'MLADEN'),
(9979, 10167, 'TICAR IGOR', 'dr.', 'red. prof.', 'ticar@uni-mb.si', 'TICAR', 'IGOR'),
(9980, 10175, 'MILANOVIC MIRO', 'dr.', 'red. prof.', 'miro.milanovic@um.si', 'MILANOVIC', 'MIRO'),
(9983, 10188, 'ROZMAN IVAN', 'dr.', 'red. prof.', 'i.rozman@uni-mb.si', 'ROZMAN', 'IVAN'),
(9990, 10208, 'CAFUTA PETER', 'dr.', 'doc.', 'peter.cafuta@uni-mb.si', 'CAFUTA', 'PETER'),
(9992, 10214, 'DOGSA TOMAZ', 'dr.', 'doc.', 'tdogsa@uni-mb.si', 'DOGSA', 'TOMAZ'),
(9996, 10227, 'NOVAK BOJAN', 'dr.', 'viS. pred.', 'novakb@uni-mb.si', 'NOVAK', 'BOJAN'),
(9998, 10232, 'GRCAR BOJAN', 'dr.', 'red. prof.', 'bojan.grcar@uni-mb.si', 'GRCAR', 'BOJAN'),
(10000, 10235, 'GUID NIKOLA', 'dr.', 'red. prof.', 'guid@uni-mb.si', 'GUID', 'NIKOLA'),
(10001, 10236, 'ALATIC BOJAN', 'mag.', NULL, 'bojan.alatic@uni-mb.si', 'ALATIC', 'BOJAN'),
(10012, 10269, 'COLNARIC MATJAZ', 'dr.', 'red. prof.', 'colnaric@uni-mb.si', 'COLNARIC', 'MATJAZ'),
(10015, 10277, 'JURKOVIC FRANC', 'dr.', 'viS. pred.', 'franc.jurkovic@uni-mb.si', 'JURKOVIC', 'FRANC'),
(10017, 10279, 'POGORELC JANEZ', 'mag.', 'viS. pred.', 'janez.pogorelc@uni-mb.si', 'POGORELC', 'JANEZ'),
(10026, 10305, 'GYÖRKÖS JOZSEF', 'dr.', 'red. prof.', 'jozsef.gyorkos@uni-mb.si', 'GYÖRKÖS', 'JOZSEF'),
(10027, 10309, 'CUCEJ ZARKO', 'dr.', 'red. prof.', 'zarko.cucej@uni-mb.si', 'CUCEJ', 'ZARKO'),
(10032, 10321, 'SVECKO RAJKO', 'dr.', 'izr. prof.', 'rajko.svecko@uni-mb.si', 'SVECKO', 'RAJKO'),
(10035, 10331, 'CURKOVIC MILAN', 'mag.', NULL, 'milan.curkovic@uni-mb.si', 'CURKOVIC', 'MILAN'),
(10036, 10332, 'SOLAR MITJA', 'dr.', 'viS. pred.', 'mitja.solar@uni-mb.si', 'SOLAR', 'MITJA'),
(10037, 10333, 'BREZOCNIK ZMAGO', 'dr.', 'red. prof.', 'brezocnik@uni-mb.si', 'BREZOCNIK', 'ZMAGO'),
(10039, 10336, 'HAMLER ANTON', 'dr.', 'red. prof.', 'anton.hamler@uni-mb.si', 'HAMLER', 'ANTON'),
(10045, 10357, 'ZALIK BORUT', 'dr.', 'red. prof.', 'borut.zalik@um.si', 'ZALIK', 'BORUT'),
(10049, 10364, 'SAFARIC RIKO', 'dr.', 'red. prof.', 'riko.safaric@uni-mb.si', 'SAFARIC', 'RIKO'),
(10051, 10369, 'TEZAK OTO', 'dr.', NULL, 'tezak@uni-mb.si', 'TEZAK', 'OTO'),
(10052, 10371, 'PLANINSIC PETER', 'dr.', 'izr. prof.', 'peter.planinsic@uni-mb.si', 'PLANINSIC', 'PETER'),
(10056, 10390, 'LOGAR MARJAN', 'dr.', 'doc.', 'marjan.logar@uni-mb.si', 'LOGAR', 'MARJAN'),
(10057, 10391, 'LESNJAK GORAZD', 'dr.', 'izr. prof.', 'gorazd.lesnjak@uni-mb.si', 'LESNJAK', 'GORAZD'),
(10060, 10409, 'RITONJA JOZEF', 'dr.', 'izr. prof.', 'joze.ritonja@uni-mb.si', 'RITONJA', 'JOZEF'),
(10061, 10421, 'MERNIK MARJAN', 'dr.', 'red. prof.', 'marjan.mernik@uni-mb.si', 'MERNIK', 'MARJAN'),
(10062, 10422, 'DEBEVC MATJAZ', 'dr.', 'izr. prof.', 'matjaz.debevc@um.si', 'DEBEVC', 'MATJAZ'),
(10066, 10438, 'PETEK TATJANA', 'dr.', 'izr. prof.', 'tatjana.petek@uni-mb.si', 'PETEK', 'TATJANA'),
(10068, 10447, 'DUGONIK BOGDAN', 'dr.', 'viS. pred.', 'bogdan.dugonik@uni-mb.si', 'DUGONIK', 'BOGDAN'),
(10070, 10452, 'DRUZOVEC MARJAN', 'dr.', 'izr. prof.', 'marjan.druzovec@uni-mb.si', 'DRUZOVEC', 'MARJAN'),
(10073, 10456, 'ZAZULA DAMJAN', 'dr.', 'red. prof.', 'zazula@uni-mb.si', 'ZAZULA', 'DAMJAN'),
(10077, 10465, 'VERBER DOMEN', 'dr.', 'doc.', 'domen.verber@uni-mb.si', 'VERBER', 'DOMEN'),
(10081, 10476, 'KAPUS TATJANA', 'dr.', 'red. prof.', 'tatjana.kapus@um.si', 'KAPUS', 'TATJANA'),
(10085, 10490, 'PIHLER JOZE', 'dr.', 'red. prof.', 'joze.pihler@uni-mb.si', 'PIHLER', 'JOZE'),
(10090, 10615, 'JAKL FRANC', NULL, 'izr. prof.', 'franc.jakl@uni-mb.si', 'JAKL', 'FRANC'),
(10095, 10725, 'GAMS MATJAZ', NULL, NULL, 'matjaz.gams@uni-mb.si', 'GAMS', 'MATJAZ'),
(10096, 10843, 'ZUNKO PETER', 'dr.', NULL, NULL, 'ZUNKO', 'PETER'),
(10097, 11031, 'KRISPER MARJAN', 'dr.', NULL, NULL, 'KRISPER', 'MARJAN'),
(10098, 11038, 'LEP JOZE', NULL, NULL, NULL, 'LEP', 'JOZE'),
(10100, 11138, 'JENUS VLADIMIR', 'mag.', 'pred.', 'vladimir.jenus@telekom.si', 'JENUS', 'VLADIMIR'),
(10107, 11809, 'DOBNIKAR ANDREJ', NULL, NULL, 'andrej.dobnikar@uni-mb.si', 'DOBNIKAR', 'ANDREJ'),
(10109, 11995, 'JAGODIC MARKO', 'dr.', NULL, 'marko.jagodic@uni-mb.si', 'JAGODIC', 'MARKO'),
(10117, 12423, 'STIGLIC BRUNO', NULL, NULL, 'bruno.stiglic@uni-mb.si', 'STIGLIC', 'BRUNO'),
(10122, 12511, 'KAPUS-KOLAR MONIKA', NULL, NULL, NULL, 'KAPUS-KOLAR', 'MONIKA'),
(10129, 12840, 'STRMCNIK STANKO', NULL, NULL, NULL, 'STRMCNIK', 'STANKO'),
(10131, 12858, 'ĐONLAGIĆ DALI', NULL, NULL, NULL, 'ĐONLAGIĆ', 'DALI'),
(10134, 13116, 'CRNJAC ANTE', NULL, NULL, NULL, 'CRNJAC', 'ANTE'),
(10153, 13415, 'LENIC MITJA', 'dr.', 'asist.', 'mitja.lenic@uni-mb.si', 'LENIC', 'MITJA'),
(10161, 13475, 'DUHOVNIK JANEZ', NULL, NULL, NULL, 'DUHOVNIK', 'JANEZ'),
(10165, 13534, 'PERNUS FRANJO', NULL, NULL, NULL, 'PERNUS', 'FRANJO'),
(10166, 13557, 'ZUNKOVIC MATEJ', NULL, NULL, NULL, 'ZUNKOVIC', 'MATEJ'),
(10168, 13564, 'CREPINSEK MATEJ', 'dr.', 'doc.', 'matej.crepinsek@uni-mb.si', 'CREPINSEK', 'MATEJ'),
(10170, 13573, 'ROZMAN TOMISLAV', 'dr.', NULL, 'tomi.rozman@uni-mb.si', 'ROZMAN', 'TOMISLAV'),
(10172, 13598, 'BESTER JANEZ', NULL, NULL, NULL, 'BESTER', 'JANEZ'),
(10177, 16241, 'NOVAK FRANC', 'dr.', 'red. prof.', 'franc.novak@uni-mb.si', 'NOVAK', 'FRANC'),
(10184, 13696, 'HERIC DUSAN', 'dr.', 'doc.', 'dusan.heric@uni-mb.si', 'HERIC', 'DUSAN'),
(10189, 13719, 'PLOJ BOJAN', NULL, NULL, 'bojan.ploj@uni-mb.si', 'PLOJ', 'BOJAN'),
(10194, 13754, 'KOSAR TOMAZ', 'dr.', 'doc.', 'tomaz.kosar@uni-mb.si', 'KOSAR', 'TOMAZ'),
(10195, 13755, 'POLANCIC GREGOR', 'dr.', 'doc.', 'gregor.polancic@um.si', 'POLANCIC', 'GREGOR'),
(10198, 13778, 'BRUMEC MILAN', NULL, NULL, NULL, 'BRUMEC', 'MILAN'),
(10200, 13808, 'DONCARLI CHRISTIAN', NULL, NULL, NULL, 'DONCARLI', 'CHRISTIAN'),
(10202, 13858, 'KONONENKO IGOR', NULL, NULL, NULL, 'KONONENKO', 'IGOR'),
(10213, 13992, 'FILIPIC BOGDAN', NULL, NULL, NULL, 'FILIPIC', 'BOGDAN'),
(10229, 15009, 'ORGULAN ANDREJ', 'mag.', 'viS. pred.', 'andrej.orgulan@um.si', 'ORGULAN', 'ANDREJ'),
(10230, 15010, 'STUMBERGER GORAZD', 'dr.', 'red. prof.', 'gorazd.stumberger@uni-mb.si', 'STUMBERGER', 'GORAZD'),
(10234, 15020, 'MIHALIC FRANC', 'dr.', 'izr. prof.', 'fero@uni-mb.si', 'MIHALIC', 'FRANC'),
(10235, 15023, 'HERICKO MARJAN', 'dr.', 'red. prof.', 'marjan.hericko@uni-mb.si', 'HERICKO', 'MARJAN'),
(10236, 15024, 'HORVAT MIRAN', 'mag.', NULL, NULL, 'HORVAT', 'MIRAN'),
(10238, 15035, 'KORZE DANILO', 'dr.', 'doc.', 'danilo.korze@um.si', 'KORZE', 'DANILO'),
(10241, 15047, 'MUSKINJA NENAD', 'dr.', 'izr. prof.', 'nenad.muskinja@uni-mb.si', 'MUSKINJA', 'NENAD'),
(10245, 15057, 'VAJDE HORVAT ROMANA', 'dr.', 'doc.', 'romana.vajde@uni-mb.si', 'VAJDE HORVAT', 'ROMANA'),
(10246, 15061, 'GOLOB MARJAN', 'dr.', 'izr. prof.', 'marjan.golob@um.si', 'GOLOB', 'MARJAN'),
(10247, 15065, 'BALAN FILIP SAMO', 'mag.', NULL, 'balan@uni-mb.si', 'BALAN FILIP', 'SAMO'),
(10248, 15069, 'HREN ALENKA', 'dr.', 'doc.', 'alenka.hren@uni-mb.si', 'HREN', 'ALENKA'),
(10249, 15070, 'MOHORKO JOZE', 'dr.', 'doc.', 'mohorko@uni-mb.si', 'MOHORKO', 'JOZE'),
(10255, 15082, 'SLEMNIK BOJAN', 'mag.', NULL, 'bojan.slemnik@uni-mb.si', 'SLEMNIK', 'BOJAN'),
(10260, 15104, 'LIPNIK GORAZD', NULL, NULL, NULL, 'LIPNIK', 'GORAZD'),
(10268, 15137, 'JESENIK MARKO', 'dr.', 'doc.', 'jesenik@uni-mb.si', 'JESENIK', 'MARKO'),
(10273, 15148, 'KVAS ALEKSANDER', 'mag.', NULL, 'aleksander.kvas@uni-mb.si', 'KVAS', 'ALEKSANDER'),
(10278, 15161, 'JARC BOJAN', 'dr.', 'doc.', 'bojan.jarc@uni-mb.si', 'JARC', 'BOJAN'),
(10281, 15171, 'GERGIC BOJAN', 'dr.', 'doc.', 'bojan.gergic@uni-mb.si', 'GERGIC', 'BOJAN'),
(10284, 15180, 'KOROSEC DEAN', 'dr.', 'pred.', 'dean.korosec@uni-mb.si', 'KOROSEC', 'DEAN'),
(10292, 15198, 'BREST JANEZ', 'dr.', 'red. prof.', 'janez.brest@uni-mb.si', 'BREST', 'JANEZ'),
(10301, 15216, 'STERGAR JANEZ', 'dr.', 'doc.', 'janez.stergar@uni-mb.si', 'STERGAR', 'JANEZ'),
(10303, 15221, 'ĐONLAGIĆ DENIS', 'ddr.', 'red. prof.', 'ddonlagic@uni-mb.si', 'ĐONLAGIĆ', 'DENIS'),
(10307, 15234, 'DUH ANDREJ', 'dr.', NULL, 'andrej.duh@uni-mb.si', 'DUH', 'ANDREJ'),
(10308, 15235, 'ZIVKOVIC ALES', 'dr.', 'izr. prof.', 'ales.zivkovic@uni-mb.si', 'ZIVKOVIC', 'ALES'),
(10310, 15239, 'HACE ALES', 'dr.', 'izr. prof.', 'ales.hace@uni-mb.si', 'HACE', 'ALES'),
(10314, 15248, 'HLEB BABIC SPELA', 'dr.', NULL, NULL, 'HLEB BABIC', 'SPELA'),
(10317, 15254, 'CHOWDHURY AMER UL HAQUE', 'dr.', 'asist.', 'amor.chowdhury@uni-mb.si', 'CHOWDHURY', 'AMER UL HAQUE'),
(10318, 15261, 'KUZMA BOJAN', 'dr.', NULL, 'bojan.kuzma@uni-mb.si', 'KUZMA', 'BOJAN'),
(10324, 15278, 'KORITNIK DARKO', 'mag.', NULL, 'darko.koritnik@icem-tc.si', 'KORITNIK', 'DARKO'),
(10332, 15293, 'POTOCNIK BOZIDAR', 'dr.', 'izr. prof.', 'bozo.potocnik@uni-mb.si', 'POTOCNIK', 'BOZIDAR'),
(10333, 15294, 'PODGORELEC DAVID', 'dr.', 'doc.', 'david.podgorelec@uni-mb.si', 'PODGORELEC', 'DAVID'),
(10335, 15299, 'MAZI LESKOVAR DARJA', 'dr.', 'izr. prof.', 'darja.leskovar@uni-mb.si', 'MAZI LESKOVAR', 'DARJA'),
(10336, 15301, 'PODGORELEC VILI', 'dr.', 'red. prof.', 'vili.podgorelec@uni-mb.si', 'PODGORELEC', 'VILI'),
(10337, 15302, 'KOLMANIC SIMON', 'dr.', 'viS. pred.', 'simon.kolmanic@uni-mb.si', 'KOLMANIC', 'SIMON'),
(10338, 15304, 'HANZIC ANDREJ', 'mag.', NULL, 'andrej.hanzic@uni-mb.si', 'HANZIC', 'ANDREJ'),
(10340, 15310, 'GAJZER MATEJ', 'mag.', NULL, 'matej.gajzer@uni-mb.si', 'GAJZER', 'MATEJ'),
(10343, 15317, 'URLEP EVGEN', 'dr.', 'asist.', 'evgen.urlep@uni-mb.si', 'URLEP', 'EVGEN'),
(10344, 15318, 'BRUMEN BOSTJAN', 'dr.', 'doc.', 'bostjan.brumen@um.si', 'BRUMEN', 'BOSTJAN'),
(10346, 15327, 'KRUSEC ROBERT', NULL, NULL, 'robert.krusec@uni-mb.si', 'KRUSEC', 'ROBERT'),
(10354, 15342, 'RATEJ BORIS', NULL, NULL, 'boris.ratej@uni-mb.si', 'RATEJ', 'BORIS'),
(10355, 15344, 'OSEBIK DAVORIN', 'dr.', NULL, 'davorin.osebik@uni-mb.si', 'OSEBIK', 'DAVORIN'),
(10360, 15350, 'ZORMAN MILAN', 'dr.', 'red. prof.', 'milan.zorman@uni-mb.si', 'ZORMAN', 'MILAN'),
(10362, 15359, 'MEOLIC ROBERT', 'dr.', 'doc.', 'meolic@uni-mb.si', 'MEOLIC', 'ROBERT'),
(10363, 15361, 'RODIC MIRAN', 'dr.', 'doc.', 'miran.rodic@uni-mb.si', 'RODIC', 'MIRAN'),
(10364, 15365, 'BELOGLAVEC SIMON', NULL, NULL, 'simon.beloglavec@uni-mb.si', 'BELOGLAVEC', 'SIMON'),
(10365, 15367, 'SALAMON MATEJ', 'dr.', 'doc.', 'matej.salamon@uni-mb.si', 'SALAMON', 'MATEJ'),
(10369, 15372, 'SEPESY MAUCEC MIRJAM', 'dr.', 'izr. prof.', 'mirjam.sepesy@uni-mb.si', 'SEPESY MAUCEC', 'MIRJAM'),
(10370, 15373, 'ROJKO ANDREJA', 'dr.', 'doc.', 'andreja.rojko@uni-mb.si', 'ROJKO', 'ANDREJA'),
(10373, 15377, 'ROJC MATEJ', 'dr.', 'izr. prof.', 'matej.rojc@uni-mb.si', 'ROJC', 'MATEJ'),
(10374, 15378, 'KRAMBERGER IZTOK', 'dr.', 'doc.', 'iztok.kramberger@um.si', 'KRAMBERGER', 'IZTOK'),
(10375, 15379, 'STRNAD DAMJAN', 'dr.', 'izr. prof.', 'damjan.strnad@uni-mb.si', 'STRNAD', 'DAMJAN'),
(10382, 15397, 'BIZJAK BORIS', 'mag.', 'viS. pred.', 'boris.bizjak@uni-mb.si', 'BIZJAK', 'BORIS'),
(10385, 15403, 'POLAJZER BOSTJAN', 'dr.', 'izr. prof.', 'bostjan.polajzer@uni-mb.si', 'POLAJZER', 'BOSTJAN'),
(10389, 15409, 'GOMBOSI MATEJ', 'dr.', 'doc.', 'matej.gombosi@uni-mb.si', 'GOMBOSI', 'MATEJ'),
(10391, 15413, 'LESKOVAR ROBERT', NULL, NULL, NULL, 'LESKOVAR', 'ROBERT'),
(10399, 15426, 'PETERIN IZTOK', 'dr.', 'izr. prof.', 'iztok.peterin@uni-mb.si', 'PETERIN', 'IZTOK'),
(10411, 15452, 'EDELBAHER GREGOR', 'dr.', NULL, 'gregor.edelbaher@uni-mb.si', 'EDELBAHER', 'GREGOR'),
(10413, 15466, 'STRNAD JASNA', 'mag.', 'asist.', 'jasna.strnad@uni-mb.si', 'STRNAD', 'JASNA'),
(10419, 15479, 'ZGANK ANDREJ', 'dr.', 'izr. prof.', 'andrej.zgank@uni-mb.si', 'ZGANK', 'ANDREJ'),
(10420, 15480, 'GORENJAK BORUT', 'mag.', NULL, 'borut.gorenjak@uni-mb.si', 'GORENJAK', 'BORUT'),
(10421, 15481, 'CIGALE BORIS', 'dr.', 'doc.', 'boris.cigale@uni-mb.si', 'CIGALE', 'BORIS'),
(10422, 15482, 'REBERNAK DAMIJAN', 'dr.', NULL, 'damijan.rebernak@uni-mb.si', 'REBERNAK', 'DAMIJAN'),
(10423, 15483, 'CAJIĆ ZLATKO', NULL, NULL, 'zlatko.cajic@uni-mb.si', 'CAJIĆ', 'ZLATKO'),
(10427, 15489, 'GOLOB IZIDOR', 'dr.', NULL, 'izidor.golob@uni-mb.si', 'GOLOB', 'IZIDOR'),
(10428, 15492, 'VLAOVIC BOSTJAN', 'dr.', 'doc.', 'bostjan.vlaovic@uni-mb.si', 'VLAOVIC', 'BOSTJAN'),
(10429, 15493, 'BREGAR ANDREJ', 'dr.', NULL, 'andrej.bregar@uni-mb.si', 'BREGAR', 'ANDREJ'),
(10430, 15494, 'SPROGAR MATEJ', 'dr.', 'doc.', 'matej.sprogar@uni-mb.si', 'SPROGAR', 'MATEJ'),
(10440, 15510, 'BRESAR FRANC', 'dr.', NULL, NULL, 'BRESAR', 'FRANC'),
(10442, 15512, 'BOSKOVIĆ BORKO', 'dr.', 'doc.', 'borko.boskovic@uni-mb.si', 'BOSKOVIĆ', 'BORKO'),
(10443, 15513, 'SUMAK BOSTJAN', 'dr.', 'doc.', 'bostjan.sumak@uni-mb.si', 'SUMAK', 'BOSTJAN'),
(10447, 15526, 'GLEICH DUSAN', 'dr.', 'izr. prof.', 'dusan.gleich@uni-mb.si', 'GLEICH', 'DUSAN'),
(10457, 15545, 'DIVJAK MATJAZ', 'dr.', 'asist.', 'matjaz.divjak@uni-mb.si', 'DIVJAK', 'MATJAZ'),
(10458, 15546, 'SCHAFF ERVIN', 'mag.', NULL, 'schaff@uni-mb.si', 'SCHAFF', 'ERVIN'),
(10459, 15547, 'TEPEH ALEKSANDRA', 'dr.', 'doc.', 'aleksandra.tepeh@uni-mb.si', 'TEPEH', 'ALEKSANDRA'),
(10463, 15552, 'VLAJ DAMJAN', 'dr.', 'doc.', 'damjan.vlaj@uni-mb.si', 'VLAJ', 'DAMJAN'),
(10468, 15568, 'CIBULA EDVARD', 'dr.', 'doc.', 'edvard.cibula@uni-mb.si', 'CIBULA', 'EDVARD'),
(10469, 15570, 'KRIVOGRAD SEBASTIAN', 'dr.', 'doc.', 'sebastian.krivograd@uni-mb.si', 'KRIVOGRAD', 'SEBASTIAN'),
(10470, 15571, 'ROTOVNIK TOMAZ', 'dr.', 'doc.', 'tomaz.rotovnik@uni-mb.si', 'ROTOVNIK', 'TOMAZ'),
(10471, 15573, 'HORVAT BRANKO', 'mag.', NULL, 'branko.horvat@uni-mb.si', 'HORVAT', 'BRANKO'),
(10472, 15574, 'HOLOBAR ALES', 'dr.', 'izr. prof.', 'ales.holobar@uni-mb.si', 'HOLOBAR', 'ALES'),
(10473, 15575, 'VICMAN PETER', NULL, NULL, 'peter.vicman@uni-mb.si', 'VICMAN', 'PETER'),
(10482, 15647, 'RIBIC JANEZ', 'dr.', 'asist.', 'janez.ribic@um.si', 'RIBIC', 'JANEZ'),
(10484, 15654, 'PUSNIK MAJA', NULL, 'asist.', 'maja.pusnik@uni-mb.si', 'PUSNIK', 'MAJA'),
(10485, 15658, 'UDIR MISIC KATJA', 'mag.', 'asist.', 'katja.udir@uni-mb.si', 'UDIR MISIC', 'KATJA'),
(10487, 15664, 'SINJUR SMILJAN', 'dr.', 'asist.', 'smiljan.sinjur@uni-mb.si', 'SINJUR', 'SMILJAN'),
(10489, 15668, 'GREINER SASO', 'dr.', 'asist.', 'saso.greiner@uni-mb.si', 'GREINER', 'SASO'),
(10490, 15670, 'OSTROVRSNIK ROK', 'mag.', 'asist.', 'rok.ostrovrsnik@uni-mb.si', 'OSTROVRSNIK', 'ROK'),
(10496, 15698, 'KORAK ANDREJ', 'mag.', 'asist.', 'andrej.korak@uni-mb.si', 'KORAK', 'ANDREJ'),
(10502, 15726, 'KAMISALIĆ LATIFIĆ AIDA', NULL, 'asist.', 'aida.kamisalic@uni-mb.si', 'KAMISALIĆ LATIFIĆ', 'AIDA'),
(10505, 15755, 'TEKAVC MARKO', NULL, NULL, 'marko.tekavc@uni-mb.si', 'TEKAVC', 'MARKO'),
(10506, 15759, 'MILETIĆ DEJAN', NULL, NULL, 'dejan.miletic@uni-mb.si', 'MILETIĆ', 'DEJAN'),
(10507, 15763, 'HÖLBL MARKO', 'dr.', 'doc.', 'marko.holbl@um.si', 'HÖLBL', 'MARKO'),
(10508, 15766, 'ZILIC FISER SUZANA', 'dr.', 'doc.', 'suzanazf@uni-mb.si', 'ZILIC FISER', 'SUZANA'),
(10511, 15793, 'ZAJC MELITA', 'dr.', 'doc.', 'melita.zajc@uni-mb.si', 'ZAJC', 'MELITA'),
(10514, 15838, 'LAH BRANKO', NULL, 'uC.Sp.vzgoje', 'branko.lah@uni-mb.si', 'LAH', 'BRANKO'),
(10516, 15847, 'IVANISIN MARKO', 'dr.', 'doc.', 'marko.ivanisin@uni-mb.si', 'IVANISIN', 'MARKO'),
(10517, 15848, 'PAVLIC LUKA', 'dr.', 'asist.', 'luka.pavlic@uni-mb.si', 'PAVLIC', 'LUKA'),
(10518, 15849, 'SARJAS ANDREJ', 'dr.', 'asist.', 'andrej.sarjas@uni-mb.si', 'SARJAS', 'ANDREJ'),
(10521, 15889, 'TOMAZIC TINA', 'dr.', 'asist.', 'tina.tomazic@uni-mb.si', 'TOMAZIC', 'TINA'),
(10522, 15897, 'ISTENIC ROK', 'dr.', 'asist.', 'rok.istenic@uni-mb.si', 'ISTENIC', 'ROK'),
(10523, 16007, 'ARLIC PETER', NULL, NULL, NULL, 'ARLIC', 'PETER'),
(10524, 16008, 'MEDVED ZORAN', 'mag.', 'asist.', NULL, 'MEDVED', 'ZORAN'),
(10525, 16009, 'URBAS UROS', NULL, NULL, NULL, 'URBAS', 'UROS'),
(10526, 16010, 'PETELINSEK ANTON', NULL, NULL, NULL, 'PETELINSEK', 'ANTON'),
(10527, 16011, 'ZIROVNIK CVETKA', 'mag.', NULL, NULL, 'ZIROVNIK', 'CVETKA'),
(10781, 60177, 'COBAL BOGDAN', NULL, NULL, 'bogdan.cobal@gmail.com', 'COBAL', 'BOGDAN'),
(10994, 65034, 'GRUBELNIK VLADIMIR', 'dr.', 'doc.', 'vlado.grubelnik@uni-mb.si', 'GRUBELNIK', 'VLADIMIR'),
(11022, 66073, 'VEBER ZAZULA JASNA', NULL, NULL, 'jasna.veber-zazula@uni-mb.si', 'VEBER ZAZULA', 'JASNA'),
(11083, 70437, 'LAMPE ROK', 'dr.', NULL, 'rok.lampe@uni-mb.si', 'LAMPE', 'ROK'),
(11153, 80312, 'MOCNIK DIJANA', 'dr.', 'izr. prof.', 'dijana.mocnik@um.si', 'MOCNIK', 'DIJANA'),
(11234, 90098, 'POTOCNIK NATASA', 'dr.', 'lekt.', 'natasa.potocnik@um.si', 'POTOCNIK', 'NATASA'),
(11288, 94951, 'KOKOL PETER', 'dr.', 'red. prof.', 'peter.kokol@um.si', 'KOKOL', 'PETER'),
(11400, 10584, 'GOLOB JANVIT', NULL, NULL, NULL, 'GOLOB', 'JANVIT'),
(11446, 13433, 'KANDUS GORAZD', 'dr.', 'red. prof.', 'gorazd.kandus@ijs.si', 'KANDUS', 'GORAZD'),
(11451, 13478, 'VREZE ALEKSANDER', 'dr.', 'doc.', 'aleksander.vreze@uni-mb.si', 'VREZE', 'ALEKSANDER'),
(11480, 13809, 'LUCAS MARIE FRANCOISE', NULL, NULL, NULL, 'LUCAS MARIE', 'FRANCOISE'),
(11494, 15597, 'KREGAR ZORAN', NULL, NULL, 'zoran.kregar@uni-mb.si', 'KREGAR', 'ZORAN'),
(11823, 7286, 'TRONTELJ JANEZ', 'dr', 'red. prof.', NULL, 'TRONTELJ', 'JANEZ'),
(11836, 17679, 'MUZEK VILJEM', 'ing', '', NULL, 'MUZEK', 'VILJEM'),
(12257, 7720, 'PLETERSEK ANTON', 'dr.', NULL, NULL, 'PLETERSEK', 'ANTON'),
(12288, 17693, 'VREG FRANCE', 'dr.', 'zasl. prof.', NULL, 'VREG', 'FRANCE'),
(12337, 16292, 'FISTER IZTOK', 'dr.', 'doc.', 'iztok.fister@uni-mb.si', 'FISTER', 'IZTOK'),
(12338, 17692, 'VOLCIC ZALA', NULL, 'doc.', NULL, 'VOLCIC', 'ZALA'),
(12500, 7963, 'ANDREJEVIC MARK', NULL, NULL, NULL, 'ANDREJEVIC', 'MARK'),
(12655, 10072, 'LESKOVAR FLORIJAN', NULL, NULL, 'florijan.leskovar@uni-mb.si', 'LESKOVAR', 'FLORIJAN'),
(12657, 10133, 'VUTE MILOS', NULL, NULL, 'milos.vute@uni-mb.si', 'VUTE', 'MILOS'),
(12658, 10172, 'LAMPIC STANISLAV', NULL, NULL, 'stanko.lampic@uni-mb.si', 'LAMPIC', 'STANISLAV'),
(12682, 15484, 'LIPUS BOGDAN', 'dr.', 'asist.', 'bogdan.lipus@um.si', 'LIPUS', 'BOGDAN'),
(12894, 61030, 'MUNDA ARNEJCIC PETRA', NULL, NULL, NULL, 'MUNDA ARNEJCIC', 'PETRA'),
(12962, 61214, 'GODEC GREGOR', NULL, NULL, 'gregor.godec@uni-mb.si', 'GODEC', 'GREGOR'),
(13218, 16026, 'DEZELAK KLEMEN', 'dr.', 'doc.', 'klemen.dezelak@uni-mb.si', 'DEZELAK', 'KLEMEN'),
(13420, 15761, 'PIVEC BOSTJAN', NULL, 'asist.', 'bostjan.pivec@uni-mb.si', 'PIVEC', 'BOSTJAN'),
(13428, 14441, 'PODNAR KLEMENT', NULL, NULL, NULL, 'PODNAR', 'KLEMENT'),
(13429, 16137, 'POLAJNAR JANJA', NULL, NULL, NULL, 'POLAJNAR', 'JANJA'),
(13430, 17688, 'STRELEC SAMO M.', NULL, NULL, 'samo.strelec@guest.arnes.si', 'STRELEC SAMO', 'M.'),
(13436, 60010, 'ZERDIN FRANC', 'dr.', 'doc.', 'franc_zerdin@yahoo.com', 'ZERDIN', 'FRANC'),
(13438, 16160, 'ZAGAR TOMAZ', 'dr.', 'doc.', 'tomaz.zagar@gen-energija.si', 'ZAGAR', 'TOMAZ'),
(13443, 16982, 'SEVCNIKAR ANDREJ', NULL, 'asist.', 'andrej.sevcnikar@uni-mb.si', 'SEVCNIKAR', 'ANDREJ'),
(13465, 16069, 'KOSIC KRISTJAN', NULL, 'asist.', 'kristjan.kosic@uni-mb.si', 'KOSIC', 'KRISTJAN'),
(13497, 16182, 'CAFNIK ULUDAG PETRA', 'mag.', 'asist.', 'petra.cafnik@uni-mb.si', 'CAFNIK ULUDAG', 'PETRA'),
(13564, 10128, 'VESENJAK ANTON', NULL, NULL, 'anton.vesenjak@uni-mb.si', 'VESENJAK', 'ANTON'),
(13565, 10317, 'MORAUS STANISLAV', NULL, NULL, 'stanko.moraus@uni-mb.si', 'MORAUS', 'STANISLAV'),
(13566, 13816, 'TUTEK SIMON', NULL, NULL, 'simon.tutek@uni-mb.si', 'TUTEK', 'SIMON'),
(13567, 15300, 'LAHOVNIK BORIS', NULL, NULL, 'boris.lahovnik@uni-mb.si', 'LAHOVNIK', 'BORIS'),
(13568, 15410, 'VOH JURCEK', NULL, NULL, 'jurcek.voh@uni-mb.si', 'VOH', 'JURCEK'),
(13569, 15425, 'STREHAR MIHA', NULL, NULL, 'miha.strehar@uni-mb.si', 'STREHAR', 'MIHA'),
(13570, 15770, 'HORVAT MARJAN', NULL, NULL, 'marjan.horvat@uni-mb.si', 'HORVAT', 'MARJAN'),
(13571, 15790, 'BREZOVNIK JANEZ', 'mag.', 'asist.', 'janez.brezovnik@uni-mb.si', 'BREZOVNIK', 'JANEZ'),
(13572, 16070, 'ZAMUDA ALES', 'dr.', 'asist.', 'ales.zamuda@uni-mb.si', 'ZAMUDA', 'ALES'),
(13581, 10241, 'OTIC ANTON', NULL, NULL, 'anton.otic@uni-mb.si', 'OTIC', 'ANTON'),
(13582, 15357, 'KNUPLEZ ANDREJ', NULL, NULL, 'andrej.knuplez@um.si', 'KNUPLEZ', 'ANDREJ'),
(13583, 15360, 'OGNER MARCEL', NULL, NULL, 'marcel.ogner@uni-mb.si', 'OGNER', 'MARCEL'),
(13584, 15741, 'OTIC JERNEJ', NULL, NULL, 'jernej.otic@uni-mb.si', 'OTIC', 'JERNEJ'),
(13585, 15855, 'ROMIH ANDREJ', NULL, NULL, 'andrej.romih@uni-mb.si', 'ROMIH', 'ANDREJ'),
(13586, 16030, 'REPNIK BLAZ', NULL, NULL, 'blaz.repnik1@uni-mb.si', 'REPNIK', 'BLAZ'),
(13587, 16103, 'ROTOVNIK MILAN', NULL, NULL, 'milan.rotovnik@um.si', 'ROTOVNIK', 'MILAN'),
(13588, 16131, 'HRIBERNIK MITJA', NULL, NULL, 'mitja.hribernik@uni-mb.si', 'HRIBERNIK', 'MITJA'),
(13599, 10034, 'GRASIC SRECKO', NULL, NULL, 'srecko.grasic@uni-mb.si', 'GRASIC', 'SRECKO'),
(13600, 10361, 'GORICAN VIKTOR', NULL, NULL, 'viktor.gorican@uni-mb.si', 'GORICAN', 'VIKTOR'),
(13601, 15374, 'ROMIH TOMAZ', 'mag.', NULL, 'tomaz.romih@uni-mb.si', 'ROMIH', 'TOMAZ'),
(13602, 15805, 'NERAT ANDREJ', NULL, 'asist.', 'andrej.nerat@uni-mb.si', 'NERAT', 'ANDREJ'),
(13603, 16071, 'NOVAK JERNEJ', NULL, 'asist.', 'jernej.novak1@uni-mb.si', 'NOVAK', 'JERNEJ'),
(13604, 16079, 'POLUTNIK JAKA', NULL, 'asist.', 'jaka.polutnik@um.si', 'POLUTNIK', 'JAKA'),
(13605, 16140, 'PERHAVEC TADEJ', NULL, NULL, 'tadej.perhavec@uni-mb.si', 'PERHAVEC', 'TADEJ'),
(13617, 10057, 'HADJAR BOJAN', NULL, NULL, 'bojan.hadjar@um.si', 'HADJAR', 'BOJAN'),
(13618, 10060, 'BERNAD DANIEL', NULL, NULL, 'daniel.bernad@uni-mb.si', 'BERNAD', 'DANIEL'),
(13619, 10410, 'SPANER MARIJAN', 'mag.', NULL, 'marijan.spaner@uni-mb.si', 'SPANER', 'MARIJAN'),
(13620, 10412, 'ZÖGLING AVGUST', NULL, NULL, NULL, 'ZÖGLING', 'AVGUST'),
(13621, 10424, 'STRELEC ZLATKO', NULL, NULL, 'zlatko.strelec@uni-mb.si', 'STRELEC', 'ZLATKO'),
(13622, 15383, 'DREVENSEK BRANKO', NULL, NULL, 'branko.drevensek@uni-mb.si', 'DREVENSEK', 'BRANKO'),
(13623, 15524, 'STEGNE MARJAN', 'mag.', 'asist.', 'marjan.stegne@uni-mb.si', 'STEGNE', 'MARJAN'),
(13624, 15539, 'MUNDA JURIJ', NULL, 'asist.', 'jurij.munda@uni-mb.si', 'MUNDA', 'JURIJ'),
(13625, 15837, 'GOLJAT UROS', NULL, 'asist.', 'uros.goljat@uni-mb.si', 'GOLJAT', 'UROS'),
(13638, 16077, 'KOSEC PRIMOZ', 'dr.', NULL, 'pkosec@uni-mb.si', 'KOSEC', 'PRIMOZ'),
(13763, 15725, 'DOMITER VID', 'dr.', 'asist.', 'vid.domiter@uni-mb.si', 'DOMITER', 'VID'),
(13764, 16020, 'PRINCIC ZIVORAD', 'mag.', NULL, NULL, 'PRINCIC', 'ZIVORAD'),
(13782, 15553, 'ZÖGLING MARKUS ALEKSANDRA', NULL, NULL, 'sandra.zogling@uni-mb.si', 'ZÖGLING MARKUS', 'ALEKSANDRA'),
(13823, 16194, 'KOUS KATJA', NULL, 'asist.', 'katja.kous@uni-mb.si', 'KOUS', 'KATJA'),
(13824, 16090, 'VERNELI LIJA EMMELIN', NULL, 'asist.', 'lijaemmelin.verneli@uni-mb.si', 'VERNELI', 'LIJA EMMELIN'),
(13826, 14458, 'PLANSAK MOJCA', NULL, NULL, NULL, 'PLANSAK', 'MOJCA'),
(13854, 17666, 'BRODNIK ANDREJ', NULL, NULL, NULL, 'BRODNIK', 'ANDREJ'),
(14395, 16213, 'VADLJA SIBILA', NULL, 'asist.', 'sibila.vadlja@uni-mb.si', 'VADLJA', 'SIBILA'),
(14400, 16214, 'FRECE ALES', NULL, NULL, 'ales.frece@uni-mb.si', 'FRECE', 'ALES'),
(14406, 16215, 'PAVLINEK MIHA', NULL, 'asist.', 'miha.pavlinek@uni-mb.si', 'PAVLINEK', 'MIHA'),
(14421, 16229, 'FLUHER BOGDAN', NULL, NULL, 'bogdan.fluher@uni-mb.si', 'FLUHER', 'BOGDAN'),
(14477, 15791, 'SPELIC DENIS', 'dr.', 'asist.', 'denis.spelic@uni-mb.si', 'SPELIC', 'DENIS'),
(14492, 16245, 'GLASER VOJKO', 'mag.', 'asist.', 'vojko.glaser@uni-mb.si', 'GLASER', 'VOJKO'),
(14523, 16306, 'JEZERNIK SASO', 'dr.', NULL, NULL, 'JEZERNIK', 'SASO'),
(14540, 16253, 'SLATENSEK JANKO', NULL, NULL, 'janko.slatensek@uni-mb.si', 'SLATENSEK', 'JANKO'),
(14541, 16310, 'ZLATOLAS BORUT', NULL, NULL, 'borut.zlatolas@um.si', 'ZLATOLAS', 'BORUT'),
(14557, 90164, 'TOMAZIC DUSAN', NULL, NULL, NULL, 'TOMAZIC', 'DUSAN'),
(14597, 16259, 'SPRAGER SEBASTIJAN', NULL, 'asist.', 'sebastijan.sprager@uni-mb.si', 'SPRAGER', 'SEBASTIJAN'),
(14616, 13774, 'KRAJNC ANDREJ', 'dr.', 'asist.', 'andrej.krajnc1@uni-mb.si', 'KRAJNC', 'ANDREJ'),
(14618, 15898, 'KOS MARKO', 'dr.', 'asist.', 'marko.kos@uni-mb.si', 'KOS', 'MARKO'),
(14619, 16167, 'GRASIC BOSTJAN', NULL, 'asist.', 'bostjan.grasic@uni-mb.si', 'GRASIC', 'BOSTJAN'),
(14620, 15883, 'GRASIC MATEJ', 'dr.', NULL, 'matej.grasic@uni-mb.si', 'GRASIC', 'MATEJ'),
(14621, 16276, 'PECNIK SASO', NULL, 'asist.', 'saso.pecnik@uni-mb.si', 'PECNIK', 'SASO'),
(14622, 16277, 'GOLE BORIS', NULL, NULL, 'boris.gole@uni-mb.si', 'GOLE', 'BORIS'),
(14623, 16278, 'KORELIC TOMAZ', NULL, 'asist.', 'tomaz.korelic@uni-mb.si', 'KORELIC', 'TOMAZ'),
(14624, 16279, 'GRADISNIK MITJA', NULL, 'asist.', 'mitja.gradisnik@uni-mb.si', 'GRADISNIK', 'MITJA'),
(14625, 16280, 'FERME MARKO', NULL, 'asist.', 'marko.ferme@uni-mb.si', 'FERME', 'MARKO'),
(14626, 16281, 'KUHAR SASA', NULL, 'asist.', 'sasa.kuhar@uni-mb.si', 'KUHAR', 'SASA'),
(14627, 16282, 'ZAKONJSEK DAVID', NULL, NULL, 'david.zakonjsek@uni-mb.si', 'ZAKONJSEK', 'DAVID'),
(14640, 61714, 'RADIĆ GORDANA', NULL, 'asist.', 'gordana.radic@uni-mb.si', 'RADIĆ', 'GORDANA'),
(14712, 16031, 'RUPNIK BOJAN', NULL, 'asist.', 'bojan.rupnik@uni-mb.si', 'RUPNIK', 'BOJAN'),
(14772, 16290, 'RIHTARIC SANDI', NULL, NULL, 'sandi.rihtaric@uni-mb.si', 'RIHTARIC', 'SANDI'),
(14809, 15758, 'BRATINA BOZIDAR', 'dr.', 'asist.', 'bozidar.bratina@uni-mb.si', 'BRATINA', 'BOZIDAR'),
(14865, 16297, 'ZONTAR ROK', NULL, 'asist.', 'rok.zontar@uni-mb.si', 'ZONTAR', 'ROK'),
(14894, 16367, 'PRELOZNIK BORUT', NULL, NULL, 'borut.preloznik@uni-mb.si', 'PRELOZNIK', 'BORUT'),
(14898, 16024, 'MALAJNER MARKO', 'mag.', 'asist.', 'marko.malajner@uni-mb.si', 'MALAJNER', 'MARKO'),
(14955, 15899, 'LINEC MATJAZ', 'dr.', 'asist.', 'matjaz.linec@uni-mb.si', 'LINEC', 'MATJAZ'),
(14976, 16149, 'MONGUS DOMEN', 'dr.', 'doc.', 'domen.mongus@uni-mb.si', 'MONGUS', 'DOMEN'),
(14977, 16168, 'HRNCIC DEJAN', NULL, 'asist.', 'dejan.hrncic@uni-mb.si', 'HRNCIC', 'DEJAN'),
(14985, 16464, 'MEDVED ANDREJ', 'mag.', 'asist.', NULL, 'MEDVED', 'ANDREJ'),
(15003, 16256, 'OBAL DAMJAN', NULL, 'asist.', 'damjan.obal@uni-mb.si', 'OBAL', 'DAMJAN'),
(15007, 16255, 'GERLEC CRT', NULL, 'asist.', 'crt.gerlec@uni-mb.si', 'GERLEC', 'CRT'),
(15025, 30258, 'BURKELJCA JERNEJ', NULL, 'asist.', 'jernej.burkeljca@um.si', 'BURKELJCA', 'JERNEJ'),
(15027, 16451, 'HROVAT GORAN', NULL, 'asist.', 'goran.hrovat@uni-mb.si', 'HROVAT', 'GORAN'),
(15029, 16449, 'CASAR DAMJAN', NULL, NULL, 'damjan.casar@uni-mb.si', 'CASAR', 'DAMJAN'),
(15030, 16459, 'HUBER JERNEJ', NULL, 'asist.', 'jernej.huber@uni-mb.si', 'HUBER', 'JERNEJ'),
(15031, 16453, 'ZLAHTIC BOJAN', NULL, NULL, 'bojan.zlahtic@uni-mb.si', 'ZLAHTIC', 'BOJAN'),
(15082, 16687, 'SEDEJ GASPER', NULL, NULL, 'gasper.sedej@uni-mb.si', 'SEDEJ', 'GASPER'),
(15084, 19549, 'HEGEDIS MITJA', NULL, 'asist.', 'mitja.hegedis@uni-mb.si', 'HEGEDIS', 'MITJA'),
(15085, 19550, 'BOZNIK JAN', NULL, 'asist.', 'jan.boznik@uni-mb.si', 'BOZNIK', 'JAN'),
(15087, 19552, 'PLAVCAK GREGOR', NULL, NULL, 'gregor.plavcak@uni-mb.si', 'PLAVCAK', 'GREGOR'),
(15232, 16270, 'SMOGAVEC GREGOR', NULL, 'asist.', 'gregor.smogavec@uni-mb.si', 'SMOGAVEC', 'GREGOR'),
(15235, 16456, 'ZEMLJAK ALES', NULL, 'asist.', 'ales.zemljak@uni-mb.si', 'ZEMLJAK', 'ALES'),
(15246, 16146, 'PEVEC SIMON', 'mag.', 'asist.', 'simon.pevec@uni-mb.si', 'PEVEC', 'SIMON'),
(15252, 100034, 'JOST GREGOR', NULL, 'asist.', 'gregor.jost@uni-mb.si', 'JOST', 'GREGOR'),
(15253, 100039, 'KRAJNC MITJA', NULL, 'asist.', 'mitja.krajnc@uni-mb.si', 'KRAJNC', 'MITJA'),
(15338, 10189, 'PETEK ZIGA', NULL, 'asist.', 'ziga.petek@uni-mb.si', 'PETEK', 'ZIGA'),
(15339, 16399, 'DONAJ GREGOR', NULL, 'asist.', 'gregor.donaj@uni-mb.si', 'DONAJ', 'GREGOR'),
(15340, 16301, 'CEH INES', 'dr.', 'asist.', 'ines.ceh@uni-mb.si', 'CEH', 'INES'),
(15341, 100076, 'KLANJSEK JANEZ', NULL, 'asist.', 'janez.klanjsek@uni-mb.si', 'KLANJSEK', 'JANEZ'),
(15396, 16238, 'ZGANEC DENIS', NULL, NULL, 'denis.zganec@uni-mb.si', 'ZGANEC', 'DENIS'),
(15397, 16450, 'GANGL SIMON', NULL, 'asist.', 'simon.gangl@uni-mb.si', 'GANGL', 'SIMON'),
(15517, 16075, 'BEKOVIĆ MILOS', 'dr.', 'asist.', 'milos.bekovic@uni-mb.si', 'BEKOVIĆ', 'MILOS'),
(15656, 13990, 'POHOREC SANDI', NULL, 'asist.', 'sandi.pohorec@uni-mb.si', 'POHOREC', 'SANDI'),
(15661, 16072, 'OBRUL DENIS', NULL, 'asist.', 'denis.obrul@uni-mb.si', 'OBRUL', 'DENIS'),
(15662, 16397, 'NEMEC LILI', NULL, 'asist.', 'lili.nemec@uni-mb.si', 'NEMEC', 'LILI'),
(15677, 100173, 'NOVAK DAMIJAN', NULL, 'asist.', 'damijan.novak@uni-mb.si', 'NOVAK', 'DAMIJAN'),
(15678, 100174, 'BUTOLEN BOJAN', NULL, 'asist.', 'bojan.butolen@uni-mb.si', 'BUTOLEN', 'BOJAN'),
(15679, 100176, 'KARAKATIC SASO', NULL, 'asist.', 'saso.karakatic@uni-mb.si', 'KARAKATIC', 'SASO'),
(15681, 46053, 'VINKLER JONATAN', 'dr.', NULL, NULL, 'VINKLER', 'JONATAN'),
(15735, 16258, 'NJEGOVEC MATEJ', NULL, 'asist.', 'matej.njegovec@uni-mb.si', 'NJEGOVEC', 'MATEJ'),
(15780, 100089, 'OVCJAK BORIS', NULL, 'asist.', 'boris.ovcjak@uni-mb.si', 'OVCJAK', 'BORIS'),
(15812, 10147, 'PETRUN MARTIN', NULL, 'asist.', 'martin.petrun@uni-mb.si', NULL, NULL),
(15931, 15287, 'FURLAN MARINA', 'dr.', NULL, NULL, NULL, NULL),
(15960, 15585, 'SABOL GOLOB ZVEZDANA', NULL, NULL, 'zvezdana.sabol@um.si', 'SABOL GOLOB', 'ZVEZDANA'),
(15967, 100134, 'VUKELJIĆ MARIJANA', NULL, 'asist.', 'marijana.vukeljic@uni-mb.si', 'VUKELJIĆ', 'MARIJANA'),
(15977, 101063, 'KSENEMAN MATEJ', 'dr.', 'asist.', NULL, 'KSENEMAN', 'MATEJ'),
(15998, 100157, 'LEPEJ PETER', NULL, NULL, 'peter.lepej@uni-mb.si', 'LEPEJ', 'PETER'),
(16010, 100043, 'MATJASEC ZIGA', NULL, 'asist.', 'ziga.matjasec@uni-mb.si', 'MATJASEC', 'ZIGA'),
(16061, 100314, 'BOROVIC MLADEN', NULL, NULL, 'mladen.borovic@uni-mb.si', 'BOROVIC', 'MLADEN'),
(16065, 100196, 'KOZUH INES', NULL, 'asist.', 'ines.kozuh@um.si', 'KOZUH', 'INES'),
(16087, 100081, 'LUKAC NIKO', NULL, 'asist.', 'niko.lukac@uni-mb.si', 'LUKAC', 'NIKO'),
(16089, 101154, 'KOHEK STEFAN', NULL, 'asist.', 'stefan.kohek@uni-mb.si', 'KOHEK', 'STEFAN'),
(16090, 100195, 'CERNEZEL ALES', NULL, 'asist.', 'ales.cernezel@uni-mb.si', 'CERNEZEL', 'STEFAN'),
(16091, 101121, 'SCHWEIGHOFER TINA', NULL, 'asist.', 'tina.schweighofer@uni-mb.si', 'SCHWEIGHOFER', 'TINA'),
(16100, 100313, 'BEZGET JAN', NULL, NULL, 'jan.bezget@uni-mb.si', 'BEZGET', 'JAN'),
(16101, 101033, 'CERNELIC JERNEJ', NULL, 'asist.', 'jernej.cernelic@uni-mb.si', 'CERNELIC', 'JERNEJ'),
(16121, 16252, 'GERM MOJCA', NULL, NULL, 'mojca.germ@um.si', 'GERM', 'MOJCA');

-- --------------------------------------------------------

--
-- Struktura tabele `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `koda` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `st_let` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `program`
--

INSERT INTO `program` (`id`, `ime`, `koda`, `st_let`) VALUES
(1, 'ELEKTROTEHNIKA UN (BU10)', 'BU10', 3),
(2, 'ELEKTROTEHNIKA VS (BV10)', 'BV10', 3),
(6, 'GOSPODARSKO IN', 'BU60', 3),
(7, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA UN (BU30)', 'BU30', 3),
(8, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA VS (BV30)', 'BV30', 3),
(10, 'MEDIJSKE KOMUNIKACIJE (BU50)', 'BU50', 3),
(11, 'RA', 'BU20', 3),
(12, 'RA', 'BV20', 3),
(16, 'TELEKOMUNIKACIJE (BU40)', 'BU40', 3),
(17, 'MEHATRONIKA (BU70)', 'BU70', 3),
(18, 'ELEKTROTEHNIKA  (BM10) - 2. stopnja', 'BM10', 2),
(19, 'GOSPODARSKO IN', 'BM60', 2),
(20, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA (BM30) - ', 'BM30', 2),
(21, 'MEDIJSKE KOMUNIKACIJE (BM50) - 2. stopnja', 'BM50', 2),
(22, 'RA', 'BM20', 2),
(23, 'TELEKOMUNIKACIJE (BM40) - 2. stopnja', 'BM40', 2),
(24, 'MEHATRONIKA (BMM7) - 2. stopnja', 'BMM7', 2),
(26, 'MEHATRONIKA (BV70)', 'BV70', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `prostor`
--

CREATE TABLE IF NOT EXISTS `prostor` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_sedezev` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `prostor`
--

INSERT INTO `prostor` (`id`, `ime`, `st_sedezev`) VALUES
(17, 'A-301', 126),
(18, 'A-302', 60),
(19, 'A-304', 40),
(20, 'A-305', 30),
(21, 'A-306', 120),
(50, 'E-105', 193),
(111, 'G2-P2 BETA, pritlicje', 70),
(112, 'G2-P4 DELTA, 2. nadstropje', 70),
(115, 'G2-P01, pritlicje', 86),
(116, 'G2-P02, pritlicje', 86),
(117, 'G2-P03, pritlicje (HIPULAB)', 20),
(118, 'G2-P04, pritlicje', 40),
(119, 'G2-P05, pritlicje', 40),
(120, 'G2-P06, pritlicje', 30),
(122, 'G2-P1 ALFA, pritlicje', 166),
(124, 'G2-P3 GAMA, 2. nadstropje', 166),
(125, 'G2-seminarska soba, 2. nad.', 18),
(126, '(RU) C-202', 24),
(127, '(RU) F-102', 24),
(128, '(RU) F-103', 24),
(129, '(RU) F-104', 24),
(130, '(LA-RU) E-110 - RA4', 24),
(131, '(RU) G-219', 24),
(133, '(RU) G2-4N.11 galerija', 24),
(134, '(RU) G2-HERTZ, 2. nadstropje', 24),
(140, '(RU) G2 - seminarska soba, 3. nad.', 24),
(141, '(LA) C-205 - ME2', 16),
(142, '(LA) F-202 - IN4', 16),
(143, '(LA) G-002 - RO1', 16),
(144, '(LA) G-027 - ME3', 16),
(145, '(LA) G-028 - RO2', 16),
(146, '(LA) G-030, G-031 - ME1', 16),
(147, '(LA) G-102 - ME5', 16),
(148, '(LA) G-124 - AV4', 20),
(150, '(LA) G-127 - AV5', 16),
(151, '(LA) G-302 - AV1', 16),
(152, '(LA) G-330 - AV1', 16),
(153, '(LA) G-413 - RO3', 16),
(154, '(LA) G-326 - AV2', 16),
(155, '(LA) ICEM - ME3', 16),
(156, '(LA) RTP Dogose - ME2', 16),
(157, '(LA) C-207 - RA5', 16),
(158, '(LA) F-203 - RA2', 16),
(159, '(LA) G-201 - ET2', 16),
(160, '(LA) G-216 - ET1', 16),
(161, '(LA) G-101 - ME5', 16),
(162, '(LA) G-125 - ET2', 16),
(163, '(LA) G-126 - ET1', 16),
(164, 'G-217, 2. nad.', 22),
(165, '(LA) G2-3N.13 LUMEN - ET3', 16),
(166, '(LA) G2-3N.14 BECQUEREL - ET4', 16),
(167, '(LA) G2-3N.15 HENRY - ME3', 16),
(168, '(LA) G2-1N.09 AMPER - IN, MK', 16),
(169, '(LA) J2-415 - ME2', 16),
(170, '(LA) G-0004 - ET2', 16),
(171, '(LA) SITECO - ME', 16),
(172, '(LA) G-103 - ME5', 16),
(173, '(LA) RTV center MB - MK', 16),
(175, '(LA) G-411 - ME3', 16),
(176, '(LA) F-201 - RA1', 16),
(178, '(LA) G-329', 30),
(179, '(FS) B-205', 30),
(180, '(FS) A-202', 30),
(181, '(FS) E-104', 30),
(182, '(FS) B-207', 30),
(183, '(FS) B-201', 30),
(184, '(FS) J2-230', 30),
(185, '(FS) A-201', 30),
(186, '(FS) B-108', 30),
(187, '(EPF) P1.4', 30),
(188, '(EPF) P1.5', 30),
(189, '(EPF) S4', 30),
(190, '(FF) 2.7/FF', 30),
(191, '(FF) 0.5/FF', 30),
(192, '(LA) G-029 - RO2', 16),
(193, '(SSs) Lab. za robotizacijo', 30),
(194, '(LA) E-112', 30),
(195, '(LA) G-327 - AV2', 16),
(196, '(LA) G-124-b', 30),
(197, '(EPF) S9', 30),
(198, '(LA) G2-2N TESLA - RO, MEHA', 30),
(200, 'Ogled objektov', 30),
(201, 'Meritve na objektih', 30),
(202, 'MTS', 30),
(203, '(LA) G1-studio', 16),
(204, 'C-200', 16),
(205, '(FS) J2-415', 16),
(206, '(FS) S 18-5', 16),
(208, 'LABORATORIJ', 30),
(209, 'Racunalniska ucilnica', 30),
(211, 'Rac. ucilnica MK-klet', 16),
(212, 'Izbrano podjetje', 30),
(213, '--', 0),
(214, '(FF) 2.8/FF', 30),
(215, '(FS) B-202', 30),
(216, '(EPF) PB', 30),
(217, '(EPF) PC', 30),
(218, '(EPF) P2.7', 30),
(219, '(FS) S18-RD2', 30),
(220, '(FS) S-308', 30),
(221, '(FS) S-301', 30),
(222, '(FF) 2.16/FF', 30),
(223, '(FS) S-306', 30),
(224, '(LA) G-325', 30),
(225, '(FS) A-001', 30),
(226, '(FS) J2-229/6', 30),
(227, '(FS) S18-5 (F,R)', 30),
(228, 'G2-Senatna soba, 3. nadstropje', 30),
(229, '(FS) S-LAOH', 30),
(230, 'Studio MK - klet', 16),
(231, '(EPF) P0.3', 30),
(232, '(EPF) R-1', 30),
(233, '(EPF) PA', 30),
(234, '(EPF) S10', 30),
(235, 'G2-2N.46', 30),
(236, '(FS) C-101/A', 30),
(237, '(FS) S18-14(P,A)', 30),
(238, '(FS) C-101/2', 30),
(239, '(FS) B-426', 30),
(240, '(EPF) P0.1', 30),
(241, '(EPF) R-3', 30),
(242, '(EPF) R-4', 30),
(243, '(FS) D1-003', 30),
(244, '(FS) S-307', 30),
(245, '(FS) C-101', 30),
(246, '(FS) S-302', 30),
(247, '(FS) B-010', 30),
(248, '(LA) G-031', 10),
(249, '(FS) J-328', 30),
(250, '(LA) G-029b', 30),
(251, '(EPF) S7', 30),
(252, '(EPF) P0.2', 30),
(253, '(EPF) S2.1', 30),
(254, '(FS) S18-18 (B)', 30),
(255, '(FS) B-013', 30),
(256, '(FS) J2-327', 30),
(257, '(FS) J2-328', 30),
(258, '(FS) inz. Ivan Munda', 30);

-- --------------------------------------------------------

--
-- Struktura tabele `rbac_permission`
--

CREATE TABLE IF NOT EXISTS `rbac_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_70964D435E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Odloži podatke za tabelo `rbac_permission`
--

INSERT INTO `rbac_permission` (`id`, `name`) VALUES
(12, 'datoteke_brisi'),
(10, 'datoteke_dodaj'),
(14, 'datoteke_download'),
(8, 'datoteke_index'),
(13, 'datoteke_moje'),
(9, 'datoteke_pregled'),
(11, 'datoteke_uredi'),
(34, 'deska_brisi'),
(15, 'deska_dodaj'),
(36, 'deska_index'),
(35, 'deska_pregled'),
(33, 'deska_uredi'),
(32, 'kategorije_brisi'),
(24, 'kategorije_dodaj'),
(25, 'kategorije_pregled'),
(31, 'kategorije_uredi'),
(23, 'novica_brisi'),
(21, 'novica_dodaj'),
(19, 'novica_index'),
(20, 'novica_pregled'),
(22, 'novica_uredi'),
(18, 'odgovor_brisi'),
(6, 'odgovor_dodaj'),
(17, 'odgovor_uredi'),
(27, 'odgovor_vote'),
(28, 'user_dodaj'),
(16, 'user_pregled'),
(7, 'user_uredi'),
(5, 'vprasanje_brisi'),
(3, 'vprasanje_dodaj'),
(1, 'vprasanje_index'),
(2, 'vprasanje_pregled'),
(4, 'vprasanje_uredi'),
(26, 'vprasanje_vote');

-- --------------------------------------------------------

--
-- Struktura tabele `rbac_role`
--

CREATE TABLE IF NOT EXISTS `rbac_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_role_id` int(11) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C55D6FF25E237E06` (`name`),
  KEY `IDX_C55D6FF2A44B56EA` (`parent_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Odloži podatke za tabelo `rbac_role`
--

INSERT INTO `rbac_role` (`id`, `parent_role_id`, `name`) VALUES
(1, NULL, 'admin'),
(2, 1, 'moderator'),
(3, 2, 'student'),
(4, 3, 'anonymous');

-- --------------------------------------------------------

--
-- Struktura tabele `rbac_role_permission`
--

CREATE TABLE IF NOT EXISTS `rbac_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C31A0CF0D60322AC` (`role_id`),
  KEY `IDX_C31A0CF0FED90CCA` (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Odloži podatke za tabelo `rbac_role_permission`
--

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
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 4, 19),
(20, 4, 20),
(21, 2, 21),
(22, 2, 22),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 3, 26),
(27, 3, 27),
(28, 1, 28),
(31, 1, 31),
(32, 1, 32),
(33, 2, 33),
(34, 2, 34),
(35, 4, 35),
(36, 4, 36);

-- --------------------------------------------------------

--
-- Struktura tabele `rbac_user_roles`
--

CREATE TABLE IF NOT EXISTS `rbac_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_C4230A76A76ED395` (`user_id`),
  KEY `IDX_C4230A76D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `rbac_user_roles`
--

INSERT INTO `rbac_user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktura tabele `smer`
--

CREATE TABLE IF NOT EXISTS `smer` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `koda` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `leta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E72A8D13EB8070A` (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `smer`
--

INSERT INTO `smer` (`id`, `program_id`, `ime`, `koda`, `leta`) VALUES
(1, 1, 'UN - ELEKTROTEHNIKA (BU10)', 'BU10', 1),
(2, 1, 'E UN - AVTOMATIKA IN ROBOTIKA (BU11)', 'BU11', 2),
(3, 1, 'E UN - ELEKTRONIKA (BU12)', 'BU12', 2),
(4, 1, 'E UN - MO', 'BU13', 2),
(5, 2, 'VS - ELEKTROTEHNIKA (BV10)', 'BV10', 1),
(6, 2, 'E VS - AVTOMATIKA IN ROBOTIKA (BV11)', 'BV11', 2),
(7, 2, 'E VS - ELEKTRONIKA (BV12)', 'BV12', 2),
(8, 2, 'E VS - MO', 'BV13', 2),
(9, 2, 'E VS -TELEKOMUNIKACIJE (BV14)', 'BV14', 2),
(40, 6, 'GOSPODARSKO IN', 'BU60', 1),
(41, 6, 'GING E - AVTOMATIKA IN ROBOTIKA I (BU61)', 'BU61', 2),
(42, 6, 'GING E - ELEKTRONIKA I (BU62)', 'BU62', 2),
(43, 6, 'GING E - MO', 'BU63', 2),
(44, 7, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA (BU30)', 'BU30', 1),
(45, 7, 'INFORMACIJSKI SISTEMI (BU31)', 'BU31', 2),
(46, 7, 'TEHNOLOGIJE KOMUNICIRANJA (BU32)', 'BU32', 2),
(47, 8, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA (BV30)', 'BV30', 1),
(48, 8, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA (BV30)', 'BV30', 2),
(55, 10, 'MEDIJSKE KOMUNIKACIJE (BU50)', 'BU50', 1),
(56, 10, 'MEDIJSKA PRODUKCIJA (BU51)', 'BU51', 2),
(57, 10, 'VIZUALNA KOMUNIKACIJA (BU52)', 'BU52', 2),
(58, 11, 'RA', 'BU20', 1),
(60, 12, 'RA', 'BV20', 1),
(81, 16, 'TELEKOMUNIKACIJE (BU40)', 'BU40', 1),
(82, 16, 'TELEKOMUNIKACIJE (BU40)', 'BU40', 2),
(83, 17, 'MEHATRONIKA (BU70)', 'BU70', 1),
(84, 17, 'MEHATRONIKA (BU70)', 'BU70', 2),
(85, 11, 'RIT (BU20) - PROJEKT NOGOMETNI ASISTENT (P1)', 'BU20', 2),
(87, 11, 'RIT (BU20) - PROJEKT ', 'BU20', 2),
(89, 12, 'RIT (BV20) - PROJEKT FERI NAVIGATOR (P2)', 'BV20', 2),
(90, 12, 'RIT (BV20) - PROJEKT PAMETNI TELEFON (P3)', 'BV20', 2),
(91, 1, 'E UN - AVTOMATIKA IN ROBOTIKA (BU11)', 'BU11', 3),
(92, 1, 'E UN - ELEKTRONIKA (BU12)', 'BU12', 3),
(93, 1, 'E UN - MO', 'BU13', 3),
(94, 16, 'TELEKOMUNIKACIJE (BU40)', 'BU40', 3),
(95, 17, 'MEHATRONIKA (BU70)', 'BU70', 3),
(96, 6, 'GING E - AVTOMATIKA IN ROBOTIKA II (BU64)', 'BU64', 3),
(97, 6, 'GING E - ELEKTRONIKA II (BU65)', 'BU65', 3),
(98, 6, 'GING E- MO', 'BU66', 3),
(99, 2, 'E VS - AVTOMATIKA IN ROBOTIKA (BV11)', 'BV11', 3),
(100, 2, 'E VS - ELEKTRONIKA (BV12)', 'BV12', 3),
(101, 2, 'E VS - MO', 'BV13', 3),
(102, 2, 'E VS - TELEKOMUNIKACIJE (BV14)', 'BV14', 3),
(103, 10, 'MEDIJSKA PRODUKCIJA (BU51)', 'BU51', 3),
(104, 10, 'VIZUALNA KOMUNIKACIJA (BU52)', 'BU52', 3),
(105, 7, 'INFORMACIJSKI SISTEMI (BU31)', 'BU31', 3),
(106, 7, 'TEHNOLOGIJE KOMUNICIRANJA (BU32)', 'BU32', 3),
(107, 8, 'SISTEMSKA PODPORA INFORMATIKI IN TEHNOLOGIJAM KOMUNICIRANJA (BV31)', 'BV31', 3),
(108, 8, 'RAZVOJ INFORMACIJSKIH SISTEMOV (BV32)', 'BV32', 3),
(109, 8, 'TEHNOLOGIJE MULTIMEDIJSKEGA KOMUNICIRANJA (BV33)', 'BV33', 3),
(110, 11, 'RA', 'BU20', 3),
(112, 12, 'RA', 'BV20', 3),
(113, 18, 'MAG E - AVTOMATIKA IN ROBOTIKA (BM11)', 'BM11', 1),
(114, 18, 'MAG E - ELEKTRONIKA (BM12)', 'BM12', 1),
(115, 18, 'MAG E - MO', 'BM13', 1),
(116, 19, 'MAG GING - AVTOMATIKA IN ROBOTIKA (BM61)', 'BM61', 1),
(117, 19, 'MAG GING - ELEKTRONIKA (BM62)', 'BM62', 1),
(118, 19, 'MAG GING - MO', 'BM63', 1),
(119, 20, 'MAG ITK - M1 UPRAVLJANJE POSLOVNIH PROCESOV', 'BM30', 1),
(120, 21, 'MAG MK - MEDIJSKE KOMUNIKACIJE (BM50)', 'BM50', 1),
(121, 22, 'MAG RIT (BM20) - PROJEKT 1 INTELIGENTNE INFORMACIJSKE TEHNOLOGIJE', 'BM20', 1),
(122, 23, 'MAG TK - TELEKOMUNIKACIJE (BM40)', 'BM40', 1),
(123, 24, 'MEHATRONIKA (BMM7)', 'BMM7', 1),
(124, 22, 'MAG RIT (BM20) - PROJEKT 2 RA', 'BM20', 1),
(125, 20, 'MAG ITK - M2 INTELIGENTNE INFORMACIJSKE RE', 'BM30', 1),
(126, 20, 'MAG ITK - M3 SODOBNE IT PLATFORME IN ARHITEKTURE', 'BM30', 1),
(128, 18, 'MAG E - AVTOMATIKA IN ROBOTIKA (BM11)', 'BM11', 2),
(129, 18, 'MAG E - ELEKTRONIKA (BM12)', 'BM12', 2),
(130, 18, 'MAG E - MO', 'BM13', 2),
(131, 19, 'MAG GING - AVTOMATIKA IN ROBOTIKA (BM 61)', 'BM61', 2),
(132, 19, 'MAG GING - ELEKTRONIKA (BM62)', 'BM62', 2),
(133, 19, 'MAG GING - MO', 'BM63', 2),
(134, 22, 'MAG RIT (BM20)', 'BM20', 2),
(136, 20, 'INFORMATIKA IN TEHNOLOGIJE KOMUNICIRANJA (BM30)', 'BM30', 2),
(137, 23, 'MAG TK - TELEKOMUNIKACIJE (BM40)', 'BM40', 2),
(138, 21, 'MAG MK - MEDIJSKE KOMUNIKACIJE (BM50)', 'BM50', 2),
(139, 24, 'MEHATRONIKA (BMM7)', '(BMM7)', 2),
(140, 26, 'MEHATRONIKA', 'BV70', 1),
(141, 26, 'MEHATRONIKA', 'BV70', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `stackvprasanje`
--

CREATE TABLE IF NOT EXISTS `stackvprasanje` (
  `id` int(11) NOT NULL,
  `avtor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `stack_odgovor`
--

CREATE TABLE IF NOT EXISTS `stack_odgovor` (
  `id` int(11) NOT NULL,
  `avtor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `stack_vprasanje`
--

CREATE TABLE IF NOT EXISTS `stack_vprasanje` (
  `id` int(11) NOT NULL,
  `avtor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `ucilnice`
--

CREATE TABLE IF NOT EXISTS `ucilnice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapa_id` int(11) DEFAULT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `top` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7020F1757ED422F` (`mapa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=159 ;

--
-- Odloži podatke za tabelo `ucilnice`
--

INSERT INTO `ucilnice` (`id`, `mapa_id`, `ime`, `top`, `left`) VALUES
(1, 2, 'A-001', 214, 612),
(2, 2, 'A-002', 212, 475),
(3, 2, 'A-003', 196, 409),
(4, 2, 'A-004', 217, 345),
(5, 2, 'A-008', 206, 92),
(6, 2, 'A-009', 119, 196),
(7, 2, 'A-010', 124, 322),
(8, 2, 'A-011', 122, 426),
(9, 2, 'A-012', 122, 513),
(10, 3, 'B-101', 367, 185),
(11, 3, 'B-102', 373, 255),
(12, 3, 'B-103', 373, 327),
(13, 3, 'B-104', 372, 450),
(14, 3, 'B-105', 365, 508),
(15, 3, 'B-106', 402, 597),
(16, 3, 'B-107', 412, 661),
(17, 3, 'B-108', 216, 572),
(18, 3, 'B-109', 216, 424),
(19, 3, 'B-110', 248, 329),
(20, 3, 'B-111', 173, 64),
(21, 4, 'C-201', 336, 240),
(22, 4, 'C-202', 143, 254),
(23, 4, 'C-202-1', 205, 287),
(24, 4, 'C-203A', 71, 238),
(25, 4, 'C-203', 83, 161),
(26, 4, 'C-203D', 70, 51),
(27, 4, 'C-203C', 117, 51),
(28, 4, 'C-204', 160, 51),
(29, 4, 'C-205', 212, 51),
(30, 4, 'C-205-1', 289, 51),
(31, 4, 'C-206', 331, 51),
(32, 4, 'C-207', 383, 51),
(33, 4, 'C-209', 418, 161),
(34, 5, 'D-201', 340, 123),
(35, 5, 'D-202', 342, 167),
(36, 5, 'D-202-1', 343, 216),
(37, 5, 'D-203', 342, 261),
(38, 5, 'D-204', 342, 356),
(39, 5, 'D-205', 342, 452),
(40, 5, 'D-206', 342, 497),
(41, 5, 'D-207', 342, 543),
(42, 5, 'D-209', 239, 445),
(43, 5, 'D-210', 170, 276),
(44, 5, 'D-211', 238, 298),
(45, 5, 'D-212', 203, 160),
(46, 6, 'E-103', 269, 507),
(47, 6, 'E-104', 270, 340),
(48, 6, 'E-105', 382, 173),
(49, 6, 'E-106', 517, 246),
(50, 6, 'E-110', 470, 797),
(51, 6, 'E-111', 466, 903),
(52, 6, 'E-112', 454, 959),
(53, 7, 'F-101', 521, 600),
(54, 7, 'F-102', 521, 545),
(55, 7, 'F-103', 521, 406),
(56, 7, 'F-103-1', 521, 265),
(57, 8, 'F-201', 185, 510),
(58, 8, 'F-202', 112, 515),
(59, 8, 'F-203', 21, 511),
(60, 8, 'F-204', 0, 435),
(61, 8, 'F-205', 48, 425),
(62, 8, 'F-206', 90, 425),
(63, 8, 'F-207', 126, 425),
(64, 8, 'F-208', 162, 425),
(65, 8, 'F-209', 194, 425),
(66, 8, 'F-210', 230, 425),
(67, 9, 'G1-1101', 275, 352),
(68, 9, 'G1-1102', 275, 294),
(69, 9, 'G1-1103', 275, 234),
(70, 9, 'G1-1104', 275, 173),
(71, 9, 'G1-1105', 275, 106),
(72, 9, 'G1-1106', 275, 50),
(73, 10, 'G1-201', 414, 371),
(74, 10, 'G1-202', 414, 298),
(75, 10, 'G1-203', 414, 232),
(76, 10, 'G1-219', 287, 368),
(77, 10, 'G1-218', 287, 296),
(78, 10, 'G1-217', 287, 214),
(79, 10, 'G1-216', 287, 124),
(80, 10, 'G1-215', 287, 43),
(81, 11, 'G1-2101', 280, 357),
(82, 11, 'G1-2102', 280, 296),
(83, 11, 'G1-2103', 280, 231),
(84, 11, 'G1-2104', 280, 171),
(85, 11, 'G1-2105', 280, 110),
(86, 11, 'G1-2106', 280, 50),
(87, 12, 'G1-301', 284, 586),
(88, 12, 'G1-302', 284, 467),
(89, 12, 'G1-303', 284, 353),
(90, 12, 'G1-305', 374, 250),
(91, 12, 'G1-306', 374, 202),
(92, 12, 'G1-307', 374, 156),
(93, 12, 'G1-308', 374, 111),
(94, 12, 'G1-309', 374, 59),
(95, 12, 'G1-310', 374, 16),
(96, 12, 'G1-326', 114, 41),
(97, 12, 'G1-327', 114, 205),
(98, 12, 'G1-328', 114, 327),
(99, 12, 'G1-329', 114, 461),
(100, 12, 'G1-330', 114, 587),
(101, 13, 'G1-001', 345, 76),
(102, 13, 'G1-002', 264, 76),
(103, 13, 'G1-003', 215, 76),
(104, 13, 'G1-004', 134, 44),
(105, 13, 'G1-005', 70, 98),
(106, 13, 'G1-006', 44, 98),
(107, 13, 'G1-007', 71, 52),
(108, 13, 'G1-008', 44, 34),
(109, 13, 'G1-009', 21, 34),
(110, 13, 'G1-027', 54, 187),
(111, 13, 'G1-028', 129, 187),
(112, 13, 'G1-029', 199, 187),
(113, 13, 'G1-030', 273, 187),
(114, 13, 'G1-031', 344, 187),
(115, 14, 'G1-401', 340, 553),
(116, 14, 'G1-402', 340, 489),
(117, 14, 'G1-403', 340, 430),
(118, 14, 'G1-404', 340, 364),
(119, 14, 'G1-405', 340, 298),
(120, 14, 'G1-406', 340, 231),
(121, 14, 'G1-407', 340, 159),
(122, 14, 'G1-408', 340, 89),
(123, 14, 'G1-409', 240, 95),
(124, 14, 'G1-410', 207, 63),
(125, 14, 'G1-411', 80, 80),
(126, 14, 'G1-412', 100, 290),
(127, 14, 'G1-413', 100, 480),
(128, 14, 'G1-414', 220, 375),
(129, 15, 'G1-101', 336, 70),
(130, 15, 'G1-102', 262, 70),
(131, 15, 'G1-103', 213, 70),
(132, 15, 'G1-104', 126, 44),
(133, 15, 'G1-105', 46, 30),
(134, 15, 'G1-124', 62, 187),
(135, 15, 'G1-125', 200, 187),
(136, 15, 'G1-126', 270, 187),
(137, 15, 'G1-127', 340, 187),
(138, 16, 'G2-1N-Ohm', 75, 725),
(139, 16, 'G2-1N-Amper', 400, 270),
(140, 16, 'G2-1N-Pascal', 394, 384),
(141, 16, 'G2-1N-Newton', 391, 516),
(142, 17, 'G2-P3-Gama', 168, 48),
(143, 17, 'G2-P4-Delta', 343, 48),
(144, 17, 'G2-2N-Hertz', 69, 730),
(145, 17, 'G2-2N-Farad', 402, 266),
(146, 17, 'G2-2N-Weber', 402, 374),
(147, 17, 'G2-2N-Tesla', 402, 511),
(148, 18, 'G2-3N-Henry', 401, 262),
(149, 18, 'G2-3N-Becquerel', 401, 373),
(150, 18, 'G2-3N-Lumen', 401, 507),
(151, 21, 'G2-P01', 78, 486),
(152, 21, 'G2-P02', 78, 339),
(153, 21, 'G2-P03', 78, 234),
(154, 21, 'G2-P04', 398, 505),
(155, 21, 'G2-P05', 398, 375),
(156, 21, 'G2-P06', 398, 265),
(157, 21, 'G2-P1-Alfa', 185, 46),
(158, 21, 'G2-P2-Beta', 354, 35);

-- --------------------------------------------------------

--
-- Struktura tabele `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vpisna_st` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `priimek` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `datum_logina` datetime DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `confirmation` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mesto` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drzava` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `splet` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naslov` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urnik_program` int(11) NOT NULL,
  `urnik_letnik` int(11) NOT NULL,
  `urnik_smer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Odloži podatke za tabelo `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `vpisna_st`, `ime`, `priimek`, `password`, `datum_logina`, `enabled`, `confirmation`, `mesto`, `drzava`, `opis`, `splet`, `telefon`, `naslov`, `urnik_program`, `urnik_letnik`, `urnik_smer`) VALUES
(1, 'admin@borkovic.com', 'admin', 'E000000', 'Admin', 'Borkovič', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-06-19 13:28:24', 1, NULL, NULL, NULL, 'To je neki dolgi opis, kao', NULL, NULL, 'To je cesta 9', 0, 0, 0),
(2, 'moderator@borkovic.com', 'moderator', 'E000001', 'Moderator', 'Borkovich', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:50:40', 1, NULL, NULL, 'Slovenija', NULL, NULL, '040932921', NULL, 0, 0, 0),
(3, 'student@borkovic.com', 'student', 'E000002', 'Študent', 'Borkovichevich', '$2y$14$RFN75HJ0rK4V4fAJ5jnrdeXZsiLrHAdBCuhmQY.P4dGmBDSaYZvBi', '2013-05-21 20:49:25', 1, NULL, 'Maribor', NULL, NULL, 'www.kreten.si', NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `vprasanje`
--

CREATE TABLE IF NOT EXISTS `vprasanje` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `vprasanje`
--

INSERT INTO `vprasanje` (`id`, `rating`) VALUES
(67, 2),
(68, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `vprasanje_userrated`
--

CREATE TABLE IF NOT EXISTS `vprasanje_userrated` (
  `vprasanje_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`vprasanje_id`,`user_id`),
  KEY `IDX_EBD203268CBEBB3D` (`vprasanje_id`),
  KEY `IDX_EBD20326A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `vprasanje_user_rated`
--

CREATE TABLE IF NOT EXISTS `vprasanje_user_rated` (
  `vprasanje_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`vprasanje_id`,`user_id`),
  KEY `IDX_E77CEFCE8CBEBB3D` (`vprasanje_id`),
  KEY `IDX_E77CEFCEA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `vprasanje_user_rated`
--

INSERT INTO `vprasanje_user_rated` (`vprasanje_id`, `user_id`) VALUES
(67, 1),
(67, 2);

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `datoteka`
--
ALTER TABLE `datoteka`
  ADD CONSTRAINT `FK_816E44908051CF1F` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`),
  ADD CONSTRAINT `FK_816E4490A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Omejitve za tabelo `dodatnanovica`
--
ALTER TABLE `dodatnanovica`
  ADD CONSTRAINT `FK_54940035BF396750` FOREIGN KEY (`id`) REFERENCES `objava` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `kategorija_user`
--
ALTER TABLE `kategorija_user`
  ADD CONSTRAINT `FK_227F91318051CF1F` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_227F9131A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FK_3A09B17B777BAB62` FOREIGN KEY (`objava_id`) REFERENCES `objava` (`id`),
  ADD CONSTRAINT `FK_3A09B17BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Omejitve za tabelo `novica`
--
ALTER TABLE `novica`
  ADD CONSTRAINT `FK_E5694950BF396750` FOREIGN KEY (`id`) REFERENCES `objava` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `objava`
--
ALTER TABLE `objava`
  ADD CONSTRAINT `FK_F5CC01CF8051CF1F` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`),
  ADD CONSTRAINT `FK_F5CC01CFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Omejitve za tabelo `objava_beseda`
--
ALTER TABLE `objava_beseda`
  ADD CONSTRAINT `FK_3CF93610777BAB62` FOREIGN KEY (`objava_id`) REFERENCES `objava` (`id`),
  ADD CONSTRAINT `FK_3CF93610FF061AC5` FOREIGN KEY (`beseda_id`) REFERENCES `beseda` (`beseda`);

--
-- Omejitve za tabelo `objava_oznaka`
--
ALTER TABLE `objava_oznaka`
  ADD CONSTRAINT `FK_40351ECC777BAB62` FOREIGN KEY (`objava_id`) REFERENCES `objava` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_40351ECCB41AF6DC` FOREIGN KEY (`oznaka_id`) REFERENCES `oznaka` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `odgovor`
--
ALTER TABLE `odgovor`
  ADD CONSTRAINT `FK_37B291ACBF396750` FOREIGN KEY (`id`) REFERENCES `komentar` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `odgovor_user_rated`
--
ALTER TABLE `odgovor_user_rated`
  ADD CONSTRAINT `FK_7A1A5CFCA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7A1A5CFCFB1608F8` FOREIGN KEY (`odgovor_id`) REFERENCES `odgovor` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `oglas`
--
ALTER TABLE `oglas`
  ADD CONSTRAINT `FK_8F96901FBF396750` FOREIGN KEY (`id`) REFERENCES `objava` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `rbac_role`
--
ALTER TABLE `rbac_role`
  ADD CONSTRAINT `FK_C55D6FF2A44B56EA` FOREIGN KEY (`parent_role_id`) REFERENCES `rbac_role` (`id`);

--
-- Omejitve za tabelo `rbac_role_permission`
--
ALTER TABLE `rbac_role_permission`
  ADD CONSTRAINT `FK_C31A0CF0FED90CCA` FOREIGN KEY (`permission_id`) REFERENCES `rbac_permission` (`id`),
  ADD CONSTRAINT `FK_C31A0CF0D60322AC` FOREIGN KEY (`role_id`) REFERENCES `rbac_role` (`id`);

--
-- Omejitve za tabelo `rbac_user_roles`
--
ALTER TABLE `rbac_user_roles`
  ADD CONSTRAINT `FK_C4230A76D60322AC` FOREIGN KEY (`role_id`) REFERENCES `rbac_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C4230A76A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `smer`
--
ALTER TABLE `smer`
  ADD CONSTRAINT `FK_1E72A8D13EB8070A` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`);

--
-- Omejitve za tabelo `stack_odgovor`
--
ALTER TABLE `stack_odgovor`
  ADD CONSTRAINT `FK_7C62AA09BF396750` FOREIGN KEY (`id`) REFERENCES `komentar` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `stack_vprasanje`
--
ALTER TABLE `stack_vprasanje`
  ADD CONSTRAINT `FK_CEAF326DBF396750` FOREIGN KEY (`id`) REFERENCES `objava` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `ucilnice`
--
ALTER TABLE `ucilnice`
  ADD CONSTRAINT `FK_A7020F1757ED422F` FOREIGN KEY (`mapa_id`) REFERENCES `mape` (`id`);

--
-- Omejitve za tabelo `vprasanje`
--
ALTER TABLE `vprasanje`
  ADD CONSTRAINT `FK_ACD4D835BF396750` FOREIGN KEY (`id`) REFERENCES `objava` (`id`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `vprasanje_user_rated`
--
ALTER TABLE `vprasanje_user_rated`
  ADD CONSTRAINT `FK_E77CEFCEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E77CEFCE8CBEBB3D` FOREIGN KEY (`vprasanje_id`) REFERENCES `vprasanje` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
