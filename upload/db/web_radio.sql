-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 08 sep. 2020 à 16:22
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_radio`
--

-- --------------------------------------------------------

--
-- Structure de la table `administation`
--

CREATE TABLE `administation` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(300) DEFAULT NULL,
  `postnom_admin` varchar(300) DEFAULT NULL,
  `email_admin` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `photo_admin` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administation`
--

INSERT INTO `administation` (`id_admin`, `nom_admin`, `postnom_admin`, `email_admin`, `password`, `photo_admin`) VALUES
(1, 'Administrateur ub-fm', 'patrona', 'admin@gmail.com', '9db09d6ae665e42340ef0b1ef1eb95b4', '349016618.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `auditeur`
--

CREATE TABLE `auditeur` (
  `id_aud` int(11) NOT NULL,
  `nom_aud` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email_aud` varchar(300) DEFAULT NULL,
  `photo_aud` varchar(300) DEFAULT NULL,
  `pays` varchar(300) DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `adresse_dom` text,
  `appropos_aud` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auditeur`
--

INSERT INTO `auditeur` (`id_aud`, `nom_aud`, `password`, `email_aud`, `photo_aud`, `pays`, `sexe`, `adresse_dom`, `appropos_aud`, `created_at`) VALUES
(1, 'yuma kayanda françois', 'e10adc3949ba59abbe56e057f20f883e', 'yuma@gmail.com', '1565531356.JPG', 'République démocratique du congo', 'M', '                                    Nord-kivu Goma quartier katoyi avenue konde                                                                                                                                ', '                                     Ingénieur en télécommunication et réseau  et comptable en formation                                                              ', '2020-09-02 16:07:29'),
(2, 'Kabumba gabriel', 'e10adc3949ba59abbe56e057f20f883e', 'kasumba@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:07:53'),
(3, 'Kabumba gabriel', 'e10adc3949ba59abbe56e057f20f883e', 'kabumba@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:08:18'),
(4, 'kakese pandamiti', 'e10adc3949ba59abbe56e057f20f883e', 'kakese@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:08:37'),
(5, 'sifa abeli sarah', 'e10adc3949ba59abbe56e057f20f883e', 'sifa@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:10:01'),
(6, 'bienfait ijambo', 'e10adc3949ba59abbe56e057f20f883e', 'bienfait@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:10:42'),
(7, 'Amina Joel seigneur', 'e10adc3949ba59abbe56e057f20f883e', 'amina@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:10:57'),
(8, 'john smith', 'e10adc3949ba59abbe56e057f20f883e', 'john@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:11:21'),
(9, 'Jojo Joel kambale', 'e10adc3949ba59abbe56e057f20f883e', 'jojo@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:11:39'),
(10, 'birindwa seigneur', 'e10adc3949ba59abbe56e057f20f883e', 'birindwa@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:12:30'),
(11, 'princes kalume', 'e10adc3949ba59abbe56e057f20f883e', 'prince@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:12:58'),
(12, 'michael joffrey', 'e10adc3949ba59abbe56e057f20f883e', 'joffrey@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:13:23'),
(13, 'pionde bin sefu', 'e10adc3949ba59abbe56e057f20f883e', 'pionde@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, '2020-09-02 16:13:45'),
(14, 'sumaili shabani roger', '9db09d6ae665e42340ef0b1ef1eb95b4', 'sumailiroger681@gmail.com', '1806080257.JPG', 'République démocratique du congo', 'M', 'Nord-kivu goma drc', 'full stack web develop bringing solution in technologie and digital', '2020-09-08 14:07:44');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `sujet` varchar(700) DEFAULT NULL,
  `message` text,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `message`, `fichier`, `created_at`) VALUES
(1, 'pataule', 'pataule@gmail.com', 'information personnele sur  le cours de programmation', 'bon jour je suis votre auditeur depuis masisi je voulais savoir sur ...', '1371810030.txt', '2020-09-06 19:59:52'),
(2, 'jonas', 'jonas@gmail.com', 'information personnele', 'bon jour je suis votre auditeur depuis masisi je voulais savoir sur ...', '1188927088.docx', '2020-09-06 20:00:36'),
(3, 'jojo pascale', 'jojo@gmail.com', 'information personnele sur  le cours de programmation en acadédie de leader shep', 'bon jour je suis votre auditeur depuis Bunia je voulais savoir sur ...', NULL, '2020-09-06 20:01:59'),
(4, 'pascale tumba', 'pascale@gmail.com', 'information personnele en rapport avec le corona virus', 'je suis pascale depuis butembo ...', '1224128450.txt', '2020-09-06 20:03:18'),
(5, 'yuma kayanda françois', 'yuma@gmail.com', 'savoir plus sur vous le sport', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '721465673.JPG', '2020-09-07 19:39:30'),
(6, 'yuma kayanda françois', 'yuma@gmail.com', 'information personnele', 'je suis yuma kayanda depuis goma je voulais savoir les informations', NULL, '2020-09-07 19:41:01');

-- --------------------------------------------------------

--
-- Structure de la table `emission`
--

CREATE TABLE `emission` (
  `id_emission` int(11) NOT NULL,
  `nom_emission` varchar(300) DEFAULT NULL,
  `heure_debit` date DEFAULT NULL,
  `heure_fin` date DEFAULT NULL,
  `description_emisssion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emission`
--

INSERT INTO `emission` (`id_emission`, `nom_emission`, `heure_debit`, `heure_fin`, `description_emisssion`) VALUES
(2, ' Rush Hour / RH', '2020-08-31', '2020-09-03', 'Du lundi à jeudi de 14h30 à 17h 30'),
(3, 'BALLADE VESPERALE BAVES AUCOEUR DE  L\'AMOUR', '2020-09-06', '2020-09-06', 'Chaque Dimanche de 20h à 5h 30’'),
(4, ' AUSHALANG', '2020-09-02', '2020-09-03', 'chaque mercredi et vendredi de 11h à 11h 30  et de 21h 15 à 21 h 45’'),
(5, 'LES DOUDOU', '2020-09-04', '2020-09-05', 'Chaque vendredi et Samedi de 18h30’ à 20h00\''),
(6, 'AU CŒUR DE L’AMOUR', '2020-09-06', '2020-09-06', 'Chaque dimanche de 19h30’ à 1h00'),
(7, 'UB-SPORT', '2020-09-07', '2020-09-07', 'chaque lundi et samedi de 12h30’ à 13h00. Rediffusion: chaque samedi de 17h45’ à 18h 30’.');

-- --------------------------------------------------------

--
-- Structure de la table `favorie`
--

CREATE TABLE `favorie` (
  `idfav` int(11) NOT NULL,
  `id_aud` int(11) DEFAULT NULL,
  `id_info` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favorie`
--

INSERT INTO `favorie` (`idfav`, `id_aud`, `id_info`, `created_at`) VALUES
(6, 1, 5, '2020-09-07 22:46:38'),
(7, 1, 9, '2020-09-07 22:46:45'),
(8, 1, 18, '2020-09-07 22:46:52'),
(9, 1, 6, '2020-09-07 22:47:01');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id_info` int(11) NOT NULL,
  `nom_info` varchar(600) DEFAULT NULL,
  `logo_info` varchar(300) DEFAULT NULL,
  `description_info` text,
  `fichier_info` varchar(600) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `code_link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id_info`, `nom_info`, `logo_info`, `description_info`, `fichier_info`, `created_at`, `code_link`) VALUES
(1, 'le covid 19  au nord kivu', 'radio.jpg', 'The most common symptoms of COVID-19 are fever, tiredness, and dry cough. Some patients may have aches and pains, nasal congestion, runny nose, sore throat or diarrhea. These symptoms are usually mild and begin gradually. Also the symptoms may appear 2-14 days after exposure.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:04:05', '712ba36ecf'),
(2, 'COVID-19 Coronavirus - Symptoms', '2061338999.jpg', 'High Fever – this means you feel hot to touch on your chest or back (you do not need to measure your temperature). It is a common sign & also may appear in 2-10 days if affected.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:07:25', '48b9f39bff'),
(3, 'Shortness of breath', '2089381979.jpg', 'Difficulty breathing – Around 1 out of every 6 people who gets COVID-19 becomes seriously ill and develops difficulty breathing or shortness of breath.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:08:43', 'ab50291ee1'),
(4, 'Cough', '1291360410.jpg', 'Continuous cough – this means coughing a lot for more than an hour, or 3 or more coughing episodes in 24 hours (if you usually have a cough, it may be worse than usual)', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:10:07', '2766fd1629'),
(5, 'Affectation post scolaire', '632811856.jpg', 'The best way to prevent illness is to avoid being exposed to this virus. As there is not vaccine to prevent so you can protect yourself and help prevent spreading the virus to others if you do as below instruction.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:11:57', 'd40152f30c'),
(6, 'Information du jour', '1272510304.jpg', 'The best way to prevent illness is to avoid being exposed to this virus. As there is not vaccine to prevent so you can protect yourself and help prevent spreading the virus to others if you do as below instruction.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:12:56', '307308546b'),
(7, 'Communiqué nègro', '2026481939.jpg', 'The best way to prevent illness is to avoid being exposed to this virus. As there is not vaccine to prevent so you can protect yourself and help prevent spreading the virus to others if you do as below instruction.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:13:56', '29fc74cbe5'),
(8, 'Maintain social distancing', '1914708152.png', 'Maintain at least 1 metre (3 feet) distance between yourself & anyone who is coughing or sneezing. If you are too close, get chance to infected.\r\n\r\nWhy? When someone coughs or sneezes they spray small liquid droplets from their nose or mouth which may contain virus. If you are too close, you can breathe in the droplets, including the COVID-19 virus if the person coughing has the disease.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:15:49', '43d185e2e0'),
(9, 'Avoid touching face', '1436359906.png', 'Do not touch your eyes, nose or mouth if your hands are not clean.\r\nWhy? Hands touch many surfaces and can pick up viruses. Once contaminated, hands can transfer the virus to your eyes, nose or mouth. From there, the virus can enter your body and can make you sick.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:16:37', 'a9dd5a6937'),
(10, 'Practice respiratory hygiene', '1308427152.jpg', 'Make sure you, & the people around you, follow good respiratory hygiene. This means covering your mouth & nose with your bent elbow or tissue when you cough or sneeze.\r\nWhy? Droplets spread virus. By following good respiratory hygiene you protect the people around you from viruses such as cold, flu and COVID-19.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:17:18', '9e9bfbe315'),
(11, 'What is a novel coronavirus?', '2129579059.png', 'On February 11, 2020 the World Health Organization announced an official name for the disease that is causing the 2019 novel coronavirus outbreak, first identified in Wuhan China. The new name of this disease is coronavirus disease 2019, abbreviated as COVID-19. In COVID-19, ‘CO’ stands for ‘corona,’ ‘VI’ for ‘virus,’ and ‘D’ for disease. Formerly, this disease was referred to as “2019 novel coronavirus” or “2019-nCoV”.\r\n\r\nA novel coronavirus is a new coronavirus that has not been previously identified. The virus causing coronavirus disease 2019 (COVID-19), is not the same as the coronaviruses that commonly circulate among humans and cause mild illness, like the common cold.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:18:19', '30b1adac38'),
(12, 'Why is the disease being called coronavirus disease 2019, COVID-19? ', 'radio.jpg', 'On February 11, 2020 the World Health Organization announced an official name for the disease that is causing the 2019 novel coronavirus outbreak, first identified in Wuhan China. The new name of this disease is coronavirus disease 2019, abbreviated as COVID-19. In COVID-19, ‘CO’ stands for ‘corona,’ ‘VI’ for ‘virus,’ and ‘D’ for disease. Formerly, this disease was referred to as “2019 novel coronavirus” or “2019-nCoV”.\r\n\r\nThere are many types of human coronaviruses including some that commonly cause mild upper-respiratory tract illnesses. COVID-19 is a new disease, caused be a novel (or new) coronavirus that has not previously been seen in humans. The name of this disease was selected following the World Health Organization (WHO) best practiceexternal icon for naming of new human infectious diseases.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:19:20', '98dea4684e'),
(13, 'How can people help stop stigma related to COVID-19? ', 'radio.jpg', 'People can fight stigma and help, not hurt, others by providing social support. Counter stigma by learning and sharing facts. Communicating the facts that viruses do not target specific racial or ethnic groups and how COVID-19 actually spreads can help stop stigma.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:19:55', 'd7bcdee28b'),
(14, 'Why might someone blame or avoid individuals and groups? ', '1399262746.jpg', 'People in the U.S. may be worried or anxious about friends and relatives who are living in or visiting areas where COVID-19 is spreading. Some people are worried about the disease. Fear and anxiety can lead to social stigma, for example, towards Chinese or other Asian Americans or people who were in quarantine.\r\n\r\nStigma is discrimination against an identifiable group of people, a place, or a nation. Stigma is associated with a lack of knowledge about how COVID-19 spreads, a need to blame someone, fears about disease and death, and gossip that spreads rumors and myths.\r\n\r\nStigma hurts everyone by creating more fear or anger towards ordinary people instead of the disease that is causing the problem.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:21:08', 'c644013ef7'),
(15, 'What can I do to protect myself and prevent the spread of disease? ', 'radio.jpg', 'Protection measures for everyone\r\nStay aware of the latest information on the COVID-19 outbreak, available on the WHO website and through your national and local public health authority. Many countries around the world have seen cases of COVID-19 and several have seen outbreaks. Authorities in China and some other countries have succeeded in slowing or stopping their outbreaks. However, the situation is unpredictable so check regularly for the latest news.\r\n\r\nYou can reduce your chances of being infected or spreading COVID-19 by taking some simple precautions:\r\n\r\nRegularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water.\r\nWhy? Washing your hands with soap and water or using alcohol-based hand rub kills viruses that may be on your hands.\r\nMaintain at least 1 metre (3 feet) distance between yourself and anyone who is coughing or sneezing.\r\nWhy? When someone coughs or sneezes they spray small liquid droplets from their nose or mouth which may contain virus. If you are too close, you can breathe in the droplets, including the COVID-19 virus if the person coughing has the disease.\r\nAvoid touching eyes, nose and mouth.\r\nWhy? Hands touch many surfaces and can pick up viruses. Once contaminated, hands can transfer the virus to your eyes, nose or mouth. From there, the virus can enter your body and can make you sick.\r\nMake sure you, and the people around you, follow good respiratory hygiene. This means covering your mouth and nose with your bent elbow or tissue when you cough or sneeze. Then dispose of the used tissue immediately.\r\nWhy? Droplets spread virus. By following good respiratory hygiene you protect the people around you from viruses such as cold, flu and COVID-19.\r\nStay home if you feel unwell. If you have a fever, cough and difficulty breathing, seek medical attention and call in advance. Follow the directions of your local health authority.\r\nWhy? National and local authorities will have the most up to date information on the situation in your area. Calling in advance will allow your health care provider to quickly direct you to the right health facility. This will also protect you and help prevent spread of viruses and other infections.\r\nKeep up to date on the latest COVID-19 hotspots (cities or local areas where COVID-19 is spreading widely). If possible, avoid traveling to places – especially if you are an older person or have diabetes, heart or lung disease.\r\nWhy? You have a higher chance of catching COVID-19 in one of these areas.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 18:21:57', 'd27188ae4c'),
(17, 'Practice respiratory hygiene', '68943365.jpg', 'Make sure you, & the people around you, follow good respiratory hygiene. This means covering your mouth & nose with your bent elbow or tissue when you cough or sneeze.\r\nWhy? Droplets spread virus. By following good respiratory hygiene you protect the people around you from viruses such as cold, flu and COVID-19.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 22:43:58', '2156324108'),
(18, 'Avoid touching face', 'radio.jpg', 'Do not touch your eyes, nose or mouth if your hands are not clean.\r\n\r\nWhy? Hands touch many surfaces and can pick up viruses. Once contaminated, hands can transfer the virus to your eyes, nose or mouth. From there, the virus can enter your body and can make you sick.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 22:45:30', 'befd051e56'),
(19, 'Wash your hands frequently', 'radio.jpg', 'Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water for at least 20 seconds.\r\n\r\nWhy? Washing your hands with soap and water or using alcohol-based hand rub kills viruses that may be on your hands.', 'https://www.radioking.com/play/ub-cool', '2020-09-03 22:45:58', 'b4015d7eb0'),
(20, 'Maintain social distancing', 'radio.jpg', 'Maintain at least 1 metre (3 feet) distance between yourself & anyone who is coughing or sneezing. If you are too close, get chance to infected.\r\n\r\nWhy? When someone coughs or sneezes they spray small liquid droplets from their nose or mouth which may contain virus. If you are too close, you can breathe in the droplets, including the COVID-19 virus if the person coughing has the disease', 'https://www.radioking.com/play/ub-cool', '2020-09-03 22:46:37', '7a1708ce30');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_not` int(11) NOT NULL,
  `id_aud` int(11) DEFAULT NULL,
  `id_info` int(11) DEFAULT NULL,
  `titre` varchar(600) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_not`, `id_aud`, `id_info`, `titre`, `url`, `created_at`) VALUES
(1, 1, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(2, 2, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(3, 3, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(4, 4, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(5, 5, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(6, 6, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(7, 7, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(8, 8, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(9, 9, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(10, 10, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(11, 11, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(12, 12, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(13, 13, 15, 'Nouvelle information Practice respiratory hygiene', 'auditeur/notification/2156324108', '2020-09-03 22:43:58'),
(14, 1, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:29'),
(15, 2, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:29'),
(16, 3, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:29'),
(17, 4, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(18, 5, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(19, 6, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(20, 7, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(21, 8, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(22, 9, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(23, 10, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(24, 11, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(25, 12, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(26, 13, 17, 'Nouvelle information Avoid touching face', 'auditeur/notification/befd051e56', '2020-09-03 22:45:30'),
(27, 1, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(28, 2, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(29, 3, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(30, 4, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(31, 5, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(32, 6, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(33, 7, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(34, 8, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(35, 9, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(36, 10, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(37, 11, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(38, 12, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(39, 13, 18, 'Nouvelle information Wash your hands frequently', 'auditeur/notification/b4015d7eb0', '2020-09-03 22:45:58'),
(41, 2, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:36'),
(42, 3, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:36'),
(43, 4, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:36'),
(44, 5, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:36'),
(45, 6, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:36'),
(46, 7, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(47, 8, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(48, 9, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(49, 10, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(50, 11, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(51, 12, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37'),
(52, 13, 19, 'Nouvelle information Maintain social distancing', 'auditeur/notification/7a1708ce30', '2020-09-03 22:46:37');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_favory`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_favory` (
`idfav` int(11)
,`id_aud` int(11)
,`id_info` int(11)
,`created_at` datetime
,`nom_info` varchar(600)
,`logo_info` varchar(300)
,`code_link` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_notification`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_notification` (
`id_not` int(11)
,`id_aud` int(11)
,`id_info` int(11)
,`titre` varchar(600)
,`url` varchar(300)
,`created_at` datetime
,`nom_info` varchar(600)
,`logo_info` varchar(300)
,`code_link` varchar(300)
,`nom_aud` varchar(300)
,`email_aud` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure de la table `radio`
--

CREATE TABLE `radio` (
  `id_radio` int(11) NOT NULL,
  `nom_radio` varchar(300) DEFAULT NULL,
  `logo_radio` varchar(300) DEFAULT NULL,
  `apropos_radio` text,
  `email_radio` varchar(300) DEFAULT NULL,
  `condition_radio` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `telephone2` varchar(300) DEFAULT NULL,
  `adresse_radio` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `radio`
--

INSERT INTO `radio` (`id_radio`, `nom_radio`, `logo_radio`, `apropos_radio`, `email_radio`, `condition_radio`, `telephone`, `telephone2`, `adresse_radio`) VALUES
(1, 'UB-FM', '1235130187.jpg', 'La radio UB-FM contribue tant soit peu au changement des mentalités des communautés, \r\ncela grâce à la communication pour le changement de comportement à travers le divertissement. \r\nIl ne s’agit pas ici d’un divertissement évasif ou distrayant mais bien plus un divertissement \r\néducatif le quel, tout en procurant le bien être à la communauté, l’invite simultanément à réfléchir \r\nà l’émergence du savoir-faire. \r\nLes communautés se plaisent et bâtissent leurs connaissances au travers cette dernière.', 'info@ub-telecom.com', 'UB-PAY\r\nTermes et conditions\r\nConditions générales de vente des produits vendus sur Afrimarket-cd.com (www.afrimarket-cd.com).\r\n\r\nDate de dernière mise à jour le 14/02/2020.\r\n\r\nARTICLE 1 : DE L’OBJET\r\n\r\nLes présentes conditions régissent les ventes par la plateforme afrimarket-cd.com de tous produit', '+243993315152', '+243817883541', 'Nord-kivu Goma /Rdc');

-- --------------------------------------------------------

--
-- Structure de la table `recupere`
--

CREATE TABLE `recupere` (
  `id` int(11) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `verification_key` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recupere`
--

INSERT INTO `recupere` (`id`, `email`, `verification_key`, `created_at`) VALUES
(1, 'yuma@gmail.com', 'ac7a1a0694ac2cd5fe2da2cf454683c9', '2020-09-02 18:30:06'),
(2, 'yuma@gmail.com', '8b51f51c1a9369ceb3d456cd7714a1c9', '2020-09-08 14:25:07');

-- --------------------------------------------------------

--
-- Structure de la vue `profile_favory`
--
DROP TABLE IF EXISTS `profile_favory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_favory`  AS  select `favorie`.`idfav` AS `idfav`,`favorie`.`id_aud` AS `id_aud`,`favorie`.`id_info` AS `id_info`,`favorie`.`created_at` AS `created_at`,`information`.`nom_info` AS `nom_info`,`information`.`logo_info` AS `logo_info`,`information`.`code_link` AS `code_link` from (`favorie` join `information` on((`favorie`.`id_info` = `information`.`id_info`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_notification`
--
DROP TABLE IF EXISTS `profile_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_notification`  AS  select `notification`.`id_not` AS `id_not`,`notification`.`id_aud` AS `id_aud`,`notification`.`id_info` AS `id_info`,`notification`.`titre` AS `titre`,`notification`.`url` AS `url`,`notification`.`created_at` AS `created_at`,`information`.`nom_info` AS `nom_info`,`information`.`logo_info` AS `logo_info`,`information`.`code_link` AS `code_link`,`auditeur`.`nom_aud` AS `nom_aud`,`auditeur`.`email_aud` AS `email_aud` from ((`notification` join `information` on((`notification`.`id_info` = `information`.`id_info`))) join `auditeur` on((`notification`.`id_aud` = `auditeur`.`id_aud`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administation`
--
ALTER TABLE `administation`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `auditeur`
--
ALTER TABLE `auditeur`
  ADD PRIMARY KEY (`id_aud`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emission`
--
ALTER TABLE `emission`
  ADD PRIMARY KEY (`id_emission`);

--
-- Index pour la table `favorie`
--
ALTER TABLE `favorie`
  ADD PRIMARY KEY (`idfav`),
  ADD KEY `id_aud` (`id_aud`),
  ADD KEY `id_info` (`id_info`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_info`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_not`),
  ADD KEY `id_aud` (`id_aud`),
  ADD KEY `id_info` (`id_info`);

--
-- Index pour la table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id_radio`);

--
-- Index pour la table `recupere`
--
ALTER TABLE `recupere`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administation`
--
ALTER TABLE `administation`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `auditeur`
--
ALTER TABLE `auditeur`
  MODIFY `id_aud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `emission`
--
ALTER TABLE `emission`
  MODIFY `id_emission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `favorie`
--
ALTER TABLE `favorie`
  MODIFY `idfav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `radio`
--
ALTER TABLE `radio`
  MODIFY `id_radio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recupere`
--
ALTER TABLE `recupere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favorie`
--
ALTER TABLE `favorie`
  ADD CONSTRAINT `favorie_ibfk_1` FOREIGN KEY (`id_aud`) REFERENCES `auditeur` (`id_aud`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorie_ibfk_2` FOREIGN KEY (`id_info`) REFERENCES `information` (`id_info`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_aud`) REFERENCES `auditeur` (`id_aud`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_info`) REFERENCES `information` (`id_info`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
