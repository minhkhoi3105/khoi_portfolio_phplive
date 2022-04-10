-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 08:04 PM
-- Server version: 5.7.36-log
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumpdbportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `BlogId` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Content` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `ImageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`BlogId`, `Title`, `Date`, `Content`, `UserId`, `ImageId`) VALUES
(13, 'React v Angular v Vue', '2022-04-10 00:50:49', '#Angular\r\nFor Angular, a new major version is released around every six months. This does not mean that Angular changes every six months though. It just means that there can be new features (or deprecated features) every six months. Angular 9, for example, completely changed the internal runtime (no effect on the code you write though), yielding much smaller and faster bundles.\r\n\r\n#React\r\nReact.js follows no strict release schedule but we see new versions being released, too. React 16 has been around for quite some time but the minor releases (16.1, 16.2 etc) also sometimes added groundbreaking new features (without removing old features though). For example, React 16.8 added \"React Hooks\", which allows you to change how you write stateful React components.\r\n\r\n#Vue\r\nVue  is under active developent. There have been some new features that were introduced since the initial release of Vue 2 but at the moment, the Vue team is working on the next big major version: Vue 3. Vue 3 will partly be backwards-compatible and it will generally follow the same philosophy as Vue 2. But it will also add some new features to Vue. At the moment, it\'s hard to tell when Vue 3 will be released though.', 1, 27),
(14, 'Python', '2022-04-10 03:36:32', 'Python Is In High Demand\r\nSeriously, Python is used in almost everything:\r\nDesktop apps\r\nData science\r\nAI\r\nMachine learning\r\nSystem admin\r\nData analytics\r\nGame development and more\r\nAnd thanks to it being a general purpose language, it can be used on both frontend and backend projects.\r\n Python Is Beginner Friendly\r\nNot only is Python a high-level language (meaning that itâ€™s more similar to English than machine code), but it was actually designed to be easy to use, and even has its own built-in help feature!', 1, 31),
(15, 'Angular To Learn!', '2022-04-10 17:48:20', 'And in a digital world that\'s constantly evolving, Angular continually steps up to the plate to meet the demands of developers.\r\n\r\nLuis, just give me the TL;DR\r\n\r\nYou got it! These are the 5 top reasons why you should learn Angular:\r\n\r\nType Safety\r\nEncourages best practices\r\nRegular Releases\r\nSupport from Google\r\nDesigned for enterprise-level apps\r\n\r\nAngular puts the developer experience at the forefront.\r\n\r\nJavaScript is known to introduce some of the most bizarre behavior known to developers. To alleviate headaches Angular provides full support for TypeScript, which offers type safety in our programs.\r\n\r\nTypeScript existed for 4 years before even Angular became a framework, and the creators of Angular recognized the necessity for type safety in large enterprise apps to boost productivity and diminish bugs in production code.\r\n\r\nSo they opted to be one of the earliest adopters in the JavaScript ecosystem.\r\n\r\nIn my view this was the right move. TypeScript has seen widespread adoption and is a favorite among the community. In the most recent State of JavaScript Survey, 93% of responders were satisfied with TypeScript, so it appears Angular made the right call.', 1, 35),
(16, 'Figma Why?', '2022-04-10 17:49:09', 'What is Figma? Why learn it?\r\nUnless you\'ve been living under a rock for the past year, you\'ve probably heard of Figma. But just in case, Figma is the latest and greatest UI design tool. It\'s all the rage, as they say!\r\n\r\nIt\'s a collaborative web-based user interface design tool that works right within your browser.\r\n\r\nThis means you arenâ€™t tied to any operating system or need to download any software. But that doesn\'t mean you can\'t... they do have an app for Mac and Windows.\r\n\r\nFigma makes it super easy to design, prototype and share with others. Countless design teams are using Figma to collaborate across a single team or an entire business (including the team here at ZTM).\r\n\r\nYou can use Figma for a zillion (only a slight exaggeration) different design tasks and projects:\r\n\r\nCreating general graphic designs\r\nDesigning user interfaces for websites and mobile\r\nCreating amazing prototypes\r\nSo much more\r\nAnd don\'t just take my word for it. Check out how many categories it ranks for in the 2021 Design Tools Survey.\r\n\r\nIt\'s become one of the most popular design tools used amongst design professionals today.\r\n\r\nHere\'s just one example of how popular Figma has become. It\'s not just the top prototyping tool designers are using. But it\'s the top tool by a HUGE margin.', 1, 36),
(17, 'Excel For Career', '2022-04-10 17:51:14', 'Excel as an Application Development Platform\r\nExcel turns out to be a great platform for learning programming skills and application development principles because it demystifies those tools, by putting them in the hands of anybody with Microsoft Excel installed on their computer. Which is pretty much... every single person working in an office, especially at any major company and most startups.\r\n\r\nNow if this sounds a little far-fetched, please hear me out. If you squint just a little bit, Microsoft Excel has all the essential components of a full-stack application development platform. And for rapid development of data-driven applications, youâ€™d be hard-pressed to find a better solution.\r\n\r\nTraditionally, application architectures are commonly understood to have three tiers or layers: a data tier, a business logic tier, and a presentation tier. Excel has a role to play in all three.', 1, 38),
(18, 'You Should Learn Golang!', '2022-04-10 17:53:55', 'Why Learn Golang?\r\nWeb browsers are the new operating systems. Web sites are the new globally available applications. In order to handle the massive traffic these applications generate, you need a capable language designed to handle this massive traffic.\r\n\r\nEnter: Go.\r\n\r\nGo (Golang) is a general-purpose programming language built by Google with a heavy focus on scalable, high-performance applications. It\'s an exciting language and I\'m here to break down the top five reasons you should learn Go!\r\n\r\nWait a second! Aren\'t you the guy that also said we should learn Rust?!\r\n\r\nDamn, you caught me. You\'re not wrong. I am a big fan of Rust\r\n\r\nBut I\'m also not dogmatic in my belief that there is \"one programming language to rule them all\". I\'m a believer in using the right tool for the right job.\r\n\r\nSo stick with me. These are my top 5 reasons you should learn Go.\r\n1. First Class Concurrency\r\n2. Performance\r\n3. Simplicity & Familiarity\r\n4. Package Manager\r\n5. Proven Track Record + Job Demand', 1, 39),
(19, 'Should I Learn To Code?', '2022-04-10 17:55:27', 'Remember that friend who convinced you to sign up for bungee jumping / parachuting / zip lining or something that you\'ve always been too afraid to try?\r\n\r\nBut then you finally did it and you are so happy your friend gave you that little nudge you needed. That\'s my goal here. I\'m going to be that friend for you.\r\n\r\nI\'m going to challenge you to venture outside of your comfort zone and convince you why you should learn to code, no matter what your background or current situation is. And at the end of the post, I\'m going to give you a fun little 21-day challenge so that you can see for yourself if programming is for you.\r\n\r\nWhether you are a high school student, a recent university graduate, or a working professional who\'s looking for a career change, this blog post is for you.\r\n\r\nNot new to programming but don\'t know what steps to take? If you\'re already convinced that you should learn to code but are just struggling to make it happen then this post probably isn\'t for you. \r\n\r\n\r\nAfter hearing statements like that enough times, your curiosity has finally got to you and now you\'re here, reading this post and trying to figure out what the heck software development even is and if you should actually even bother with it.\r\n\r\nYou\'re also probably at the stage where you have endless questions like:\r\n\r\n\"Why should I learn to code?\"\r\n\"What is a software developer?\"\r\n\"How long does it take to become a software developer?\"\r\n\"Can anyone learn to code?\"\r\n\"Is programming for me?\"\r\n\"Is programming boring?\r\n\"Can you become a programmer without a degree?\"\r\n\"How to become a software developer?\"\r\n\"What are the best free resources to learn how to code?\"\r\nAnd many many more.\r\n\r\nBut you\'ve started typing those questions into Google and you are bombarded with an overwhelming number of search results.\r\n\r\nEven before you take your first step, you are already stressed out by information overload. You\'re more confused than ever.\r\n\r\n', 1, 40),
(20, 'Why You Should Learn Rust', '2022-04-10 17:56:49', 'Should I Learn Rust?\r\nBeing a Rust programmer myself and someone who teaches Rust to others, I might be a little biased but this is a question I get asked a lot. So I\'m finally putting all of my thoughts in one condensed post.\r\n\r\nBy the end of this post, I think you\'ll see why myself and thousands of other developers think Rust is the best it gets when it comes to programming languages.\r\n\r\nHere\'s the quick version:\r\n\r\nSoftware complexity gradually increases over time: more features are demanded in a shorter amount of time, and as standards go up, tolerance for bugs diminishes. New programming languages and libraries emerge and sometimes make marginal improvements, but these mostly just maintain the status quo.\r\n\r\nSo, what is Rust then?\r\n\r\nRust is the super productive, super safe, and super fast language that breaks the trend of marginal improvements.\r\n\r\nNot only that, it takes one important step further: it changes the way you think about software development.\r\n\r\nSome may say (Andrei is definitely one of them) that Rust is the perfect programming language love-child that combines the power of C++ with the safety of Java or other interpreted languages.\r\n\r\nThese are the 5 top reasons why you should learn Rust:\r\n\r\nPuts Developers First\r\nDependable Code\r\nWebAssembly (Wasm)\r\nIndustry Support\r\nProven Track Record', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `Category`) VALUES
(1, 'Full Stack'),
(2, 'Back End '),
(3, 'Front End'),
(4, 'Machine Learning');

