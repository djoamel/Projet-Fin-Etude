-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 07:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joboppbasedm`
--

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(20) NOT NULL,
  `id_recruteure` int(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `nom_entreprise` varchar(40) NOT NULL,
  `naw3` varchar(100) NOT NULL,
  `valide` enum('V','F') NOT NULL DEFAULT 'F',
  `Kind_worker` varchar(30) NOT NULL,
  `tel_entreprise` int(20) NOT NULL,
  `email_entreprise` varchar(100) NOT NULL,
  `détaille_offre` varchar(1000) NOT NULL,
  `type_de_contrat` varchar(1000) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`id_offre`, `id_recruteure`, `created_at`, `nom_entreprise`, `naw3`, `valide`, `Kind_worker`, `tel_entreprise`, `email_entreprise`, `détaille_offre`, `type_de_contrat`, `logo`) VALUES
(1, 3, '2024-06-10', 'Sunstar coffee', 'simple', 'V', 'Bar man', 699442990, 'islemas23@gmail.com', 'Dedicated and customer-oriented barista seeking to leverage exceptional coffee-making skills and friendly demeanor at Sunstar Coffee. Eager to contribute to creating a welcoming atmosphere and delivering high-quality coffee experiences to customers.', 'Studentjob', '664a1ad3bacf83.55653146_pexels-energepiccom-110472.jpg'),
(2, 3, '2024-06-10', 'Ceramic Palace Annaba', 'special', 'V', 'Inventory Manager', 599331030, 'islemas23@gmail.com', 'Detail-oriented inventory management professional with a track record of success in optimizing warehouse operations. Experienced in supply chain logistics, committed to enhancing efficiency at Palace Ceramic. Dedicated to minimizing costs and maximizing productivity to meet customer demand effectively.', 'Fixed term contract', '664a1ba2acec37.65694667_pexels-tiger-lily-4483610.jpg'),
(3, 3, '2024-06-10', 'Private company ', 'simple', 'V', 'Architectural Engine', 688190329, 'islemas23@gmail.com', 'Experienced architectural engineer adept at delivering innovative design solutions for private sector projects. Skilled in team leadership and client collaboration, with a focus on sustainable design and cutting-edge technology integration. Committed to creating functional and aesthetically pleasing spaces that surpass client expectations.', 'Permanent Contract', '664a29adc5b059.78521261_pexels-anete-lusina-4792498.jpg'),
(4, 1, '2024-06-10', 'Private company', 'simple', 'V', 'Execultive Assistant', 542295106, 'anissannabi2@gmail.com', 'Experienced Executive Assistant adept at providing comprehensive support to senior management teams. Known for strong organizational skills, efficient multitasking, and discretion in handling sensitive information. Proven ability to streamline processes and enhance productivity in fast-paced environments.', 'Permanent Contract', '664a2a2fb22c77.21503065_pexels-fauxels-3184465.jpg'),
(5, 1, '2024-06-10', 'Yaldine expressa', 'simple', 'V', 'Mail Delivery Agent', 782004238, 'anissannabi2@gmail.com', 'Dedicated mail delivery agent with a track record of providing efficient service for Yaldine Express. Skilled in optimizing delivery routes, ensuring timely deliveries, and maintaining excellent customer relations. Known for attention to strong communication skills, and a commitment to delivering packages safely and promptly.', 'Studentjob', '664a2a9e750fb2.45288367_téléchargement (1).png'),
(6, 1, '2024-06-10', 'Ooredoo', 'special', 'V', 'Senior specialiste budget', 782990139, 'anissannabi2@gmail.com', 'A Senior Specialist in Budget at Ooredoo, a leading telecommunications company, is responsible for managing and overseeing the budgeting process to ensure financial efficiency and strategic alignment within the organization.he  plays a crucial role in the financial management of the company. This position involves preparing, analyzing, and monitoring budgets to support Ooredoo’s financial goals and operational strategies.', 'Permanent Contract', '664ca7eadddd03.93074600_ordd.jpg'),
(8, 1, '2024-06-10', 'Creative Minds Agency', 'simple', 'V', 'Graphic Designer', 710928302, 'anissannabi2@gmail.com', ' We are looking for a part-time Graphic Designer to assist with various design projects. Ideal for students pursuing a degree in graphic design.', 'Work study contract', '664d2b70b51ee1.56452081_creative-ideas-colors_18591-26413.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `card` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `ccv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postuler`
--

CREATE TABLE `postuler` (
  `id_postuler` int(20) NOT NULL,
  `id_utilisateur` int(20) NOT NULL,
  `id_offre` int(20) NOT NULL,
  `id_recruteure` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `niveau_etude` enum('Niveau Secondaire','Niveau Terminal','Baccalauréat','TS Bac +2','Licence (LMD), Bac + 3','Master 1, Licence  Bac + 4','Master 2, Ingéniorat, Bac + 5','Magistère Bac + 7','Doctorat','Non Diplômante','Formation Professionnelle','Certification') NOT NULL,
  `cv` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruteur`
