-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 03:45 PM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_cnt` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_cnt`, `name`, `email`, `message`) VALUES
(11, 'mallem mohamed djame', 'fusion10dbs@gmail.co', 'hi i am djamel i have a problem with subscreptions,give me a solution..'),
(14, 'anis ouamer', 'anisouamer@gmail.com', 'slm i like your website its amazing');

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
(2, 5, '2024-06-15', 'Yassir', 'special', 'V', 'Marketing director', 668788912, 'annabikhairo@gmail.com', 'Are you a student with a knack for marketing and a passion for technology? Do you have innovative ideas and a drive to make a real impact? Yassir is seeking a Marketing Director to lead our marketing initiatives. This is a unique opportunity to gain valuable experience while contributing to a fast-growing company.', 'Studentjob', '666d0f6c3da281.03529807__a8e3ff00-5533-4b00-98fb-ca1a3adf9e2b.jpeg'),
(3, 3, '2024-06-10', 'Private company ', 'simple', 'V', 'Architectural Engine', 688190329, 'islemas23@gmail.com', 'Experienced architectural engineer adept at delivering innovative design solutions for private sector projects. Skilled in team leadership and client collaboration, with a focus on sustainable design and cutting-edge technology integration. Committed to creating functional and aesthetically pleasing spaces that surpass client expectations.', 'Permanent Contract', '664a29adc5b059.78521261_pexels-anete-lusina-4792498.jpg'),
(4, 1, '2024-06-10', 'Private company', 'simple', 'V', 'Execultive Assistant', 542295106, 'anissannabi2@gmail.com', 'Experienced Executive Assistant adept at providing comprehensive support to senior management teams. Known for strong organizational skills, efficient multitasking, and discretion in handling sensitive information. Proven ability to streamline processes and enhance productivity in fast-paced environments.', 'Permanent Contract', '664a2a2fb22c77.21503065_pexels-fauxels-3184465.jpg'),
(5, 1, '2024-06-10', 'Yaldine expressa', 'simple', 'V', 'Mail Delivery Agent', 782004238, 'anissannabi2@gmail.com', 'Dedicated mail delivery agent with a track record of providing efficient service for Yaldine Express. Skilled in optimizing delivery routes, ensuring timely deliveries, and maintaining excellent customer relations. Known for attention to strong communication skills, and a commitment to delivering packages safely and promptly.', 'Studentjob', '664a2a9e750fb2.45288367_téléchargement (1).png'),
(6, 1, '2024-06-10', 'Ooredoo', 'simple', 'V', 'Senior specialiste budget', 592109439, 'anissannabi2@gmail.com', 'A Senior Specialist in Budget at Ooredoo, a leading telecommunications company, is responsible for managing and overseeing the budgeting process to ensure financial efficiency and strategic alignment within the organization.', 'Permanent Contract', '664ca7eadddd03.93074600_ordd.jpg'),
(7, 1, '2024-06-15', 'Future Finance Group', 'special', 'V', ' Financial Analyst', 710928302, 'anissannabi2@gmail.com', 'Seeking a detail-oriented Financial Analyst to join our team. Responsibilities include analyzing financial data and preparing reports for management.', 'Permanent Contract', '664d2dfa4ecd28.57763702_illustrate-subway-station-blue-monday-transformed-by-blue-mood-lighting-live-soothing-musi_950002-500062.jpg'),
(8, 4, '2024-06-10', 'Creative Minds Agency', 'simple', 'V', 'Graphic Designer', 710928302, 'maouimohamedhatem7@gmail.com', ' We are looking for a part-time Graphic Designer to assist with various design projects. Ideal for students pursuing a degree in graphic design.', 'Work study contract', '664d2b70b51ee1.56452081_creative-ideas-colors_18591-26413.jpg'),
(9, 1, '2024-06-15', ' Urban Coffee Shop', 'simple', 'V', 'Barista', 521152043, 'anissannabi2@gmail.com', 'Hiring part-time Baristas to join our team. Ideal for students looking for flexible working hours while studying.', 'Studentjob', '664d2c28c7f507.64221992_portrait-person-with-futuristic-bionic-body-part_23-2151401351.jpg'),
(10, 4, '2024-06-10', 'Ceramic Palace Annaba', 'simple', 'V', 'Inventory Manager', 599331030, 'maouimohamedhatem7@gmail.com', 'Detail-oriented inventory management professional with a track record of success in optimizing warehouse operations. Experienced in supply chain logistics, committed to enhancing efficiency at Palace Ceramic. Dedicated to minimizing costs and maximizing productivity to meet customer demand effectively.', 'Fixed term contract', '664a1ba2acec37.65694667_pexels-tiger-lily-4483610.jpg'),
(11, 5, '2024-06-15', ' StarTech Solutions', 'simple', 'V', 'IT Support Specialist', 710928302, 'annabikhairo@gmail.com', 'Looking for an IT Support Specialist to join our team for a 12-month contract. Responsibilities include troubleshooting technical issues and providing IT support to employees.', 'Fixed term contract', '664d2e670a7fc2.72699019_digital-composite-image-businessman-with-icons-against-gray-background_1048944-26884536.jpg'),
(12, 5, '2024-06-15', ' Future Innovators Lab', 'simple', 'V', ' Research Assistant', 521152043, 'annabikhairo@gmail.com', ' Seeking a Research Assistant to support ongoing research projects. This is a work-study position ideal for students in the fields of science or engineering.', 'Work study contract', '664d2f55ea38b5.45303065_person-using-ar-technology-their-daily-occupation_23-2151137512.jpg'),
(13, 1, '2024-06-15', ' Wellness Health Club', 'simple', 'V', ' Fitness Trainer', 668788912, 'anissannabi2@gmail.com', ' Hiring a Fitness Trainer to work part-time while studying. Responsibilities include conducting fitness classes and providing personal training sessions.', 'Work study contract', '664d31b8363ca9.73737357_group-young-girls-engaged-fitness-balls-healthy-lifestyle_180601-1488.jpg'),
(14, 4, '2024-06-15', 'Techie Gadgets Store', 'simple', 'V', 'Sales Assistant', 668788302, 'maouimohamedhatem7@gmail.com', ' Looking for a Sales Assistant to work weekends and holidays. Responsibilities include assisting customers and managing inventory.', 'Studentjob', '664d2ff1d38669.18397270_electronic-products-stores-display-variety-classic_943281-32344.jpg'),
(15, 4, '2024-06-15', ' Sonatrach', 'special', 'V', ' Senior Engineer', 699221004, 'maouimohamedhatem7@gmail.com', 'In the role of Senior Engineer at Sonatrach, you will lead engineering projects, design and develop systems, and ensure compliance with industry standards and safety regulations. You will mentor junior engineers, manage project timelines and budgets, and collaborate with cross-functional teams to achieve project goals.', 'Work study contract', '664d30a24e02b0.39216527_algeria-gas-reserve-algeria-gas-storage-reservoir-natural-gas-tank_220166-1603.jpg'),
(16, 3, '2024-06-15', 'Naftal', 'special', 'V', ' Supply Chain Analyst', 799921028, 'islemas23@gmail.com', 'As a Supply Chain Analyst at Naftal, you will analyze supply chain data, identify areas for improvement, and optimize processes to enhance efficiency. You will manage logistics, monitor inventory levels, and develop strategies to reduce costs and improve service delivery.', 'Fixed term contract', '664d311ba8dee4.66336927_OIP.jpg'),
(17, 4, '2024-06-15', ' Event Management Co', 'simple', 'V', ' Event Coordinator', 710928302, 'maouimohamedhatem7@gmail.com', '  Seeking a part-time Event Coordinator to help organize and manage events. Ideal for students looking to gain experience in event planning.', 'Studentjob', '664d3292104242.46673471_banquet-manager-setting-table-event_23-2148085306.jpg'),
(18, 4, '2024-06-15', 'Global Marketing Agency', 'simple', 'V', 'Marketing Coordinator', 710928302, 'maouimohamedhatem7@gmail.com', 'We are looking for a Marketing Coordinator to join our team for a fixed-term project. Duties include coordinating marketing campaigns and conducting market research.', 'Studentjob', '664d35684ff1c0.61903095_creative-international-internet-day-concept_950002-117698.jpg'),
(62, 1, '2024-06-16', 'Bimo', 'simple', 'F', 'Coocker', 668788912, 'anissannabi2@gmail.com', 'we need someone can coock biscut', 'Studentjob', '666e28387f29c4.68191956_spo.jpg'),
(63, 15, '2024-06-28', ' Creative Marketing Agency', 'simple', 'V', 'Marketing Intern', 668788912, 'ranamekti@gmail.com', ' We are offering a work study contract for a marketing intern to join our creative team. This is an excellent opportunity for students to gain hands-on experience in the marketing field. The intern will assist with market research, social media campaigns, content creation, and event planning. Ideal candidates should be creative', 'Work study contract', '667df4637b3417.82908024_marketing-planning-background-flat-design_23-2147586221.jpg'),
(64, 15, '2024-06-28', ' Future Tech Robotics', 'special', 'V', 'Robotics Engineer Intern', 668093425, 'ranamekti@gmail.com', ' Future Tech Robotics is seeking a robotics engineering intern to support our R&D team. The intern will work on cutting-edge robotics projects, assist in developing new prototypes, and collaborate with senior engineers. This is a great opportunity for students pursuing a degree in robotics or engineering to gain practical experience in a fast-paced environment.', 'Fixed term contract', '667df598e21fb5.88741341_3d-rendering-biorobots-concept_23-2149524396.jpg'),
(65, 15, '2024-06-28', 'Power fitness', 'special', 'V', 'Fitness Instructor', 668781043, 'ranamekti@gmail.com', 'power fitness gym  is seeking a part-time fitness instructor to lead group exercise classes and provide personal training sessions. Applicants should be certified fitness instructors or pursuing a relevant qualification. A passion for health and fitness is a must.', 'Studentjob', '667df8584b7e65.76982112_R.jpg');

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

