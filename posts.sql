-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 09:44 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TheThirstyTerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `img_filename` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `body`, `img_filename`, `updated_at`, `created_at`, `user_id`) VALUES
(1, 'Test1', 'This Post is a Test', '', '2016-01-08 07:46:21', '2016-01-08 07:00:00', '1'),
(2, 'First Live Put', 'Here Be the Body22', '', '2016-01-19 06:51:13', '2016-01-19 13:43:51', '11'),
(4, 'yeehaw', 'yoh toh', '', '2016-01-19 06:54:22', '2016-01-19 13:53:26', '112'),
(5, 'First Form Upload', 'This is the first form we''re uploading to test.', '', '2016-01-20 04:43:55', '0000-00-00 00:00:00', '1'),
(6, 'Second Upload Test', 'This is the body of the second upload.\r\n\r\nIt has a linebreak in it.\r\n\r\nI hope they stay.', '', '2016-01-20 05:27:17', '0000-00-00 00:00:00', '23'),
(7, 'Pre Test', '<pre>\r\nBloggy Blog blog body.\r\n\r\nThat was a line space right there.\r\n\r\nThere was another one. How about that? Isnt it awesome!\r\n</pre>', '', '2016-01-20 19:17:07', '0000-00-00 00:00:00', '1'),
(8, 'Byrd Stadium Name Change', 'First off, fuck these PC principal wannabes. What’s next? Tearing down Washington from Mount Rushmore because he owned slaves? Not only is Curley Byrd the most boss name I’ve ever heard, he created UMD to what it is today. As president he doubled the budget, sextupled enrollment (I think it was more like 5x, but I wanted to say sextupled) and he even created the terrapin as the mascot. We’re destroying the legacy of one of the most important men in UMD history because he was born in the goddamn 19th century (for all you retards, that means the 1800s) when even talking to black people was probably illegal. \r\n\r\nSecond off, and more importantly at this point, changing the name of the stadium to Maryland Stadium is a fucking joke. What kind of boring ass name is Maryland Stadium? It''s like these dweebs sat in the President''s mansion that we had to cut half our sports teams for and just kept trying to come up with ideas only to have then shot down because they might be offensive. How about Jim Henson stadium? Dude everyone knows Kermit was a racist. How about Terrapin Stadium? And offend PETA? Fuck no. Oh, I know! How about Maryland Stadium, how can someone be offended by the name of the school! A-Ha! The perfect name! Yeah, until 5 years from now when the newer more crazy class of freshmen realize that Maryland was a slave state and that the name Maryland is too offensive for their little ears. Fucking social terrorists. \r\n\r\nLastly, these crybaby college students, probably because they''ve never gotten invited to a party, got their way yet again. Just like those fuckers at Yale and in Missouri. Something has to happen to stop the vocal minority from dominating the conversation when the silent majority just doesn’t care enough to do anything. Fuck these social justice workers and fuck these losers. \r\n\r\nP.S. Best name would have been Tatum Stadium. Legendary Maryland football coach who won two national championships and is in the College Football Hall of Fame. Too bad he probably said something mean to a homeless person once and therefore would have too much controversy attached to him\r\n', '', '2016-01-23 17:45:58', '0000-00-00 00:00:00', 'MacDaddy'),
(9, 'UMD Bans Hoverboards', 'I’m torn on this. On the one hand, thank fucking god. These stupid hoverboards are the worst things in the world going. Have you ever tried to “drive” one of these things? All you do is stand as still as possible and the thing just spins around in circles before falling from out of your feet and you knock your tailbone on the ground. I almost broke me ass when my cousin got one for Christmas. \r\n\r\nBut, on the other hand, if you see one of the kids you move into with freshmen year and he is rocking one of these bad boys under his feet, you instantly know he’s a huge faggot and you don’t have to waste a second of your time trying to figure out if he’s someone you would want to be friends with. Like my freshman year roommate who I really liked for the first few weeks until he started referring to black people only as monkeys… Whack job.\r\n\r\nLook at these fucking losers: https://www.youtube.com/watch?v=OWv_9BrwLik', '', '2016-01-23 18:24:27', '0000-00-00 00:00:00', 'MacDaddy'),
(10, 'Awesome Blog Post', 'The pin-tailed snipe (Gallinago stenura) also known as the pintail snipe, is a small stocky wader. It breeds in northern Russia and migrates to spend the non-breeding season in southern Asia from Pakistan to Indonesia. It is the most common migrant snipe in southern India, Sri Lanka and much of Southeast Asia. It is a vagrant to north-western and northern Australia, and to Kenya in East Africa.  Its breeding habitat is damp marshes and tundra in Arctic and boreal Russia. Birds in their non-breeding range use a variety of wetlands, often with common snipe, but may be found also in drier habitats than their relative. They nest in a well-hidden location on the ground.  These birds forage in mud or soft soil, probing or picking up food by sight. They mainly eat insects and earthworms, but also some plant material.  This 25–27 cm long bird is similar to the longer-billed and longer-tailed common snipe. Adults have short greenish-grey legs and a long straight dark bill. The body is mottled brown on top, with cream lines down their back. They are pale underneath with a streaked buff breast and white belly. They have a dark stripe through the eye, with light stripes above and below it. Sexes are similar, and immatures differ only in minor plumage details.  The wings are less pointed than common snipe, and lack the white trailing edge of that species. The shorter tail and flatter flight path when flushed also made flight separation from Common relatively easy.  Male pin-tailed snipes often display in a group, with a loud repetitive tcheka song which has a crescendo of fizzing and buzzing sounds, and also whistling noises produced in flight by the pin-like outer tail feathers which give this species its English name. The normal call is a weak squik.', 'drinkLXA.jpg', '2016-01-26 01:23:44', '0000-00-00 00:00:00', 'Flyer Meyer'),
(11, 'Second Post With Image', '“Hi, is this Justin Bieber?” is how I started each of several dozen phone calls. I collected the numbers, which promise to be a direct line to the singer, from the comment section on one of Bieber’s shirtless Instagram posts. I wanted to know where they all lead and what the people on the other end of the line hope to achieve.\r\n\r\nSimilar promises are littered all over almost any pop star’s Instagram comment sections and come in a variety of forms, whether they assure that “rest were fake, this # is real” or offer bonus content, like nudes that never materialize. Were some of the numbers shady hotlines charging dollars per minute? Or Bieber fans who wanted to talk shop? Neither, it turns out. Every single number was a prank — usually on the person who picked up the phone as well as myself, but occasionally just on me, by a fake Bieber who answered all my questions with some variation of “these nuts on your chin.” More on that later.', 'beiber.jpg', '2016-01-26 14:02:53', '2016-01-26 14:02:53', 'Ash Ketchum'),
(12, 'Last Stupid Post for Now', 'College was fantastic and fun. But it was really long for me— almost six years of spending way too much time sitting in libraries, under fluorescent lights, in front of my computer screen.\r\n\r\nOf course, it was worthwhile. I graduated from the University of Alabama with an engineering degree.  But by the time graduation came around and I was supposed to be preparing for the “real world” I was burnt out.\r\n\r\nliz 1\r\n\r\nI made an effort to find a “real” job, sure. But job fairs felt stifling with their forced conversations and too-tight-on-the-shoulders blazers. And staring at a blank page trying to write a cover letter just wasn’t happening.\r\n\r\nWith most of my classmates focused on finding entry-level jobs, I felt compelled to run the other way.\r\n\r\nEvery job that fit my skills required keeping me indoors eight hours a day and allowing me two weeks vacation. I mean seriously, who can live like that? How terrible does that sound? I just couldn’t do it.\r\n\r\nOther things called my name; photography, swimming, surfing. I have always been incredibly connected to the ocean, and found so much peace there. That’s how I wanted to spend my time. That’s what would make me happy. I knew I had to taste it at least once before I dove head first into the real world.\r\n\r\nlulu 22\r\n\r\nlulu 13\r\n\r\nDCIM101GOPRO\r\n\r\nSo I planned a two week camping trip through the Hawaiian islands with a girlfriend of mine who shared my love of the little Archipelago. I had been a few times before and really felt a connection to the North Shore of Oahu. I thought I’d probably end up living there eventually— but always imagined getting a “real-person” career on the mainland first.\r\n\r\nsurfing 3I took the trip and when I returned, that was it. I was moving to Hawaii. For how long I didn’t know. It didn’t matter. I knew where I belonged.\r\n\r\nI spent the summer traveling to my friends and family across the US, periodically scrolling through  “Craigslist Oahu” to try and find a place.\r\n\r\nNewsflash: It is REALLY hard to find a place to live 5,000 miles away. Being on a set budget and trying to avoid signing a year lease, we had to take a chance on a tiny studio that ended up needing some real renovations. But it didn’t matter. We were in Hawaii. And I wasn’t sitting in front of an excel spreadsheet counting down the minutes until I could leave.', 'hawaii.jpg', '2016-01-26 14:09:37', '2016-01-26 14:09:37', 'Swag Traveler');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