--

CREATE TABLE `recruteur` (
  `id_recruteure` int(20) NOT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `sub_exp` date DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `sexe` enum('homme','femme','','') NOT NULL,
  `prénom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `card` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `ccv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruteur`
--

INSERT INTO `recruteur` (`id_recruteure`, `id_sub`, `sub_exp`, `nom`, `sexe`, `prénom`, `email`, `password`, `card`, `number`, `exp`, `ccv`) VALUES
(1, 2, '2024-07-07', 'debz', 'homme', 'anis', 'anissannabi2@gmail.com', 'phpphpphp', 'Societe Generale Card', 2147483647, '10/26', 123),
(2, 3, '2024-07-27', 'ferkous', 'homme', 'anis', 'fer905758@gmail.com', 'kalitoussa', 'Societe Generale Card', 2147483647, '10/26', 71),
(3, 1, '2024-06-20', 'jodi', 'homme', 'islem', 'islemas23@gmail.com', 'cyrincyrin', 'Cpa Card', 2147483647, '10/26', 920),
(4, 2, '2024-07-10', 'maoui', 'homme', 'mohamed hatem', 'maouimohamedhatem7@gmail.com', 'boniboni', 'Societe Generale Card', 2147483647, '11/25', 234),
(5, 3, '2024-07-27', 'djaber', 'homme', 'amine', 'annabikhairo@gmail.com', 'kendrick', 'Societe Generale Card', 2147483647, '10/26', 123);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id_sub` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `max_offres` int(11) DEFAULT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id_sub`, `name`, `price`, `duration`, `max_offres`, `c1`, `c2`, `c3`) VALUES
(1, 'Basic', 8000.00, 10, 3, 'Subsription of 10days', 'One free offer', 'You can put 3 offers'),
(2, 'Standard', 20000.00, 30, 10, 'Subscription of a month', 'Got a week for free', 'You can put 10 offers'),
(3, 'Premium', 30000.00, 45, 20, 'Subsription of 45 days', 'More than a free week', 'You can put 20 offers');

-- --------------------------------------------------------

--
-- Table structure for table `utilisatuer`
--

CREATE TABLE `utilisatuer` (
  `id_utilisateur` int(20) NOT NULL,
  `Role` enum('Admin','Simple') NOT NULL DEFAULT 'Simple',
  `nom` varchar(20) NOT NULL,
  `sexe` enum('homme','femme','','') NOT NULL,
  `prénom` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mot de passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisatuer`
--

INSERT INTO `utilisatuer` (`id_utilisateur`, `Role`, `nom`, `sexe`, `prénom`, `email`, `mot de passe`) VALUES
(3, 'Admin', 'mallem', 'homme', 'djamel', 'fusion10dbs@gmail.com', 'almasalmas'),
(4, 'Simple', 'jodi', 'homme', 'islem ', 'islemjodi@gmail.com', 'cyrincyrin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fk_recruteure_offre` (`id_recruteure`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indexes for table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`id_postuler`),
  ADD KEY `fk_etulisatuer_postuler` (`id_utilisateur`),
  ADD KEY `fk_recruteur_postuler` (`id_recruteure`),
  ADD KEY `fk_offre_postuler` (`id_offre`);

--
-- Indexes for table `recruteur`
--
ALTER TABLE `recruteur`
  ADD PRIMARY KEY (`id_recruteure`),
  ADD KEY `fk_sub_rec` (`id_sub`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `utilisatuer`
--
ALTER TABLE `utilisatuer`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postuler`
--
ALTER TABLE `postuler`
  MODIFY `id_postuler` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recruteur`
--
ALTER TABLE `recruteur`
  MODIFY `id_recruteure` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisatuer`
--
ALTER TABLE `utilisatuer`
  MODIFY `id_utilisateur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_recruteure_offre` FOREIGN KEY (`id_recruteure`) REFERENCES `recruteur` (`id_recruteure`) ON DELETE CASCADE;

--
-- Constraints for table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `fk_etulisatuer_postuler` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisatuer` (`id_utilisateur`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_offre_postuler` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recruteur_postuler` FOREIGN KEY (`id_recruteure`) REFERENCES `recruteur` (`id_recruteure`) ON DELETE CASCADE;

--
-- Constraints for table `recruteur`
--
ALTER TABLE `recruteur`
  ADD CONSTRAINT `fk_sub_rec` FOREIGN KEY (`id_sub`) REFERENCES `subscriptions` (`id_sub`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
