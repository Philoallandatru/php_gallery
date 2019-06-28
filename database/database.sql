-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 28, 2019 at 08:18 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(48, 'PHP'),
(52, 'Javascript'),
(54, 'hello'),
(55, 'well'),
(56, 'Pyra'),
(59, 'HU'),
(60, 'Update Category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 155, 'EDWIN DIAZ', 'edwin@gmail.com', 'sfdgsdfg', 'approved', '2015-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(113, 48, 'PHP', 'Edwin Diaz', 'rico', '2017-01-30', 'image_5.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'php', '', 'published', 134),
(114, 48, 'Javascript', 'Miguel', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 16),
(115, 48, 'Javascript', 'Edwin Diaz', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 0),
(116, 48, 'Bootstrap', 'George', '', '2015-07-24', 'image_3.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'Bootstrap', '', 'published', 4),
(118, 48, 'Javascript', 'Edwin Diaz', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 4),
(119, 48, 'Javascript', 'Miguel', 'suave', '2017-07-12', 'image_2.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'draft', 1),
(121, 48, 'PHP', 'Edwin Diaz', 'suave', '2017-07-12', 'image_2.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'php', '', 'draft', 0),
(122, 48, 'Javascript', 'Miguel', 'rico', '2017-01-30', 'image_1.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'draft', 0),
(135, 48, 'Javascript', 'Edwin Diaz', '', '2016-12-10', 'lambo_1.jpg', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</strong></p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>&nbsp;</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>=</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\\\\\r\\\\\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>\\\\r\\\\n</p>\r\n<p>\\r\\n</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'draft', 72);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(1, 'rico', '$2y$12$19ZpnAkuhoaAFH7dclUGy.WFIL84PJ8AS216azZtXALy6sqexsScC', '', '', 'rico@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(2, 'suave', '$2y$12$jG3YUwNt3X39OB.YJd311O9akwOw17N4e1NQ79N2xrojC5NG3Na3S', '', '', 'edwin@codingfaculty.com', '', 'admin', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(44, '', 1447434996),
(45, 's47g806mg6788i92u5ogm6kqi4', 1447441570),
(46, '72clfovqk7vo2p8fiii26tkmr4', 1447461586),
(47, '3gs3q67k5ntpma8tbp2kuvof23', 1447691896),
(48, 'bouqd4fslhn2b1nv20k559col1', 1447796024),
(49, 'tign71tbpar4di74k13f8nr022', 1447867949),
(50, 'ju0s1j019d1qlc1q4tb703rgm3', 1447880891),
(51, 'tp6khbvgo4hdlfueekpmaefcu0', 1447952096),
(52, 'kv0klvlajm8j50d3uqt6go4bm6', 1448174347),
(53, 'qsdv073j4c3lqd6m0rtdpg3615', 1448296313),
(54, 'tmliedhtcgvi8r96l6qplehos4', 1448292854),
(55, 'vrumjbdrjrauucdhg6cta8hhn6', 1448800892),
(56, 'eb1ae8996caf679d187c1037ec9620b1', 1478098539),
(57, '40780dfe8631b764c435168775d44432', 1479443689),
(58, '6d9081fbf0106e9bfef3e77f6fa68f8a', 1481004509),
(59, 'b57212ad3e92b65c05d8ddcd1805a370', 1481382178),
(60, '3cf8d2b7eb470cb635a6102868ae9bd6', 1481397855),
(61, 'c7e0ac8eeeaaf5d3ac4329af9bf4b777', 1481685807),
(62, 'b50a5d9ab4b00848c009d472c63ae2cd', 1485830805),
(63, '3ef98f25d1b1762dd799f33b1a2b2657', 1499988384),
(64, '229f256600c1d05e81bd5036d941069a', 1499993069),
(65, '34aea21ebd8d1ae1b572236a4783cbad', 1500065466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Database: `gallery_db`
--
CREATE DATABASE IF NOT EXISTS `gallery_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gallery_db`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`, `user_id`) VALUES
(1, 11, 'Rex', 'The midterm will be an in-class, closed-book exam, covering all material up to that point in the course. The final exam will be a closed-book exam, covering m aterial from the whole year, with emphasis on the second half of the course.\r\n\r\nProject 1 will focus on the implementation of a standards-compliant HTTP 1.1 server, ensuring familiarity with socket programming. Project 2 will build upon your web server from the first project by supporting it with a distributed, CDN-like backend. Project 3 will focus on file transfers and the protocol components necessary for efficient and reliable file transfer (retransmission, congestion control, caching, etc.) Project 1 is a solo project; projects 2 and 3 are to be done in groups of two students.\r\n\r\nThe homework will combine both textbook-like questions as well as hands-on experimental exercises. There will be three homework assignments.\r\n\r\nBecause of the importance of understanding both the theoretical and hands-on elements of networking, students must pass all three components of the course (homeworks, exams, and the projects) in order to receive a passing grade for the course.', 2),
(4, 11, '刹那', '春希君', 2),
(5, 11, '小木曽雪菜', '春希君', 0),
(6, 11, '冬马和纱', '是我，是我先，明明都是我先来的&hellip;&hellip;接吻也好，拥抱也好，还是喜欢上那家伙也好。\r\nあたしが、先だった&hellip;&hellip;先だったんだ&hellip;&hellip;キスしたのも、抱き合ったのも。そいつのこと好きになったのも。', 0),
(7, 11, '小木曾雪菜', '为什么会变成这样呢&hellip;&hellip;第一次有了喜欢的人。有了能做一辈子朋友的人。两件快乐事情重合在一起。而这两份快乐，又给我带来更多的快乐。得到的，本该是像梦境一般幸福的时间&hellip;&hellip;但是，为什么，会变成这样呢&hellip;&hellip;', 0),
(8, 12, 'ecessitatibus, est!', 'どうしてこうなるんだろう&hellip;初めて、好きな人が出来た。一生ものの友だちができた。嬉しいことが二つ重なって。その二つの嬉しさが、また、たくさんの嬉しさを連れてきてくれて。夢のように幸せな時間を手に入れたはずなのに&hellip;なのに、どうして、こうなっちゃうんだろう&hellip;', 0),
(13, 12, '刹那', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo', 0),
(17, 12, '冬马和纱', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo', 0),
(18, 12, '冬馬', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo', 0),
(20, 32, 'Rex', 'sdfkジャlsdjfgぁsjg；lかjsdgl；jks', 0),
(21, 27, 'Rex', 'qwerqwerqwt', 2),
(22, 50, 'Rex', '12312431234234523', 2),
(23, 12, 'Rex', 'dsfsafgadsf', 2),
(24, 13, 'Kant', '那么，一种先行于客体、客体的概念能够在其中先天地被规定的外部直观是如何能够为心灵所固有的呢？显然唯有当它作为主体受客体刺激并由此获得客体的直接表象即直观的形式性状，因而仅仅作为外感官的一般形式，而在主体中拥有自己的位置时，才是可能的。', 26),
(25, 51, '维特根斯坦', '世界是怎样的，这对于更高者来说是完全不相关的。上帝不在世界中现身。', 26),
(26, 51, '维特根斯坦', '我明明在6.44写了，神秘的不是世界是怎样的，而是它存在着。', 2),
(27, 56, 'Rex', 'fさdfkさjdふぁl；sdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `user_id`) VALUES
(11, 'This is Time', 'Stanford : Statistical Learning', '&lt;p&gt;--------------------- 作者：weixin_34235371 来源：CSDN 原文：https://blog.csdn.net/weixin_34235371/article/details/88292104 版权声明：本文为博主原创文章，转载请附上博文链接！&lt;/p&gt;', 'images-41.jpg', '然而跳过，但是看视频跳过得话会容易错过细节。', 'image/jpeg', 16296, 2),
(12, '光玉', 'Clannad的设定', '&lt;p&gt;&amp;ldquo;现实世界的光玉，是幻想世界的意志希望小镇居民幸福的心愿。&lt;/p&gt;\r\n&lt;p&gt;也可以说那是人们的心愿，通过幻想世界折射回的光芒。&lt;/p&gt;\r\n&lt;p&gt;这光，就是人们的心之光，能引发奇迹的力量。&lt;/p&gt;\r\n&lt;p&gt;然而，随着时光流逝，人与人之间的关系不再融洽，人们关系变得冷漠。&lt;/p&gt;\r\n&lt;p&gt;小镇整体的意志难以维持。人们也渐渐忘记小镇的恩惠，&lt;/p&gt;\r\n&lt;p&gt;居民和小镇的意志不再相通，光玉也就这样不再出现。&amp;rdquo;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Excerpt From: Key. &amp;ldquo;CLANNAD.&amp;rdquo; Apple Books.&amp;nbsp;&lt;/p&gt;', 'images-33.jpg', '', 'image/jpeg', 16855, 2),
(13, 'fasdfa', '', '', 'images-37.jpg', '', 'image/jpeg', 20381, 6),
(15, 'fgsda', '', '', 'images-43.jpg', '', 'image/jpeg', 27955, 6),
(16, '8erwy89eqrtwhiu', '', '', 'images-30.jpg', '', 'image/jpeg', 20257, 1),
(26, 'Legend of Zelda breath of the wid', '', '', '1920x1080_birthday_wallpaper_zelda.jpg', '', 'image/jpeg', 939449, 2),
(28, 'My Wife Homura', '', '', 'index-13_1.jpg', '', 'image/jpeg', 1849410, 1),
(29, '小春ちゃん', '', '', 'wa2-1.jpg', '', 'image/jpeg', 87888, 6),
(30, 'カノン', '', '', 'kanon_17.jpg', '', 'image/jpeg', 2130508, 1),
(31, '方し', '', '', '1543589073129.png', '', 'image/png', 7781525, 6),
(32, '藤林', '', '', '43325 clannad fujibayashi_kyou furukawa_nagisa.jpg', '', 'image/jpeg', 1399376, 1),
(33, 'Clannad　Family', '', '', 'abbr_60180b3c1701a800e8676564220a3315.jpg', '', 'image/jpeg', 1316610, 1),
(34, 'White　Album　２　', '', '', 'wa2-2.jpg', '', 'image/jpeg', 173950, 6),
(35, '蒼', '', '', 'null1f4ac0adb1841922.jpg', '', 'image/jpeg', 927701, 21),
(36, '夢美', '', '', 'null-3585e991b5411fec.jpg', '', 'image/jpeg', 1315179, 22),
(37, '高原', '', '', 'null-6f299fdf164f037.jpg', '', 'image/jpeg', 924560, 22),
(38, '専売', '', '', 'null-5039d2b89c09a52d.jpg', '', 'image/jpeg', 92962, 21),
(39, '羽美', '', '', 'null-3d4e26fdd104105c.jpg', '', 'image/jpeg', 683234, 21),
(40, 'しろは', '', '', 'null13e98e39bdadf861.jpg', '', 'image/jpeg', 887640, 21),
(41, '風子', '', '', '43420 clannad furukawa_nagisa.jpg', '', 'image/jpeg', 1393860, 21),
(42, '琴美', '', '', '43600 clannad flowers ichinose_kotomi umbrella.jpg', '', 'image/jpeg', 1732391, 1),
(43, 'じん', '', '', '人類.jpg', '', 'image/jpeg', 360674, 21),
(44, 'しろはとうみ', '', '', 'null-5db1fd067403f498.jpg', '', 'image/jpeg', 937788, 6),
(45, 'しろは', '', '', 'null-3b558dd2f47f14e3.jpg', '', 'image/jpeg', 837050, 6),
(46, '寝取ろ', '', '', 'null58e28361041d810.jpg', '', 'image/jpeg', 709466, 6),
(47, 'Last Moment', '', '', 'null1a52e150a152d6d1.jpg', '', 'image/jpeg', 618921, 1),
(48, 'He meets her.', '', '', 'null17c0002f83168a17.jpg', '', 'image/jpeg', 900425, 2),
(49, '七海', 'This is Caption', '&lt;p&gt;This is description.&lt;/p&gt;', 'null-4a9a53a6a99f2ff3.jpg', 'This is Text', 'image/jpeg', 1058714, 2),
(50, 'oOOOO', 'This is Caption', '&lt;p&gt;asfsdfasdf&lt;/p&gt;', 'wallhaven-511084.png', 'This is Text', 'image/png', 6128259, 2),
(51, '先验方法论', '无言', '如果我把纯粹的和思辨的理性的一切知识的总和视为我们至少在自己心中已有的理念的一座建筑，那么我们就可以说：我们在先验要素论中已经估算了建筑材料&amp;hellip;&amp;hellip;人们尽管可以在逻辑上随意否定地表达一切命题，但我们就一般知识的内容而言，无论知识是通过一个判断得到扩展还是受到限制，否定的命题的特有任务却仅仅只是阻止错误。因此，应当阻止一种错误认识的否定命题，在毕竟永远没有错误可能的地方，虽然是十分正确的&lt;/p&gt;', 'index-59_1.jpg', '', 'image/jpeg', 3681659, 26),
(54, 'No Title', 'This is Caption', '&lt;p&gt;TestTEsTETESTsETSETSTS&lt;/p&gt;', 'null6242bd504341faa6.jpg', 'This is Text', 'image/jpeg', 747508, 26),
(55, 'Ao', 'NO ', '&lt;p&gt;NO&lt;/p&gt;', 'null4c156344a5a425f2.jpg', 'NO', 'image/jpeg', 584188, 2),
(56, 'Sakura', '伝えたいこと、たったひとつ 瞬間を閉じこめた永遠。', '&lt;pre style=&quot;font-family: monospace, monospace; background-color: #f8f9fa; border: 1px solid #eaecf0; padding: 1em; white-space: pre-wrap; line-height: 1.3em; overflow-wrap: break-word; font-size: 16px;&quot;&gt;春。 \r\n世界的な美術家である父の死により、天涯孤独となった主人公・草薙直哉は、親友である夏目圭の家へと世話になることになる。\r\nそこには、直哉が通う学園の担任である夏目藍、圭の妹で女優の夏目雫との交流が待っていた。 \r\nそして、新学期の到来と共に、遠い昔に転校した幼なじみ・御桜稟が、再び直哉の前に現れる。\r\n風に巻く桜の花びらの向こう、それは、約束されていた再会の如く――。\r\n時の刻みが想いを重ね、感情の奔流が形になるとき、そこで出会う光景とは? &lt;/pre&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '500px-Sakura_No_Uta.jpg', '「それが虚無ならば虚無自身がこのとほりで ある程度まではみんなに共通いたします」', 'image/jpeg', 41144, 2),
(57, 'Test', 'This is Caption', '&lt;p&gt;fsdflsadfjksjdfsjadklfja&lt;/p&gt;', 'index-36_1.jpg', '「それが虚無ならば虚無自身がこのとほりで ある程度まではみんなに共通いたします」', 'image/jpeg', 3192099, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `user_image`) VALUES
(1, '2342', '12314213', '可愛い', 'fはsd；fjっsfj', 'kanon_17.jpg'),
(2, 'Pyra', '1234', 'PyraPyra', 'Homura', '1543589073129.png'),
(3, 'Cari', '1234511111', 'Caric', 'Linnnnnn', 'null-5039d2b89c09a52d.jpg'),
(6, 'Hikari', 'Rex', 'Homura', 'Hikaritian', 'images-30.jpg'),
(7, 'Shin', 'Touma', 'Homura', 'Di', 'images-40.jpg'),
(8, 'Metsu', 'Touma', 'Homura', 'Di', 'images-33.jpg'),
(18, 'Ogiso', 'Touma', 'Homura', 'Di', '43600%20clannad%20flowers%20ichinose_kotomi%20umbrella.jpg'),
(21, 'ccccc', '12345', 'ccccccccc', 'ccccc', 'images-14.jpg'),
(22, 'Ficus', 'dancedance', 'Ficus', 'carica', ''),
(25, 'Oiuiou', '1234', 'HUIHUI', 'HUIHUI', ''),
(26, 'Kant', '1234', 'Immanuel Kant', 'Kant', 'null-5db1fd067403f498.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Database: `loginapp`
--
CREATE DATABASE IF NOT EXISTS `loginapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `loginapp`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap\r\n'),
(3, 'Java'),
(4, 'Machine Learning'),
(5, 'sdfa'),
(6, 'Test'),
(7, 'Homura'),
(8, 'Hikari'),
(11, 'Update Category'),
(12, 'Update Category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(7) NOT NULL,
  `comment_post_id` int(7) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 10, 'Pyra', 'philoall@outlook.com', 'well pyra loves rex but rex loves hikari', 'approved', '2019-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(6) NOT NULL,
  `post_category_id` int(6) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Xenoblade 2', 'Rex', '2018-01-03', 'kotomi.jpg', 'Rex loves both Hikari and Homura', 'Edwin xenoblade php javascript', 1, 'draft'),
(2, 2, 'White Album 2', 'Setsuna', '2019-05-14', 'koharu.jpg', '春希くん、いで', 'php javascript deeplearning', 1, 'draft'),
(3, 3, 'ゼノブレド２', 'ニア', '2019-05-08', 'fuko.jpg', 'さよなら', 'php', 2, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'xmen', 'xmen'),
(2, 'Pyra', 'Rex'),
(3, 'Ka', 'Ga'),
(4, 'Shin', 'Lara'),
(5, 'Shin', 'Lara'),
(7, 'Metsu', 'Reason'),
(8, 'mesh', 'mesh'),
(9, 'mesh', 'mesh'),
(11, 'Nia', 'Nia'),
(12, 'sdfla;sga', 'asdf;lasd'),
(13, 'Edwin Like', '*0'),
(14, 'Kafka', '$2y$10$iusesomecrazystrings2uUcJeTAoWOdVQn/hDo2I8MaO5rCnnc3K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

