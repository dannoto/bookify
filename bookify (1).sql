-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2022 às 09:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookify`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_design`
--

CREATE TABLE `config_design` (
  `id` int(11) NOT NULL,
  `design_logo_short` varchar(200) NOT NULL,
  `design_logo_large` varchar(200) NOT NULL,
  `design_logo_home_banner` varchar(200) NOT NULL,
  `google_icon` varchar(200) NOT NULL,
  `apple_icon` varchar(200) NOT NULL,
  `apple_icon_url` varchar(200) NOT NULL,
  `google_icon_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_design`
--

INSERT INTO `config_design` (`id`, `design_logo_short`, `design_logo_large`, `design_logo_home_banner`, `google_icon`, `apple_icon`, `apple_icon_url`, `google_icon_url`) VALUES
(1, 'logo_short.png\r\n', 'logo.png\r\n', 'background.png', 'apple-icon.png', 'google-icon.png', '#', '#');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_gateway`
--

CREATE TABLE `config_gateway` (
  `id` int(11) NOT NULL,
  `gateway_public` varchar(200) NOT NULL,
  `gateway_secret` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_gateway`
--

INSERT INTO `config_gateway` (`id`, `gateway_public`, `gateway_secret`) VALUES
(1, 'teste_public', 'teste_key');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `ebook_title` varchar(200) NOT NULL,
  `ebook_description` text NOT NULL,
  `ebook_image` text NOT NULL,
  `ebook_tags` text NOT NULL,
  `ebook_date` varchar(200) NOT NULL,
  `ebook_time` varchar(200) NOT NULL,
  `ebook_user` varchar(200) NOT NULL,
  `ebook_status` int(11) NOT NULL COMMENT '1 - ativo -0 arquivado',
  `ebook_delete_status` int(11) NOT NULL,
  `ebook_precificacao` int(11) NOT NULL COMMENT '0 - free 1 - preemium',
  `ebook_category` int(11) NOT NULL,
  `ebook_featured` int(11) NOT NULL,
  `ebook_publisher` varchar(200) NOT NULL,
  `ebook_author` varchar(200) NOT NULL,
  `ebook_type` varchar(200) NOT NULL DEFAULT 'audiobook',
  `ebook_duration` varchar(200) DEFAULT '0',
  `ebook_chapter` varchar(200) DEFAULT NULL,
  `ewbook_progress` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks`
--

INSERT INTO `ebooks` (`id`, `ebook_title`, `ebook_description`, `ebook_image`, `ebook_tags`, `ebook_date`, `ebook_time`, `ebook_user`, `ebook_status`, `ebook_delete_status`, `ebook_precificacao`, `ebook_category`, `ebook_featured`, `ebook_publisher`, `ebook_author`, `ebook_type`, `ebook_duration`, `ebook_chapter`, `ewbook_progress`) VALUES
(11, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', '7777777777777', '2022-10-26', '07:33:04', '1', 0, 0, 1, 4, 4, '7777777777777', '7777777777777', 'audiobook', '0', NULL, NULL),
(12, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'asdsa, asdasdas asdasd, asdasd, asd', '2022-10-27', '04:02:21', '1', 1, 0, 0, 1, 1, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(13, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'asdsa, asdasdas asdasd, asdasd, asd', '2022-10-26', '20:19:40', '1', 1, 0, 0, 1, 1, 'yy', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(14, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', '', '2022-10-26', '20:33:39', '1', 0, 0, 0, 1, 2, 'yy', 'yyy', 'audiobook', '0', NULL, NULL),
(15, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'asdsa, asdasdas asdasd, asdasd, asd', '2022-10-28', '18:29:29', '1', 1, 1, 0, 35, 13, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', '25', NULL),
(16, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '18:29:52', '1', 1, 1, 1, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(17, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'asdsa, asdasdas asdasd, asdasd, asd', '2022-10-28', '18:29:46', '1', 1, 1, 0, 33, 11, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(18, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'asdsa, asdasdas asdasd, asdasd, asd', '2022-10-28', '18:29:36', '1', 1, 1, 1, 34, 12, 'uBook', 'yyy', 'audiobook', '0', NULL, NULL),
(19, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '18:29:52', '1', 1, 1, 1, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(20, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '18:29:52', '1', 1, 1, 1, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '158.23999999999998', NULL, NULL),
(21, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'twiitter, elon musk, pinga', '2022-10-29', '01:22:37', '1', 1, 1, 0, 32, 0, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(22, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '18:29:52', '1', 1, 1, 1, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(23, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '23:24:48', '1', 1, 1, 0, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(24, 'AUDIOBOOK EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6ea9ab1baa0efb9e19094440c317e21b/default.png', 'saude, finanças', '2022-10-28', '23:24:39', '1', 1, 1, 0, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '0', NULL, NULL),
(25, 'Story Telling', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/assets/img/ebooks/6364d3f0f495b6ab9dcf8d3b5c6e0b01/823343870Imagem4.png', 'saude, finanças', '2022-11-20', '22:04:29', '1', 1, 1, 1, 32, 10, 'uBook', 'Daniel Ribeiro', 'audiobook', '23.14', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_audios`
--

CREATE TABLE `ebooks_audios` (
  `id` int(11) NOT NULL,
  `audio_title` varchar(200) NOT NULL,
  `audio_description` varchar(200) NOT NULL,
  `audio_file` varchar(200) NOT NULL,
  `audio_duration` varchar(200) NOT NULL,
  `audio_date` varchar(200) NOT NULL,
  `audio_time` varchar(200) NOT NULL,
  `audio_user` int(11) NOT NULL,
  `audio_status` int(11) NOT NULL,
  `audio_delete_status` int(11) NOT NULL,
  `audio_chapter` int(11) NOT NULL,
  `audio_ebook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_audios`
--

INSERT INTO `ebooks_audios` (`id`, `audio_title`, `audio_description`, `audio_file`, `audio_duration`, `audio_date`, `audio_time`, `audio_user`, `audio_status`, `audio_delete_status`, `audio_chapter`, `audio_ebook`) VALUES
(46, 'xxx', 'xxx', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1834871860file_example_MP4_480_1_5MG.mp4', '55.92', '2022-11-02', '03:09:56', 1, 1, 0, 13, 25),
(47, 'DANIEL RIBEIRO', 'vvnnnnnnnnnnnnn', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1616553177ffffffff.mp4', '55', '2022-11-11', '17:30:41', 1, 1, 0, 16, 25),
(48, 'bnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnn', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/879855043ffffffff.mp4', '89.47', '2022-11-02', '03:30:10', 1, 1, 0, 17, 25),
(49, 'tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sd', 'fdgdgf', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/543738870file_example_MP4_480_1_5MG.mp4', '55.92', '2022-11-10', '07:31:42', 1, 1, 1, 16, 25),
(50, 'tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sd', 'rey', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1982781061file_example_MP4_480_1_5MG.mp4', '23.7', '2022-11-10', '09:32:32', 1, 1, 0, 17, 25),
(51, 'tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sd', 'tyutyuuytu', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1632769696file_example_MP4_480_1_5MG.mp4', '32.7', '2022-11-10', '09:34:26', 1, 1, 0, 16, 25),
(52, 'tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sd', 'ghhh', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1771724058ffffffff.mp4', '54.92', '2022-11-12', '03:05:05', 1, 1, 1, 16, 25),
(53, 'tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sdfgfdg  ds tttttttd sd', 'trrt', '/assets/audios/8e296a067a37563370ded05f5a3bf3ec/1294600657ffffffff.mp4', '55.92', '2022-11-12', '06:31:18', 1, 1, 1, 18, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_audios_progress`
--

CREATE TABLE `ebooks_audios_progress` (
  `id` int(11) NOT NULL,
  `progress_ebook` int(11) NOT NULL,
  `progress_chapter` int(11) NOT NULL,
  `progress_audio` int(11) NOT NULL,
  `progress_date` varchar(200) NOT NULL,
  `progress_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_audios_progress`
--

INSERT INTO `ebooks_audios_progress` (`id`, `progress_ebook`, `progress_chapter`, `progress_audio`, `progress_date`, `progress_user`) VALUES
(8, 25, 16, 49, '2022-11-20- 00:02:43', '7'),
(9, 25, 16, 52, '2022-11-20- 00:03:00', '7'),
(10, 25, 18, 53, '2022-11-20- 00:03:39', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_categories`
--

CREATE TABLE `ebooks_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_description` varchar(200) NOT NULL,
  `category_delete_status` int(11) NOT NULL DEFAULT 1 COMMENT '0 - deletado 1- ativo',
  `category_slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_categories`
--

INSERT INTO `ebooks_categories` (`id`, `category_name`, `category_description`, `category_delete_status`, `category_slug`) VALUES
(1, 'Investimentos', 'Aprenda a Investir', 0, ''),
(2, 'Psicologia', '', 0, ''),
(3, 'Economia', '', 0, ''),
(4, 'Motivação', '', 0, ''),
(5, 'teste', 'ik', 0, ''),
(6, 'teste', 'ik', 0, ''),
(7, 'teste', 'ik', 0, ''),
(8, 'teste', 'ooooooooo', 0, ''),
(9, 'Saúde', 'Melhore sua saúde com informações relevantes', 0, ''),
(10, 'teste', 'ooooooooo', 0, ''),
(11, 'teste', 'ooooooooo', 0, ''),
(12, 'teste', '', 0, ''),
(13, 'teste99', '', 0, ''),
(14, 'teste99', 'JKJKJ', 0, ''),
(15, 'teste99', 'JKJKJ', 0, ''),
(16, 'teste99', 'JKJKJ', 0, ''),
(17, 'ssd', 'asdasd', 0, ''),
(18, 'ssd', 'asdasd', 0, ''),
(19, 'ssd', 'asdasd', 0, ''),
(20, 'ssd', 'asdasd', 0, ''),
(21, 'daniel ribeiro', '', 0, ''),
(22, 'daniel ribeiro', 'nn', 0, ''),
(23, 'daniel ribeiro', 'nn', 0, ''),
(24, 'daniel ribeiro', 'nn', 0, ''),
(25, 'jhhgj', '', 0, ''),
(26, 'dsfgfdsgfdg', '', 0, ''),
(27, 'Motivação', 'Motivação é bom', 0, ''),
(28, 'Motivação', 'Tenha motivação todo dia', 0, ''),
(29, 'Finanças', 'Aprenda a gerir suas finanças', 0, ''),
(30, 'teste', 'teste', 0, ''),
(31, 'dfdf', '', 0, ''),
(32, 'Finanças', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'financas'),
(33, 'Motivação', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'motivacao'),
(34, 'Saúde', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'saude'),
(35, 'Investimentos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'investimentos'),
(36, 'mais lidos', '', 0, 'mais-lidos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_chapters`
--

CREATE TABLE `ebooks_chapters` (
  `id` int(11) NOT NULL,
  `chapter_ebook` int(11) NOT NULL,
  `chapter_title` varchar(200) NOT NULL,
  `chapter_description` varchar(200) NOT NULL,
  `chapter_duration` varchar(200) NOT NULL,
  `chapter_user` int(11) NOT NULL,
  `chapter_status` int(11) NOT NULL,
  `chapter_delete_status` int(11) NOT NULL COMMENT '1 - ativo 0 -excluido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_chapters`
--

INSERT INTO `ebooks_chapters` (`id`, `chapter_ebook`, `chapter_title`, `chapter_description`, `chapter_duration`, `chapter_user`, `chapter_status`, `chapter_delete_status`) VALUES
(1, 20, 'cpaitulo 1', 'yhhhhhhhhh', '0', 1, 1, 0),
(2, 20, 'cpaitulo 2', 'cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cpaitulo 2 cp', '0', 1, 1, 0),
(6, 20, 'cpaitulo 3', 'asdkjas dsa d sad', '0', 1, 1, 0),
(7, 20, 'cpaitulo 1', 'tyryrty trye trye rt', '0', 1, 1, 0),
(8, 20, '$(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_desc', '$(\'#add_chapter_description\').val()  $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_description\').val() $(\'#add_chapter_des', '4.440892098500626e-16', 1, 1, 0),
(9, 20, ' Esse Alexandre de Moraes precisa ser tirado do poder! Ele acha que pode tudo! Cuidado que o tombo será feio!', '', '0', 1, 1, 0),
(10, 20, 'cpaitulo 1 ', 'cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cpaitulo 1 cp', '0', 1, 1, 0),
(11, 20, 'fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd ', 'fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd fsd fasdf fsd ', '82.67', 1, 1, 1),
(12, 20, '123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 ', '123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 123 ', '75.57', 1, 1, 1),
(13, 25, 'cpaitulo 5', '', '90.30000000000003', 1, 1, 0),
(14, 25, 'cpaitulo 3', '', '0', 1, 1, 0),
(15, 25, 'x', 'x', '0', 1, 1, 0),
(16, 25, 'Capítulo 1', '', '-32.78', 1, 1, 1),
(17, 25, 'Captiulo 2', '', '0', 1, 1, 0),
(18, 25, 'cpaitulo 2', 'rtyry', '55.92', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_chapters_images`
--

CREATE TABLE `ebooks_chapters_images` (
  `id` int(11) NOT NULL,
  `image_audio` int(11) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `image_description` varchar(200) NOT NULL,
  `image_file` text NOT NULL,
  `image_user` int(11) NOT NULL,
  `image_delete_status` int(11) NOT NULL,
  `image_chapter` varchar(200) NOT NULL,
  `image_ebook` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_chapters_images`
--

INSERT INTO `ebooks_chapters_images` (`id`, `image_audio`, `image_title`, `image_description`, `image_file`, `image_user`, `image_delete_status`, `image_chapter`, `image_ebook`) VALUES
(1, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/2105676940download.jpeg', 1, 0, '16', '25'),
(2, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1801866641Imagem4.png', 1, 0, '16', '25'),
(3, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1097938504Imagem4.png', 1, 0, '16', '25'),
(4, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1295906778Imagem4.png', 1, 0, '16', '25'),
(5, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/515463129Imagem4.png', 1, 0, '16', '25'),
(6, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1094913155download.jpeg', 1, 0, '16', '25'),
(7, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1010588730Imagem4.png', 1, 0, '16', '25'),
(8, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/2005989984Imagem4.png', 1, 0, '16', '25'),
(9, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1372195146Imagem4.png', 1, 0, '16', '25'),
(10, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/206151087Imagem4.png', 1, 0, '16', '25'),
(11, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1959513677Imagem4.png', 1, 0, '16', '25'),
(12, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1009248582Imagem4.png', 1, 0, '16', '25'),
(13, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/721033819Imagem4.png', 1, 0, '16', '25'),
(14, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/15470000download.jpeg', 1, 0, '16', '25'),
(15, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/876811799Imagem4.png', 1, 0, '16', '25'),
(16, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/794857397download.jpeg', 1, 0, '16', '25'),
(17, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1430565344CapturadeTela(1258).png', 1, 0, '16', '25'),
(18, 51, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/2139318684CapturadeTela(1258).png', 1, 0, '16', '25'),
(19, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/200979201CapturadeTela(1258).png', 1, 0, '16', '25'),
(20, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/662291823CapturadeTela(1258).png', 1, 0, '16', '25'),
(21, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/399530189CapturadeTela(1257).png', 1, 0, '16', '25'),
(22, 49, 'text', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/2057060555CapturadeTela(1254).png', 1, 0, '16', '25'),
(23, 49, 'Daniel Ribeiro do Amaral', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/428712671CapturadeTela(1258).png', 1, 0, '16', '25'),
(24, 47, 'Imagem 1', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1236700618CapturadeTela(1258).png', 1, 1, '16', '25'),
(25, 47, 'Imagem 2', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/314753550CapturadeTela(1256).png', 1, 1, '16', '25'),
(26, 49, 'Imagem 1', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1047998774CapturadeTela(1248).png', 1, 1, '16', '25'),
(27, 49, 'Imagem 2', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/477688019CapturadeTela(1247).png', 1, 1, '16', '25'),
(28, 53, 'Imagem 1', 'text', '/assets/img/audios/8e296a067a37563370ded05f5a3bf3ec/1195160980download.jpeg', 1, 1, '18', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ebooks_features`
--

CREATE TABLE `ebooks_features` (
  `id` int(11) NOT NULL,
  `featured_name` varchar(200) NOT NULL,
  `featured_description` varchar(200) NOT NULL,
  `featured_delete_status` int(11) NOT NULL,
  `featured_slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ebooks_features`
--

INSERT INTO `ebooks_features` (`id`, `featured_name`, `featured_description`, `featured_delete_status`, `featured_slug`) VALUES
(1, 'Gratuitos', '', 0, ''),
(2, 'Lançamentos', '', 0, ''),
(3, 'BestSellers', '', 0, ''),
(4, 'Podcasts', '', 0, ''),
(5, 'teste', '', 0, ''),
(6, 'saude', 'pao', 0, ''),
(7, 'sdsf dsf dsf d ', '', 0, ''),
(8, 'sdsf dsf dsf d ', 'sdsf dsf dsf d ', 0, ''),
(9, 'aula', 'aula', 0, ''),
(10, 'Lançamentos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'lancamentos'),
(11, 'Podcasts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'podcasts'),
(12, 'Bestsellers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 'bestsellers'),
(13, 'Gratuitos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 0, 'gratuitos'),
(14, 'Rádinâmica', '', 0, 'radinamica'),
(15, 'Mais Lidos', '', 0, 'mais lidos'),
(16, 'Mais Lidos', '', 0, 'mais-lidos'),
(17, 'SAude', '', 0, 'saude'),
(18, 'SAude', '', 0, 'saude'),
(19, 'SAude', '', 0, 'saude');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `faq_category_title` varchar(200) NOT NULL,
  `faq_category_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `faq_category_title`, `faq_category_description`) VALUES
(1, 'CATEGORIAS EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a'),
(2, 'CATEGORIAS EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'),
(3, 'CATEGORIAS EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'),
(4, 'CATEGORIAS EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq_content`
--

CREATE TABLE `faq_content` (
  `id` int(11) NOT NULL,
  `faq_category` int(11) NOT NULL,
  `faq_title` varchar(200) NOT NULL,
  `faq_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `faq_content`
--

INSERT INTO `faq_content` (`id`, `faq_category`, `faq_title`, `faq_description`) VALUES
(1, 1, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(2, 1, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(3, 2, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(4, 2, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(5, 3, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(6, 3, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(7, 4, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(8, 4, 'Pergunta Exemplo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(200) NOT NULL,
  `plan_description` varchar(200) NOT NULL,
  `plan_price` float NOT NULL,
  `plan_library_limit` int(10) NOT NULL,
  `plan_gateway_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_surname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_date` varchar(200) NOT NULL,
  `user_time` varchar(200) NOT NULL,
  `user_plan` int(11) NOT NULL,
  `user_refer` varchar(200) NOT NULL,
  `user_origin` varchar(200) DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 - ativo - 2 banido',
  `user_image` varchar(200) NOT NULL DEFAULT 'avatar.png',
  `user_street` varchar(200) DEFAULT NULL,
  `user_state` varchar(200) DEFAULT NULL,
  `user_city` varchar(200) DEFAULT NULL,
  `user_district` varchar(200) DEFAULT NULL,
  `user_cep` varchar(200) DEFAULT NULL,
  `user_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_date`, `user_time`, `user_plan`, `user_refer`, `user_origin`, `user_status`, `user_image`, `user_street`, `user_state`, `user_city`, `user_district`, `user_cep`, `user_token`) VALUES
(2, 'Daniel', 'Ribeiro ', 'dantarserytrey@outlook.comx', '5e2b488f90ac6ba7c7896c8537dd93f8', '22-10-2022', '19:35:17', 1, '556561277', '', 1, '192967424download.jpeg', 'x', '', '', '', '', '0'),
(3, '55', '55', '55@gmail.com', '612553ddb25198fd3c2c90540df9a70a', '22-10-2022', '19:44:34', 3, '195354663', '556561277', 1, '397253561download.jpeg', '55', '55', '55', '55', '55', '0'),
(6, 'Daniel', 'Ribeiro', 'dantars@outlook.com', '612553ddb25198fd3c2c90540df9a70a', '25-10-2022', '16:22:58', 1, '1833345040', '556561277', 1, 'avatar.png', NULL, NULL, NULL, NULL, NULL, '601390131'),
(7, 'Vinicius', 'Souza', 'vinicius@gmail.com', '9169178f42af015d30bc9f7cf3255f1b', '28-10-2022', '09:06:00', 1, '1877786549', '556561277', 1, 'default.png', '', '', '', '', '', '823338027'),
(9, 'Monnik', 'Silva', 'monnik@gmail.com', '612553ddb25198fd3c2c90540df9a70a', '14-11-2022', '19:08:42', 0, '506016150', '556561277', 1, 'default.png', NULL, NULL, NULL, NULL, NULL, '1719645188'),
(10, 'Julio', 'Cesar', 'julio@gmail.com', '612553ddb25198fd3c2c90540df9a70a', '14-11-2022', '19:18:37', 3, '156409224', '556561277', 1, 'default.png', NULL, NULL, NULL, NULL, NULL, '1958954962');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_library`
--

CREATE TABLE `users_library` (
  `id` int(11) NOT NULL,
  `library_ebook_id` int(11) NOT NULL,
  `library_user_id` int(11) NOT NULL,
  `library_date` varchar(200) NOT NULL,
  `library_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_library`
--

INSERT INTO `users_library` (`id`, `library_ebook_id`, `library_user_id`, `library_date`, `library_time`) VALUES
(2, 22, 7, '2022-10-29', '22:21:43'),
(4, 15, 10, '2022-11-14', '21:42:33'),
(5, 22, 10, '2022-11-14', '21:52:06'),
(6, 21, 10, '2022-11-14', '21:52:34'),
(7, 20, 10, '2022-11-14', '21:52:41'),
(13, 16, 7, '2022-11-20', '23:50:27'),
(14, 15, 7, '2022-11-20', '23:51:31'),
(16, 23, 7, '2022-11-20', '23:53:55'),
(17, 21, 7, '2022-11-20', '23:54:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_plans`
--

CREATE TABLE `users_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(200) NOT NULL,
  `plan_description` varchar(200) NOT NULL,
  `plan_price` float NOT NULL,
  `plan_type` int(11) NOT NULL COMMENT '1 - mensal / 2 - trimestral / 3 - semestral / 4 -anual',
  `plan_limit_library` int(11) NOT NULL,
  `plan_limit_quantity` int(11) NOT NULL,
  `plan_limit_free` int(11) NOT NULL COMMENT '1 - permitido / 0 - negado',
  `plan_limit_premium` int(11) NOT NULL COMMENT '1 - permitido / 0 - negado',
  `plan_gateway_id` varchar(200) NOT NULL,
  `plan_delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_plans`
--

INSERT INTO `users_plans` (`id`, `plan_name`, `plan_description`, `plan_price`, `plan_type`, `plan_limit_library`, `plan_limit_quantity`, `plan_limit_free`, `plan_limit_premium`, `plan_gateway_id`, `plan_delete_status`) VALUES
(1, 'PLANO EXEMPLO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 299, 1, 2, 5, 1, 1, '3204723894702981472', 1),
(2, 'PLANO TESTE', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 199, 2, -1, -1, 1, 1, '3204723894702981472', 1),
(3, 'PLANO GRATUITO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 0, 1, 10, 10, 1, 0, '123456789', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_watch`
--

CREATE TABLE `users_watch` (
  `id` int(11) NOT NULL,
  `watch_user` int(11) NOT NULL,
  `watch_ebook` int(11) NOT NULL,
  `watch_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_watch`
--

INSERT INTO `users_watch` (`id`, `watch_user`, `watch_ebook`, `watch_date`) VALUES
(23, 7, 25, '2022-11-20 21:57:14'),
(24, 7, 22, '2022-11-20 22:48:09'),
(25, 7, 20, '2022-11-20 22:48:15'),
(26, 7, 18, '2022-11-20 22:48:20'),
(27, 7, 17, '2022-11-20 22:48:25'),
(28, 7, 15, '2022-11-20 23:53:09'),
(29, 7, 21, '2022-11-20 23:59:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `config_design`
--
ALTER TABLE `config_design`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config_gateway`
--
ALTER TABLE `config_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_audios`
--
ALTER TABLE `ebooks_audios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_audios_progress`
--
ALTER TABLE `ebooks_audios_progress`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_categories`
--
ALTER TABLE `ebooks_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_chapters`
--
ALTER TABLE `ebooks_chapters`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_chapters_images`
--
ALTER TABLE `ebooks_chapters_images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ebooks_features`
--
ALTER TABLE `ebooks_features`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `faq_content`
--
ALTER TABLE `faq_content`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_library`
--
ALTER TABLE `users_library`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_plans`
--
ALTER TABLE `users_plans`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_watch`
--
ALTER TABLE `users_watch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `config_design`
--
ALTER TABLE `config_design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `config_gateway`
--
ALTER TABLE `config_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `ebooks_audios`
--
ALTER TABLE `ebooks_audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `ebooks_audios_progress`
--
ALTER TABLE `ebooks_audios_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `ebooks_categories`
--
ALTER TABLE `ebooks_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `ebooks_chapters`
--
ALTER TABLE `ebooks_chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `ebooks_chapters_images`
--
ALTER TABLE `ebooks_chapters_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `ebooks_features`
--
ALTER TABLE `ebooks_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `faq_content`
--
ALTER TABLE `faq_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users_library`
--
ALTER TABLE `users_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users_plans`
--
ALTER TABLE `users_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users_watch`
--
ALTER TABLE `users_watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