--
-- Dumping data for table `postuler`
--

INSERT INTO `postuler` (`id_postuler`, `id_utilisateur`, `id_offre`, `id_recruteure`, `firstname`, `lastname`, `sexe`, `phonenumber`, `niveau_etude`, `cv`) VALUES
(8, 4, 8, 1, 'mallem', 'mohamed djamel eddine', 'homme', 699332990, 'Doctorat', 'i wanna work in your company'),
(9, 4, 16, 4, 'debz', 'anis', 'homme', 710928302, 'Master 1, Licence  Bac + 4', 'salem je suis anis ,i wanna take you offer if it still available contact me... thnks!'),
(10, 4, 2, 5, 'djouani', 'mostfa', 'homme', 592109439, 'Licence (LMD), Bac + 3', 'hello I am mostfa I have a car and I am a good driver is your offer still available!'),
(20, 4, 15, 4, 'anis', 'ouamer', 'homme', 699332990, 'Licence (LMD), Bac + 3', 'my name is anis i have a license degree im interstested in your offer'),
(21, 4, 7, 1, 'anis', 'ouamer', 'homme', 699332990, 'Niveau Terminal', 'my name is anis i have a bacaloratte degree im interstested in your offer'),
(22, 4, 65, 15, 'islem ', 'jodi', 'homme', 699332990, 'TS Bac +2', ' Hello, I am Islem. I have 7 years of experience in gym training. I hope to be considered for this job as I am very interested.');

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
(1, 3, '2024-07-31', 'debz', 'homme', 'anis', 'anissannabi2@gmail.com', 'phpphp123', 'Cpa Card', 2147483647, '10/26', 14),
(3, 2, '2024-07-25', 'jodi', 'homme', 'islem', 'islemas23@gmail.com', 'cyrincyrin', 'Societe Generale Card', 2147483647, '10/26', 23),
(4, 2, '2024-07-10', 'maoui', 'homme', 'mohamed hatem', 'maouimohamedhatem7@gmail.com', 'boniboni', 'Societe Generale Card', 2147483647, '11/25', 234),
(5, 1, '2024-07-05', 'djaber', 'homme', 'amine', 'annabikhairo@gmail.com', 'keendrick', 'Dahabiya Card', 2147483647, '10/27', 632),
(15, 2, '2024-06-26', 'mekti', 'femme', 'rana', 'ranamekti@gmail.com', 'linesmlinesm', 'Societe Generale Card', 2147483647, '11/26', 213);

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
(1, 'Basic', 8000.00, 10, 3, 'Subsription of 10 days', 'One free week', 'You can put 3 offers'),
(2, 'Standard', 20000.00, 30, 10, 'Subscreption of a month', 'Got a week for free', 'You can put 10 offers'),
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
(4, 'Simple', 'jodi', 'homme', 'islem ', 'islemjodi@gmail.com', 'cyrincyrin'),
(7, 'Simple', 'ferkous', 'homme', 'anis', 'Fer905758@gmail.com', 'kalitoussa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_cnt`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fk_recruteure_offre` (`id_recruteure`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_cnt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `postuler`
--
ALTER TABLE `postuler`
  MODIFY `id_postuler` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recruteur`
--
ALTER TABLE `recruteur`
  MODIFY `id_recruteure` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `utilisatuer`
--
ALTER TABLE `utilisatuer`
  MODIFY `id_utilisateur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