-- --------------------------------------------------------

--
-- Table structure for table `categories_blogs`
--

CREATE TABLE `categories_blogs` (
  `Id` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `BlogId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_blogs`
--

INSERT INTO `categories_blogs` (`Id`, `CategoryId`, `BlogId`) VALUES
(25, 1, 13),
(26, 2, 13),
(27, 3, 13),
(28, 4, 14),
(29, 3, 15),
(30, 3, 16),
(31, 4, 17),
(32, 2, 18),
(33, 4, 18),
(34, 1, 19),
(35, 2, 19),
(36, 3, 19),
(37, 4, 19),
(38, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `categories_projects`
--

CREATE TABLE `categories_projects` (
  `Id` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_projects`
--

INSERT INTO `categories_projects` (`Id`, `CategoryId`, `ProjectId`) VALUES
(10, 2, 3),
(11, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageId` int(11) NOT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageId`, `Image`, `Text`) VALUES
(16, 'react.png', 'React'),
(17, 'ContactWeather.PNG', 'WeatherProjects'),
(18, 'HomePageWeather.PNG', 'WeatherProjects'),
(19, 'LocationWeather.PNG', 'WeatherProjects'),
(20, 'ContactWeather.PNG', 'WeatherProjects'),
(21, 'HomePageWeather.PNG', 'WeatherProjects'),
(22, 'LocationWeather.PNG', 'WeatherProjects'),
(25, 'hero.jpg', 'hero'),
(26, 'react.png', 'react'),
(27, 'react.png', 'React'),
(28, 'ContactWeather.PNG', 'WeatherProj'),
(29, 'HomePageWeather.PNG', 'WeatherProj'),
(30, 'LocationWeather.PNG', 'WeatherProj'),
(31, 'python.png', 'python'),
(32, 'Login_ProjectNtier.PNG', 'NtierProject'),
(33, 'SearchRoom_ProjectNtier.PNG', 'NtierProject'),
(34, 'ViewReservation_ProjectNtier.PNG', 'NtierProject'),
(35, 'angular.jpg', 'angular'),
(36, 'figma.png', 'figma'),
(37, 'excel.png', 'excel'),
(38, 'excel.png', 'excel'),
(39, 'golang.png', 'golang'),
(40, 'coding.png', 'code'),
(41, 'rust.png', 'rust');

-- --------------------------------------------------------

--
-- Table structure for table `images_projects`
--

CREATE TABLE `images_projects` (
  `Id` int(11) NOT NULL,
  `ImageId` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images_projects`
--

INSERT INTO `images_projects` (`Id`, `ImageId`, `ProjectId`) VALUES
(7, 28, 3),
(8, 29, 3),
(9, 30, 3),
(10, 32, 4),
(11, 33, 4),
(12, 34, 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ProjectId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectId`, `Name`, `Description`) VALUES
(3, 'Weather Project', 'In this project, I used Node.js and Express.js to create Weather Project, mainly fetching the API Data from the Weather API website and display it on the wesbite, and styling with CSS3!'),
(4, 'Hotel Project', 'This is the Project I mainly used ADO.NET and N-tier architecture to demonstrate my back-end skill ( MOSTLY is C# and SQL ). The Project is about searching available rooms at the hotel and book the reservation by using desktop application.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `SkillId` int(11) NOT NULL,
  `Skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`SkillId`, `Skill`) VALUES
(1, 'HTML5'),
(2, 'CSS3'),
(3, 'JavaScript'),
(4, 'PHP'),
(6, 'C#'),
(7, 'SQL'),
(8, 'Node.js'),
(9, 'N-tier'),
(10, 'ADO.NET');

-- --------------------------------------------------------

--
-- Table structure for table `skills_projects`
--

CREATE TABLE `skills_projects` (
  `Id` int(11) NOT NULL,
  `ProjectId` int(11) NOT NULL,
  `SkillId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills_projects`
--

INSERT INTO `skills_projects` (`Id`, `ProjectId`, `SkillId`) VALUES
(16, 3, 1),
(17, 3, 2),
(18, 3, 3),
(19, 3, 8),
(20, 4, 6),
(21, 4, 7),
(22, 4, 9),
(23, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(1, 'Khoi', 'Nguyen', 'khoinguyen', '123456'),
(2, 'Delon', 'Venter', 'delon', 'secret');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`BlogId`),
  ADD KEY `images_fk` (`ImageId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `categories_blogs`
--
ALTER TABLE `categories_blogs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_category` (`CategoryId`),
  ADD KEY `fk_blog` (`BlogId`);

--
-- Indexes for table `categories_projects`
--
ALTER TABLE `categories_projects`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_category_project` (`CategoryId`),
  ADD KEY `fk_project_category` (`ProjectId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageId`);

--
-- Indexes for table `images_projects`
--
ALTER TABLE `images_projects`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_image` (`ImageId`),
  ADD KEY `fk_project` (`ProjectId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectId`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`SkillId`);

--
-- Indexes for table `skills_projects`
--
ALTER TABLE `skills_projects`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_skill` (`SkillId`),
  ADD KEY `project_foreignkey` (`ProjectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `BlogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories_blogs`
--
ALTER TABLE `categories_blogs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories_projects`
--
ALTER TABLE `categories_projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `images_projects`
--
ALTER TABLE `images_projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ProjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `SkillId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skills_projects`
--
ALTER TABLE `skills_projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `images_fk` FOREIGN KEY (`ImageId`) REFERENCES `images` (`ImageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories_blogs`
--
ALTER TABLE `categories_blogs`
  ADD CONSTRAINT `fk_blog` FOREIGN KEY (`BlogId`) REFERENCES `blogs` (`BlogId`),
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`);

--
-- Constraints for table `categories_projects`
--
ALTER TABLE `categories_projects`
  ADD CONSTRAINT `fk_category_project` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`),
  ADD CONSTRAINT `fk_project_category` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`);

--
-- Constraints for table `images_projects`
--
ALTER TABLE `images_projects`
  ADD CONSTRAINT `fk_image` FOREIGN KEY (`ImageId`) REFERENCES `images` (`ImageId`),
  ADD CONSTRAINT `fk_project` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`);

--
-- Constraints for table `skills_projects`
--
ALTER TABLE `skills_projects`
  ADD CONSTRAINT `fk_skill` FOREIGN KEY (`SkillId`) REFERENCES `skills` (`SkillId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_foreignkey` FOREIGN KEY (`ProjectId`) REFERENCES `projects` (`ProjectId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
