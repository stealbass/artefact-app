-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2018 at 12:08 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artefact`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`) VALUES
(1, 'happi', 'zamahappi@gmail.com'),
(2, 'Happi Olivier', 'happiolivier@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `vote_id` int(11) NOT NULL,
  `page_id` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `total_votes` int(11) NOT NULL DEFAULT '0',
  `total_value` int(11) NOT NULL DEFAULT '0',
  `used_ips` longtext COLLATE latin1_german1_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`vote_id`, `page_id`, `total_votes`, `total_value`, `used_ips`) VALUES
(476, '30', 0, 0, NULL),
(477, '33', 0, 0, NULL),
(478, '7', 1, 1, 'a:1:{i:0;s:9:"127.0.0.1";}'),
(479, '6', 0, 0, NULL),
(480, '29', 1, 1, 'a:1:{i:0;s:9:"127.0.0.1";}'),
(481, '14', 0, 0, NULL),
(482, '65', 0, 0, NULL),
(483, '8', 0, 0, NULL),
(484, '5', 0, 0, NULL),
(485, '15', 0, 0, NULL),
(486, '28', 0, 0, NULL),
(487, '66', 0, 0, NULL),
(488, '27', 0, 0, NULL),
(489, '32', 0, 0, NULL),
(490, '9', 0, 0, NULL),
(491, '49', 0, 0, NULL),
(492, '12', 0, 0, NULL),
(493, '11', 0, 0, NULL),
(494, '43', 0, 0, NULL),
(495, '67', 0, 0, NULL),
(496, '10', 0, 0, NULL),
(497, '34', 0, 0, NULL),
(498, '46', 0, 0, NULL),
(499, '13', 0, 0, NULL),
(500, '19', 0, 0, NULL),
(501, '47', 0, 0, NULL),
(502, '20', 0, 0, NULL),
(503, '45', 0, 0, NULL),
(504, '21', 0, 0, NULL),
(505, '57', 0, 0, NULL),
(506, '40', 0, 0, NULL),
(507, '37', 0, 0, NULL),
(508, '22', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Full_Name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`User_ID`, `Username`, `Password`, `Full_Name`) VALUES
(3, 'jeff', '166ee015c0e0934a8781e0c86a197c6e', 'Happi Olivier');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conseil`
--

CREATE TABLE `tbl_conseil` (
  `Conseil_ID` int(11) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `postSlug` varchar(1000) NOT NULL,
  `Bref` varchar(5000) NOT NULL,
  `Content` varchar(50000) NOT NULL,
  `Visage` tinyint(3) NOT NULL,
  `Bebe` tinyint(3) NOT NULL,
  `Photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conseil`
--

INSERT INTO `tbl_conseil` (`Conseil_ID`, `Title`, `postSlug`, `Bref`, `Content`, `Visage`, `Bebe`, `Photo`) VALUES
(30, 'Astuce pour bÃ©bÃ©', 'astuce-pour-bÃ©bÃ©', 'Le bain quotidien, est-ce essentiel ?\r\nCâ€™est un moment important de la journÃ©e pour votre bÃ©bÃ©. Câ€™est souvent un tÃªte-Ã -tÃªte privilÃ©giÃ© avec son papa ou sa maman, un moment dâ€™apaisement et de dÃ©couvertes tactiles et olfactives. Câ€™est lâ€™occasion de dÃ©couvrir de nouvelles sensations, nÃ©cessaires Ã  son dÃ©veloppement sensoriel. Du point de vue de lâ€™hygiÃ¨ne, le bain quotidien permet d\'Ã©liminer toute trace de transpiration ou de rÃ©gurgitations. Il arrive toutefois que le mÃ©decin vous recommande de laver votre bÃ©bÃ© un jour sur deux, surtout sâ€™il a la peau sÃ¨che.', 'Le bain quotidien, est-ce essentiel ?<br><br>    Câ€™est un moment important de la journÃ©e pour votre bÃ©bÃ©. Câ€™est souvent un tÃªte-Ã -tÃªte privilÃ©giÃ© avec son papa ou sa maman, un moment dâ€™apaisement et de dÃ©couvertes tactiles et olfactives. Câ€™est lâ€™occasion de dÃ©couvrir de nouvelles sensations, nÃ©cessaires Ã  son dÃ©veloppement sensoriel. Du point de vue de lâ€™hygiÃ¨ne, le bain quotidien permet d\'Ã©liminer toute trace de transpiration ou de rÃ©gurgitations. Il arrive toutefois que le mÃ©decin vous recommande de laver votre bÃ©bÃ© un jour sur deux, surtout sâ€™il a la peau sÃ¨che.<br><br><br>Combien de temps peut-on laisser un bÃ©bÃ© dans lâ€™eau du bain ?<br><br>    Les premiÃ¨res semaines, on laisse le nourrisson quelques minutes dans lâ€™eau, juste le temps de le rincer. Il se refroidit trÃ¨s vite. Ensuite, au fil des mois, on peut le laisser barboter un peu. Certains bÃ©bÃ©s adorent le contact de lâ€™eau, dâ€™autres moins, il faut en tenir compte pour prolonger ou non le bain. Vous pouvez le distraire Ã©galement avec des jeux adaptÃ©s qui vont dans lâ€™eau.<br><br><br>Mon bÃ©bÃ© pleure tout le temps quand je le dÃ©shabille. Comment le calmer ?<br><br>    Les nourrissons nâ€™aiment pas trop Ãªtre manipulÃ©s, surtout quand il faut les dÃ©shabiller. Pour lâ€™apaiser au moment du bain, la salle de bains doit Ãªtre Ã  bonne tempÃ©rature (entre 20 et 22 Â°C) pour qu\'il nâ€™ait pas froid. Il faut Ã©galement Ãªtre bien organisÃ©e : mettez toutes ses affaires Ã  portÃ©e de main pour Ãªtre totalement disponible et rapide. Puis rassurez-le en lui parlant doucement. Quand il est en Ã¢ge dâ€™attraper de petits objets, donnez-lui par exemple un petit canard en plastique, quâ€™il gardera ensuite avec lui dans le bain.', 2, 1, 'upload/allaitement-photodisck-164839_L.jpg'),
(31, 'Connaissez-vous votre type de peau?', 'connaissez-vous-votre-type-de-peau', 'Il est important, voir mÃªme primordial de connaitre son type de peau afin d\'en savoir les besoins et de pouvoir convenablement en prendre soin. Il en existe quatre catÃ©gories: Les peaux sÃ¨ches, grasses, normales et mixtes. Dans quelle catÃ©gorie vous trouvez-vous?', 'Il est important, voir mÃªme primordial de connaitre son type de peau afin d\'en savoir les besoins et de pouvoir convenablement en prendre soin. Il en existe quatre catÃ©gories: Les peaux sÃ¨ches, grasses, normales et mixtes. Dans quelle catÃ©gorie vous trouvez-vous?<br><strong>Les peaux sÃ¨ches</strong><br>Si votre peau se dÃ©shydrate facilement, si elle manque de sÃ©bum ou quâ€™elle a peu ou pas du tout de poussÃ©e de bouton, alors votre peau est considÃ©rÃ©e comme sÃ¨che. Dans les cas extrÃªmes, ce type de peau manque dâ€™Ã©lasticitÃ© et peut Ãªtre trÃ¨s sensible au soleil, au vent et aux tempÃ©ratures froides.<br><strong>Comment entretenir ma peau sÃ¨che ?</strong><br>Pensez Ã  vous dÃ©maquiller chaque soir avant le couchÃ©. Rincez-vous le visage avec de lâ€™eau tiÃ¨de et sÃ©chez votre peau en la tapotant. Utilisez une crÃ¨me hydratante pour soulager la sensation de tiraillement et de desquamation due Ã  la dÃ©shydratation.<br><strong>Les peaux grasses</strong><br>Si votre peau brille gÃ©nÃ©ralement beaucoup aprÃ¨s lâ€™avoir nettoyÃ© et les pores sont dilatÃ©s; Si elle est sujette aux boutons, points noirs et a une texture plus granuleuse, alors votre peau est considÃ©rÃ©e comme grasse.<br><strong>Comment entretenir ma peau grasse ?</strong><br>Tout dâ€™abord, sachez que votre peau grasse attire plus dâ€™impuretÃ©s que les autres types de peaux par consÃ©quent, nettoyez-vous le visage deux fois par jour avec un nettoyant doux et de lâ€™eau tiÃ¨de. Rincez toujours avec de l\'eau tiÃ¨de. Utilisez des lingettes absorbantes pendant la journÃ©e pour limiter la brillance de votre peau. Les peaux grasses ont Ã©galement besoin dâ€™hydratation donc utilisez quotidiennement un hydratant pour empÃªcher les couches infÃ©rieures de votre peau de sÃ©cher.<br><strong>Les peaux normales</strong><br>Si la peau de votre nez est sÃ¨che et celle des joues tendue, elle est considÃ©rÃ©e comme normale. Il faut noter que la texture de ce type de peau peut changer en fonction des saisons, donc les peaux normales peuvent aussi Ãªtre lÃ©gÃ¨rement sÃ¨ches ou huileuses.<br><strong>Comment entretenir ma peau normale ?</strong><br>GÃ©nÃ©ralement, lâ€™entretien des peaux normales est moins compliquÃ©e que celle des autres types de peaux. Gardez juste les bons rÃ©flexes : se dÃ©maquiller avant le couchÃ©, lavez-vous le visage avec un nettoyant doux adaptÃ© aux peaux normales.<br><strong>Les peaux mixtes</strong><br>On dit dâ€™une peau quâ€™elle est mixte quand elle regroupe Ã  elle seule les caractÃ©ristiques de deux types de peaux. Une partie du visage produit beaucoup de sÃ©bum et est sujette aux boutons et le reste du visage est sec. Par exemple une peau sÃ¨che avec des papules dâ€™acnÃ© sur les joues et une peau normale avec des papules enflammÃ©es et de lâ€™acnÃ© sur le menton et autour de la bouche sont dites mixtes.<br><strong>Comment entretenir ma peau mixte ?</strong><br>Soignez chaque zone sÃ©parÃ©ment selon son type. Si lâ€™acnÃ© est sÃ©vÃ¨re, consultez un dermatologue ou un esthÃ©ticien.', 1, 2, 'upload/masque-visage-1200x480.jpg'),
(32, 'Astuce lumina', 'astuce-lumina', 'Alors câ€™est tout simple aujourdâ€™hui on a quelques petites astuce pour vous. Le gel douche et le lait de toilette Lumina aux extraits naturels de the vert, a Ã©tÃ© spÃ©cialement conÃ§u pour nettoyer et prendre soin au quotidien des peaux fragiles. Chers tÃ©lÃ©spectateurs Le the vert est riche en agent antioxydants et antibactÃ©riens, il constitue un excellent soin protecteur des agressions extÃ©rieures Egalement Il stimule et revitalise les barriÃ¨res cutanÃ©es de lâ€™Ã©piderme Pour vous ado Ã  la peau fragile nous vous conseillons lumina aux extraits naturels de thÃ© vert.', 'Chers ado il nâ€™est pas toujours Ã©vident de connaitre le gel douche ou le lait de toilette approprier a votre type de peau<br><br>    Alors câ€™est tout simple aujourdâ€™hui on a quelques petites astuce pour vous. Le gel douche et le lait de toilette Lumina aux extraits naturels de the vert, a Ã©tÃ© spÃ©cialement conÃ§u pour nettoyer et prendre soin au quotidien des peaux fragiles. Chers tÃ©lÃ©spectateurs Le the vert est riche en agent antioxydants et antibactÃ©riens, il constitue un excellent soin protecteur des agressions extÃ©rieures Egalement Il stimule et revitalise les barriÃ¨res cutanÃ©es de lâ€™Ã©piderme Pour vous ado Ã  la peau fragile nous vous conseillons lumina aux extraits naturels de thÃ© vert.<br><br><br>Le gel douche et le lait de toilette Lumina aux extraits naturels dâ€™avoine, ont Ã©tÃ© spÃ©cialement conÃ§u pour nettoyer et assurer une hydratation longue durÃ©e Ã  votre Ã©piderme.<br><br>    Les propriÃ©tÃ©s hydratantes de lâ€™avoine permettront Ã  lâ€™Ã©piderme de maintenir un niveau hydrique optimal. Pour vous ados Ã  la peau sÃ¨che ou dÃ©shydrater nous conseillons lumina aux extraits dâ€™avoine.', 1, 2, 'upload/lumina-1200x480.jpg'),
(33, 'Allaitement Maternel', 'allaitement-maternel', 'ChÃ¨res futures mamans, peut-Ãªtre ressentez vous naturellement le besoin dâ€™allaiter, peut-Ãªtre hÃ©sitez-vous encore, peut- Ãªtre vous avez reÃ§ues des contres indications Ã  cause dâ€™une affection grave. Vous avez des doutes? RÃ©flÃ©chissez bien pendant votre grossesse et choisissez en toute connaissance de cause le moyen de nutrition pour votre bÃ©bÃ©. Afin de vous aider Ã  faire un choix, nous vous vous prÃ©sentons dans les lignes adjacentes, les biens faits de lâ€™allaitement maternel ainsi que ses Â« inconvÃ©nients Â», les inconvÃ©nients de lâ€™allaitement artificiel et les prÃ©cautions Ã  prendre lors de lâ€™utilisation des biberons.', '<strong><span class="Apple-style-span">Lâ€™ALLAITEMENT MATERNEL ET ARTIFICIEL : BIEN FAITS ET INCONVÃ‰NIENTS<br><br></span></strong><span class="Apple-style-span">ChÃ¨res futures mamans, peut-Ãªtre ressentez vous naturellement le besoin dâ€™allaiter, peut-Ãªtre hÃ©sitez-vous encore, peut- Ãªtre vous avez reÃ§ues des contres indications Ã  cause dâ€™une affection grave. Vous avez des doutes? RÃ©flÃ©chissez bien pendant votre grossesse et choisissez en toute connaissance de cause le moyen de nutrition pour votre bÃ©bÃ©. Afin de vous aider Ã  faire un choix, nous vous vous prÃ©sentons dans les lignes adjacentes, les biens faits de lâ€™allaitement maternel ainsi que ses Â« inconvÃ©nients Â», les inconvÃ©nients de lâ€™allaitement artificiel et les prÃ©cautions Ã  prendre lors de lâ€™utilisation des biberons.<br><br><br>De prime Ã  bord, lâ€™allaitement maternel est le meilleur mode de nutrition pour votre bÃ©bÃ© Ã  moins que vous nâ€™ayez dÃ©veloppÃ© une aversion particuliÃ¨re. Les mÃ©decins conseillent six mois dâ€™allaitement au mieux. Les premiers jours, bÃ©bÃ© boira le colostrum qui prÃ©cÃ¨de le lait. Le colostrum est une sorte de Â« super lait Â» sans alternative qui contient les bonnes quantitÃ©s de protÃ©ines, de minÃ©raux, de vitamines et de matiÃ¨res grasses dont bÃ©bÃ© a besoin Ã  ce moment. Il contient, en outre, Ã©normÃ©ment dâ€™anticorps. Il a, enfin, un effet laxatif et aide bÃ©bÃ© Ã  se dÃ©barrasser du mÃ©conium, les premiÃ¨res selles verdÃ¢tres ou noirÃ¢tres et visqueuses. En plus, l\'allaitement protÃ¨ge l\'enfant contre les infections respiratoires, les otites, le diabÃ¨te, l\'obÃ©sitÃ©, les caries, les malocclusions la sclÃ©rose en plaques, l\'acuitÃ© visuelle et les effets antiallergiques. En plus, lâ€™allaitement favorise votre rÃ©tablissement corporel c\'est-Ã -dire, le rÃ©trÃ©cissement rapide de lâ€™utÃ©rus, rÃ©duction de la perte de sans, les menstruations tardent, et les hormones produites vous rendent rÃ©sistantes. Aussi, vous brÃ»lez quelque 500 calories supplÃ©mentaires par jour et vous crÃ©ez un lien affectif maman-enfant lors du contact avec bÃ©bÃ©.<br><br><br>Certes, l\'allaitement est plus importante que le biberon mais derriÃ¨re la rÃ©ticence ou le refus d\'allaiter transparaissent souvent des inconvÃ©nients surmontable, profondes, inavouÃ©es par les mÃ¨res et rarement Ã©voquÃ©es par les mÃ©decins tels que : disponibilitÃ©, fuites, seins abimÃ©s et troubles de la sexualitÃ©. Pour y remÃ©dier, il est conseillÃ© dâ€™Ã©viter la prise de poids, et porter un soutien gorge adaptÃ©.<br>Bien que lâ€™allaitement maternel soi conseillÃ© il est recommandÃ© pour celles qui ne peuvent pas, de recourir a lâ€™allaitement artificiel via le biberon en ver ou en plastique. NÃ©anmoins, quelques informations sont nÃ©cessaires : Les biberons en verre sont faciles Ã  stÃ©riliser et ils rÃ©sistent au temps. Du fait de leur durÃ©e de vie plus longue, ils sont plus Ã©conomiques, ne prÃ©sentent aucun risque sanitaire, propre Ã  leur constitution. NÃ©anmoins, ils sont fragiles et dangereux en cas de chute lorsque le bÃ©bÃ© est en mesure de tenir le tenir. Les biberons en plastique sont lÃ©gers et incassables. Ils sont constamment abimÃ©s du fait de la stÃ©rilisation constante et contiennent parfois du BisphÃ©nol A (BPA) qui contamine le contenu du biberon. Il est donc important de vÃ©rifier les substances connues les constituants.<br><br>Une chose est sur: les bienfaits de lâ€™allaitement sont incontestables ne culpabilisez pas et sachez que vous dÃ©velopperez aussi un lien trÃ¨s intime avec bÃ©bÃ© en lui donnant le biberon.</span><span class="text_exposed_show"></span>', 2, 1, 'upload/allaitement_maternel.jpg'),
(34, 'Comment estomper les vergetures sur la peau noire et mÃ©tissÃ©e', 'comment-estomper-les-vergetures-sur-la-peau-noire-et-mÃ©tissÃ©e', 'Les vergetures sont redoutÃ©es pendant la grossesse, liÃ©es Ã  la fois Ã  l\'environnement hormonal mais aussi Ã  la prise de poids importante, on conseille surtout une trÃ¨s bonne hydratation de la peau. ', 'Les vergetures sont redoutÃ©es pendant la grossesse, liÃ©es Ã  la fois Ã  l\'environnement hormonal mais aussi Ã  la prise de poids importante, on conseille surtout une trÃ¨s bonne hydratation de la peau (ventre, seins, partie supÃ©rieure des cuisses, et hanches) avec des produits cosmÃ©tiques Ã  haut pouvoir hydratant et cicatrisant. La maitrise du poids est un atout indÃ©niable, qu\'il faut absolument obtenir pour Ã©viter une trop grande tension sur le tissu cutanÃ©.<br><br>Faire disparaÃ®tre totalement les vergetures est une gageure, mais vous pouvez toutefois les aider Ã  rÃ©gresser Ã  l\'aide de soins hyperhydratants et cicatrisants. Le maitre mot reste, une fois de plus, la prÃ©vention et l\'idÃ©al est d\'appliquer ces soins avant et pendant chaque pÃ©riode de prise, ou de perte de poids importante.<br>Une hygiÃ¨ne de vie en gÃ©nÃ©ral est indispensable pendant cette pÃ©riode, alimentation saine riche en protÃ©ine, vitamine et calcium, activitÃ© sportive douce, proscrire le tabac et l\'alcool, un repos rÃ©parateur. <span style="font-size:11.0pt;\r\nline-height:115%;font-family:" gotham="" light";mso-fareast-font-family:calibri;="" mso-fareast-theme-font:minor-latin;mso-bidi-font-family:"times="" new="" roman";="" mso-bidi-theme-font:minor-bidi;mso-ansi-language:fr;mso-fareast-language:en-us;="" mso-bidi-language:ar-sa"=""></span><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG></o:AllowPNG>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves></w:TrackMoves>\r\n  <w:TrackFormatting></w:TrackFormatting>\r\n  <w:HyphenationZone>21</w:HyphenationZone>\r\n  <w:PunctuationKerning></w:PunctuationKerning>\r\n  <w:ValidateAgainstSchemas></w:ValidateAgainstSchemas>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF></w:DoNotPromoteQF>\r\n  <w:LidThemeOther>FR</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables></w:BreakWrappedTables>\r\n   <w:SnapToGridInCell></w:SnapToGridInCell>\r\n   <w:WrapTextWithPunct></w:WrapTextWithPunct>\r\n   <w:UseAsianBreakRules></w:UseAsianBreakRules>\r\n   <w:DontGrowAutofit></w:DontGrowAutofit>\r\n   <w:SplitPgBreakAndParaMark></w:SplitPgBreakAndParaMark>\r\n   <w:EnableOpenTypeKerning></w:EnableOpenTypeKerning>\r\n   <w:DontFlipMirrorIndents></w:DontFlipMirrorIndents>\r\n   <w:OverrideTableStyleHps></w:OverrideTableStyleHps>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"></m:mathFont>\r\n   <m:brkBin m:val="before"></m:brkBin>\r\n   <m:brkBinSub m:val="--"></m:brkBinSub>\r\n   <m:smallFrac m:val="off"></m:smallFrac>\r\n   <m:dispDef></m:dispDef>\r\n   <m:lMargin m:val="0"></m:lMargin>\r\n   <m:rMargin m:val="0"></m:rMargin>\r\n   <m:defJc m:val="centerGroup"></m:defJc>\r\n   <m:wrapIndent m:val="1440"></m:wrapIndent>\r\n   <m:intLim m:val="subSup"></m:intLim>\r\n   <m:naryLim m:val="undOvr"></m:naryLim>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"></w:LsdException>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"></w:LsdException>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:10.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:115%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:"Calibri","sans-serif";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-fareast-language:EN-US;}\r\n</style>\r\n<![endif]-->', 1, 2, 'upload/conseil4.jpg'),
(36, 'Comment Ã©liminer les taches sur le corps', 'comment-Ã©liminer-les-taches-sur-le-corps', 'Vous pouvez utiliser des soins anti-taches en application directe sur les taches, ou en mÃ©lange avec un lait corporel clarifiant. Ces soins sont sans hydroquinone et ne dÃ©pigmentent pas la peau, vous pouvez les utiliser en continu sans risque de sensibilisation. ', '<b>Sachez que plus les taches sont anciennes, plus il est difficile de les faire rÃ©gresser. <br><br></b>Vous pouvez utiliser des soins anti-taches en application directe sur les taches, ou en mÃ©lange avec un <b><a href="http://www.laboratoires-biopharma.com/detail.php?id=lait-crme-claircissant&cont=500ml">lait corporel clarifiant</a></b>. Ces soins sont sans hydroquinone et ne dÃ©pigmentent pas la peau, vous pouvez les utiliser en continu sans risque de sensibilisation. <br><br>Autre solution : les crÃ¨mes correctives qui permettent un camouflage efficace, rÃ©sistant (mÃªme Ã  lâ€™eau) et longue durÃ©e. <br>Les boutons sont dus Ã  des poils incarnÃ©s qui s\'infectent. Pensez Ã  un gommage corporel une fois par semaine avec <b><a href="http://www.laboratoires-biopharma.com/detail.php?id=savon-gommant-pain-dermatologique-douceur&cont=200g">le savon pain dermatologique</a></b>. En affinant la peau, le gommage permet aux poils de sortir au lieu de se rÃ©implanter sous l\'Ã©piderme. <br><br>', 1, 2, 'upload/conseil3.jpg'),
(37, 'Peaux noires et soleil pensez Ã  vous proteger', 'peaux-noires-et-soleil-pensez-Ã -vous-proteger', 'La mÃ©lanine contenue dans notre Ã©piderme et qui donne sa couleur Ã  nos peaux, nâ€™est en effet rien de moins que lâ€™adaptation gÃ©nÃ©tique de lâ€™homme Ã  son Ã©cosystÃ¨me. En clair, chez les peaux caucasiennes, peu exposÃ©es au soleil, elle est produite de faÃ§on modÃ©rÃ©e. Les peaux noires et mÃ©tissÃ©es en revanche, vivent originellement sous un climat chaud et ensoleillÃ©, la mÃ©lanine est donc naturellement produite de faÃ§on abondante et joue le rÃ´le de bouclier contre les UV.', 'Lâ€™idÃ©e que les peaux noires et mÃ©tissÃ©es ont une protection naturelle contre les rayonnements du soleil, est rÃ©pandue, et pour cause : elle est vraie.<b><br><br>Pour autant, la peau noire elle aussi est sensible aux UV et doit Ãªtre protÃ©gÃ©e.<br><br></b>La mÃ©lanine contenue dans notre Ã©piderme et qui donne sa couleur Ã  nos peaux, nâ€™est en effet rien de moins que lâ€™adaptation gÃ©nÃ©tique de lâ€™homme Ã  son Ã©cosystÃ¨me. En clair, chez les peaux caucasiennes, peu exposÃ©es au soleil, elle est produite de faÃ§on modÃ©rÃ©e. Les peaux noires et mÃ©tissÃ©es en revanche, vivent originellement sous un climat chaud et ensoleillÃ©, la mÃ©lanine est donc naturellement produite de faÃ§on abondante et joue le rÃ´le de bouclier contre les UV.<br><br>Pour autant, cette protection naturelle ne suffit pas, et du simple dessÃ¨chement de la peau entraÃ®nant des ridules, au cancer du mÃ©lanome en passant par le coup de soleil, nous ne sommes pas Ã  lâ€™abri de certains effets toxiques du soleil sur nos peaux.<br><br>Avant toute exposition solaire, nous devons donc nous aussi nous protÃ©ger.<br><br>Comme souvent, la premiÃ¨re protection est la prÃ©vention : il faut dâ€™abord et avant tout connaÃ®tre sa peau et les limites quâ€™on peut lui imposer. Nous sommes inÃ©gaux face au soleil, mais dâ€™une maniÃ¨re gÃ©nÃ©rale :<br><br><ul><li>limitez les expositions prolongÃ©es sans protection.</li><li>privilÃ©giez des soins incorporant des filtres UV.</li><li>Ã©vitez de vous exposer aux heures ou le rayonnement est le plus fort c\'est-Ã -dire entre 12h00 et 16h00.</li><li>pensez aux Ã©crans solaires (indispensable en complÃ©ment de vos soins anti-taches) qui vous protÃ¨gent des radiations de deux maniÃ¨res : soit en absorbant (filtre), soit en les rÃ©flÃ©chissant et en les dispersant (Ã©cran). Pour ce qui est du choix de lâ€™indice, plus il est Ã©levÃ©, mieux vous Ãªtes protÃ©gÃ©e </li></ul>Ces principes sont Ã  adopter impÃ©rativement si vous utilisez une <b>crÃ¨me unifiante ou Ã©claircissante</b>, car la peau est alors susceptible de se repigmenter facilement, pas toujours de faÃ§on homogÃ¨ne.<br>', 1, 2, 'upload/conseil2.jpg'),
(38, 'Quels sont les problemes de peau les plus frequents chez les bÃ©bÃ©s ?', 'quels-sont-les-problemes-de-peau-les-plus-frequents-chez-les-bÃ©bÃ©s', 'Le milium ce sont de minuscules boutons blancs causÃ©s par lâ€™accumulation de matiÃ¨res grasses dans les pores de la peau du tout-petit. On ne peut rien y faire. \r\n\r\n', '<b>Le milium (acnÃ© du nourrisson)<br><br></b>Ce sont de minuscules boutons blancs causÃ©s par lâ€™accumulation de matiÃ¨res grasses dans les pores de la peau du tout-petit. On ne peut rien y faire. Les boutons disparaÃ®tront seuls un mois ou deux aprÃ¨s leur apparition.<br><br><b>Lâ€™Ã©rythÃ¨me fessier (dermite du siÃ¨ge)</b><br><br>Cette irritation cutanÃ©e, gÃ©nÃ©ralement sans danger, apparaÃ®t lÃ  oÃ¹ la couche entre en contact avec la peau. Elle peut Ãªtre causÃ©e par plusieurs facteurs, dont : une peau sensible, lâ€™humiditÃ©, le contact de la peau avec lâ€™urine ou les selles, la friction, etc. Pour remÃ©dier Ã  cette problÃ©matique, on prend soin de bien nettoyer la peau de bÃ©bÃ© Ã  chaque changement de couche avant dâ€™y appliquer un produit contenant de lâ€™oxyde de zinc, capable de protÃ©ger la peau et dâ€™empÃªcher la friction.<br><br><b>Ã€ NOTER</b>: Le meilleur moyen de prÃ©venir lâ€™Ã©rythÃ¨me fessier est de frÃ©quemment changer la couche de bÃ©bÃ©, surtout sâ€™il a la diarrhÃ©e.<br>Le casque sÃ©borrhÃ©ique (chapeau)<br><br>Ces croÃ»tes sÃ¨ches au cuir chevelu sont courantes. Elles apparaissent lorsquâ€™il y a une trop grande production de sÃ©crÃ©tions grasses ou parfois lorsque les shampoings sont mal rincÃ©s. Si ces croÃ»tes sont sans danger, elles peuvent toutefois lui dÃ©manger. Pour sâ€™en dÃ©barrasser, on peut appliquer de lâ€™huile dâ€™olive, minÃ©rale ou pour bÃ©bÃ©s sur le cuir chevelu et attendre quelques heures avant de dÃ©coller les croÃ»tes avec un peigne fin ou une petite brosse.<br><b><br>La peau sÃ¨che<br><br></b>Si lâ€™Ã©piderme de bÃ©bÃ© sâ€™assÃ¨che, sâ€™effrite ou se fissure, on vÃ©rifie que lâ€™air ambiant n\'est pas trop sec et on Ã©vite autant que possible dâ€™utiliser du savon lors du bain. On lave lâ€™enfant Ã  lâ€™eau, simplement, puis on applique de la crÃ¨me ou de la lotion hydratante sur les zones sÃ¨ches. En cas de doutes, on nâ€™hÃ©site pas Ã  consulter son mÃ©decin ou son pharmacien.<br><b><br>Les boutons de chaleur<br><br></b>Ces boutons â€“ rouges, arrondis et surÃ©levÃ©s â€“ apparaissent souvent sur le front, le cou ou dans les plis de la peau de bÃ©bÃ© par temps chaud ou lors dâ€™une poussÃ©e de fiÃ¨vre. Sans gravitÃ©, ils disparaÃ®tront par eux-mÃªmes.<br>', 2, 1, 'upload/conseil1.jpg'),
(39, 'Les soins pour les problemes de peau les plus frequents chez bÃ©bÃ©s', 'les-soins-pour-les-problemes-de-peau-les-plus-frequents-chez-bÃ©bÃ©s', 'Evitez les douches et les bains prolongÃ©s, car lâ€™eau, aussi peu calcaire soit elle, dessÃ¨che la peau. Veillez Ã  ce que sa peau ne soit pas agressÃ©e par les frottements des couches.', '<b>Peau sÃ¨che<br><br></b>Evitez les douches et les bains prolongÃ©s, car lâ€™eau, aussi peu calcaire soit elle, dessÃ¨che la peau. Veillez Ã  ce que sa peau ne soit pas agressÃ©e par les frottements des couches, lâ€™humiditÃ© prolongÃ©e, les vÃªtements trop rÃªches (privilÃ©giez le 100% coton), les ambiances surchauffÃ©es (19Â°C, câ€™est bien) ou lâ€™exposition prolongÃ©e au froid (une 1/2 h de balade suffit quand le thermomÃ¨tre affiche 0Â°C). BÃ©bÃ© a la peau sÃ¨che ? Appliquez quotidiennement une crÃ¨me hydratante sur son visage et son corps. Et prÃ©fÃ©rez des produits de toilette hypoallergÃ©niques, au pH neutre, sans colorants ni parfum.<br><br><b>Quels produits utiliser ?<br><br></b>Une <b><a href="http://www.laboratoires-biopharma.com/detail.php?id=lait-de-toilette-super-hydratant--la-glycrine&cont=400ml">crÃ¨me  </a></b>qui va apaiser, hydrater et protÃ©ger la peau. <br><br><br><b>Quand consulter ?</b> <br><br>Au bout de 15 jours, si le dessÃ¨chement persiste, parlez-en au pÃ©diatre. De mÃªme, si la peau de votre enfant sâ€™Ã©caille fortement, si des plaques rouges apparaissent sur tout le corps, sâ€™il se tripote ou se gratte frÃ©quemment le visage ou le corps, si sa peau sâ€™infecte (rougeur, douleur, suintement, chaleurâ€¦). Il vous prescrira une crÃ¨me protectrice et rÃ©paratrice spÃ©cifique. Il pourra aussi vous recommander un sirop contre les dÃ©mangeaisons si elles sont trop dÃ©rangeantes.<br><b><br>L\'eczÃ©ma<br><br></b>Les gestes pour le soulager : si votre bÃ©bÃ© a de l\'eczÃ©ma, consultez votre pÃ©diatre. Donnez-lui parfois des bains "gras" en mÃ©langeant Ã  une eau Ã  36Â°C une cuillÃ©rÃ©e Ã  soupe de vaseline. Installez-le ensuite dans le bain et massez doucement sa peau pendant dix minutes. Lavez-le avec du savon liquide sur gras. Appliquez plusieurs fois par jour sur sa peau une crÃ¨me hydratante sans colorant, sans parfum ni agent de conservation.<br>Les rÃ©flexes pour le protÃ©ger : veillez Ã  ce que ses ongles soient bien coupÃ©s afin quâ€™il nâ€™aggrave pas les lÃ©sions en se grattant. PrÃ©fÃ©rez les vÃªtements et les draps 100 % coton et lavez-les avec du savon ou de la lessive hypoallergÃ©nique spÃ©ciale bÃ©bÃ© et surtout, Ã©vitez les adoucissants. Aspirez rÃ©guliÃ¨rement sa chambre en son absence et lavez ses peluches au savon.<br><br><b>Quels produits utiliser ?<br><br></b>Un produit spÃ©cifiquement adaptÃ© Ã  la peau particuliÃ¨re de votre bÃ©bÃ©. Si votre bÃ©bÃ© souffre d\'eczÃ©ma, demandez conseil Ã  un professionnel de santÃ© (pÃ©diatre, mÃ©decin, dermatologue) et ne mettez pas n\'importe quel produit sur sa peau.<br><b><br>Peau hypersensible<br><br></b>Les bons rÃ©flexes : oubliez les savons et tous les produits dÃ©tergents qui peuvent modifier le pH cutanÃ©, altÃ©rer le film hydrolipidique et rendre sÃ¨che la peau de bÃ©bÃ©. Optez pour les produits de soins conÃ§us avec peu dâ€™ingrÃ©dients, des tensioactifs doux (sans savon), sans parfum, sans conservateurs ou colorants. Mieux vaut choisir des produits spÃ©cialement formulÃ©s pour la peau hypersensible des enfants.<br><br><b>Quels produits utiliser ? <br><br></b>Une <b><a href="http://www.laboratoires-biopharma.com/detail.php?id=bb-vaseline-pure&cont=250ml">crÃ¨me </a></b>de massage.<br><br><b>Les fesses rouges<br><br></b>Assez frÃ©quent, lâ€™Ã©rythÃ¨me fessier ne survient pas seulement chez les bÃ©bÃ©s Ã  la peau hypersensible.<br><br><b>Les causes :</b> mÃªme avec des couches ultra-absorbantes, la chaleur et lâ€™humiditÃ© ne sont pas totalement Ã©vacuÃ©es et fragilisent la peau. Lâ€™aciditÃ© des selles provoque une irritation, trÃ¨s vite amplifiÃ©e par le frottement de la couche, et câ€™est lâ€™infection.<br><br><b>Les bons rÃ©flexes :</b> dÃ¨s que les rougeurs apparaissent, et dans la mesure du possible, laissez votre bÃ©bÃ© les fesses Ã  lâ€™air. Nos grands-mÃ¨res procÃ©daient ainsi et câ€™est de loin le meilleur moyen dâ€™accÃ©lÃ©rer la cicatrisation. AprÃ¨s chaque pipi ou selle, changez votre bÃ©bÃ© systÃ©matiquement. Nettoyez ses fesses avec de lâ€™eau et un liquide sans savon, rincez abondamment Ã  lâ€™eau et sÃ©chez avec lâ€™air froid du sÃ¨che-cheveux, en insistant sur tous les plis de la peau.<br><br><b>Quels produits utiliser ?</b> <b><br><br><a href="http://www.laboratoires-biopharma.com/detail.php?id=bb-vaseline-pure&cont=250ml">CrÃ¨me de change</a></b>, <b><a href="http://www.laboratoires-biopharma.com/detail.php?id=couches-bb&cont=13-22kg%20(40pcs/pack)">couches Moby</a></b>.<br>', 2, 1, 'upload/conseil5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `Name_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `Date_and_Time` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`Name_ID`, `Name`, `Email`, `Message`, `Date_and_Time`, `Subject`) VALUES
(1, 'Test', 'test@yahoo.com', 'This is a Test', '2014-09-24 02:04:50', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downsub`
--

CREATE TABLE `tbl_downsub` (
  `downcat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `downcat_name` varchar(100) NOT NULL,
  `catSlug` varchar(255) DEFAULT NULL,
  `Photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_downsub`
--

INSERT INTO `tbl_downsub` (`downcat_id`, `subcat_id`, `downcat_name`, `catSlug`, `Photo`) VALUES
(30, 22, 'Sephora', 'sephora', 'upload/Banner 1400x200 Sephora.jpg'),
(35, 19, 'Biopur Paris', 'biopur-paris', 'upload/Banner 1400x200 Biopur.jpg'),
(38, 19, 'Golden Clair', 'golden-clair', 'upload/Banner 1400x200 Golden.jpg'),
(39, 19, 'Rapid\' Clair (carotte)', 'rapid-clair-carotte', 'upload/Banner 1400x200 Rapid.jpg'),
(40, 19, 'Talangai', 'talangai', 'upload/Banner 1400x200 talangai_.jpg'),
(41, 19, 'White Expression', 'white-expression', 'upload/Banner 1400x200 white express.jpg'),
(42, 21, 'Kidoux', 'kidoux', 'upload/Banner 1400x200 kidoux.jpg'),
(43, 21, 'Moby Bebe', 'moby-bebe', 'upload/Banner 1400x200 Moby.jpg'),
(44, 18, 'Balneo For Men', 'balneo-for-men', 'upload/Banner 1400x200 Balneo.jpg'),
(45, 18, 'Balneo For Women', 'balneo-for-women', 'upload/Banner 1400x200 Balneo.jpg'),
(46, 18, 'Bettina', 'bettina', 'upload/Banner 1400x200 Bettinn.jpg'),
(47, 18, 'Hydracare', 'hydracare', 'upload/Banner 1400x200 hydracare.jpg'),
(49, 18, 'Primo', 'primo', 'upload/Banner 1400x200 Primo.jpg'),
(50, 23, 'Balneo For men', 'balneo-for-men', 'upload/Banner 1400x200 Balneo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `Information_ID` int(11) NOT NULL,
  `BioCare` tinyint(3) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `postSlug` varchar(1000) NOT NULL,
  `Bref` varchar(5000) NOT NULL,
  `Content` varchar(10000) NOT NULL,
  `Photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`Information_ID`, `BioCare`, `Title`, `postSlug`, `Bref`, `Content`, `Photo`) VALUES
(11, 0, 'aaa', 'aaa', '', 'aaa', 'upload/Bactol.jpg'),
(12, 2, ' Francis Nana Djomou, plus quâ€™un entrepreneur, le boss de Biopharma le visionnaire qui fait rÃªver toute une gÃ©nÃ©ration', 'francis-nana-djomou-plus-qu-un-entrepreneur-le-boss-de-biopharma-le-visionnaire-qui-fait-rÃªver-toute-une-gÃ©nÃ©ration', 'ddee', 'sss', 'upload/Templates Actualite_sN.jpg'),
(15, 0, 'hjuyfy', 'hjuyfy', 'hvjgcfx', 'kjgfhdxgcv', 'upload/Carriere.jpg'),
(16, 2, 'fdfwe', 'fdfwe', 'dewfwe', 'ewfewf', 'upload/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main`
--

CREATE TABLE `tbl_main` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `maincatSlug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main`
--

INSERT INTO `tbl_main` (`cat_id`, `cat_name`, `maincatSlug`) VALUES
(5, 'Kind', 'kind'),
(6, 'Style', 'style');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `Transaction_ID` int(11) NOT NULL,
  `order_ID` varchar(255) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Province` varchar(55) NOT NULL,
  `Country` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `State` varchar(55) NOT NULL,
  `Phone` varchar(55) NOT NULL,
  `Paiement` varchar(255) NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Month` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `Cost` varchar(55) NOT NULL,
  `Delivery` varchar(255) NOT NULL,
  `Total_Amount` varchar(55) NOT NULL,
  `Actif` tinyint(4) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`Transaction_ID`, `order_ID`, `Name`, `Prenom`, `Email`, `Province`, `Country`, `City`, `State`, `Phone`, `Paiement`, `Date`, `Month`, `Year`, `Cost`, `Delivery`, `Total_Amount`, `Actif`, `Status`) VALUES
(2, 'P-93000222', '', '', '', '', '', '', '', '', 'cash', '2017-09-20 23:00:00', '', '', '2000', '800', '2800', 0, ''),
(3, 'P-0233242', 'happi', 'olivier', 'zamahappi@gmail.com', 'ouest', 'CM', 'douala', 'makepe', '680415442', 'orange', '2017-09-20 23:00:00', '', '', '2000', '800', '2800', 0, ''),
(4, 'P-2387227', 'happi', 'olivier', 'zamahappi@gmail.com', 'ouest', 'CM', 'douala', 'makepe', '680415442', 'cash', '2017-09-21 23:00:00', '', '', '1500', '800', '6300', 0, 'En Attente'),
(5, 'P-2730930', 'happi', 'olivier', 'zamahappi@gmail.com', 'ouest', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-21 23:00:00', '', '', '5500', '800', '6300', 1, 'En Attente'),
(6, 'P-30555', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-21 23:00:00', '', '', '4000', '800', '4800', 0, 'En Attente'),
(7, 'P-3690339', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-21 23:00:00', '', '', '5500', '800', '6300', 1, 'En Attente'),
(8, 'P-45022023', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-24 23:00:00', '', '', '3400', '800', '4200', 0, 'En Attente'),
(9, 'P-0023238', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-24 23:00:00', '', '', '3400', '800', '4200', 0, 'En Attente'),
(10, 'P-230222', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Orange Money', '2017-09-24 23:00:00', '', '', '4700', '800', '5500', 0, 'En Attente'),
(11, 'P-0622222', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-24 23:00:00', '', '', '1500', '800', '5500', 0, 'En Attente'),
(12, 'P-3222', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Orange Money', '2017-09-24 23:00:00', '', '', '1500', '800', '5500', 0, 'En Attente'),
(13, 'P-35630', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'MTN Mobile Money', '2017-09-24 23:00:00', '', '', '1500', '800', '5500', 0, 'En Attente'),
(14, 'P-32477283', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Orange Money', '2017-09-24 23:00:00', '', '', '4700', '800', '5500', 0, 'En Attente'),
(15, 'P-8933098', 'happi', 'olivier', 'zamahappi@gmail.com', 'littoral', 'CM', 'douala', 'makepe', '680415442', 'Cash', '2017-09-24 23:00:00', '', '', '9600', '800', '10400', 0, 'En Attente'),
(16, 'P-20843928', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'MTN Mobile Money', '2017-10-01 23:00:00', '', '', '1600', '800', '2400', 0, 'En Attente'),
(17, 'P-333542', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Orange Money', '2017-10-01 23:00:00', '', '', '3100', '800', '3900', 0, 'En Attente'),
(18, 'P-023030', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'OUEST', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-10-06 23:00:00', '', '', '5300', '800', '6100', 1, 'DelivrÃ©'),
(19, 'P-0252305', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-10-12 23:00:00', '', '', '3100', '800', '3900', 1, 'PayÃ©'),
(20, 'P-6242', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-10-17 23:00:00', '', '', '1500', '800', '2300', 0, 'En Attente'),
(21, 'P-303002', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Orange Money', '2017-10-17 23:00:00', '', '', '1500', '800', '2300', 0, 'En Attente'),
(22, 'P-83233', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'MTN Mobile Money', '2017-10-17 23:00:00', '', '', '1500', '800', '2300', 0, 'En Attente'),
(23, 'P-2700972', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-10-17 23:00:00', '', '', '1500', '800', '2300', 0, 'PayÃ©'),
(24, 'P-3220003', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Orange Money', '2017-10-19 10:47:26', '', '', '1500', '800', '2300', 0, 'DelivrÃ©'),
(25, 'P-0223080', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'OUEST', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-11-03 15:19:41', '', '', '1600', '0', '1600', 0, 'En Attente'),
(26, 'P-023333', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-11-06 15:01:52', 'November', '2017', '1600', '800', '2400', 1, 'PayÃ©'),
(27, 'P-2336333', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-11-13 15:33:33', 'November', '2017', '1425', '800', '2225', 0, 'En Attente'),
(28, 'P-2230332', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-11-13 15:40:03', 'November', '2017', '1425', '800', '2225', 0, 'En Attente'),
(29, 'P-3730632', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'MAKEPE', '680415442', 'Cash', '2017-11-14 07:54:34', 'November', '2017', '3100', '0', '3100', 0, 'En Attente'),
(30, 'P-323023', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', '', '', '', '', '', 'Cash', '2017-11-14 08:34:27', 'November', '2017', '3100', '0', '3100', 0, 'En Attente'),
(31, 'P-223372', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'ZONE INDUSTRIELLE', '237 233 37 53 77', 'Cash', '2017-11-14 08:36:53', 'November', '2017', '3100', '0', '3100', 1, 'En Attente'),
(32, 'P-323020', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'ZONE INDUSTRIELLE', '237 233 37 53 77', 'Cash', '2017-11-14 08:46:35', 'November', '2017', '3100', '0', '3100', 0, 'En Attente'),
(33, 'P-320263', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'ZONE INDUSTRIELLE', '237 233 37 53 77', 'Cash', '2017-11-14 09:03:06', 'November', '2017', '3100', '0', '3100', 1, 'DelivrÃ©'),
(34, 'P-353893', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'LITTORAL', 'CM', 'DOUALA', 'ZONE INDUSTRIELLE', '237 233 37 53 77', 'Cash', '2018-01-22 10:00:00', 'January', '2018', '1500', '0', '1500', 1, 'DelivrÃ©'),
(35, 'P-62', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'Cash', '2018-01-24 09:58:07', 'January', '2018', '1600', '0', '1600', 1, 'En Attente'),
(36, 'P-3002500', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'Cash', '2018-02-01 09:50:13', 'February', '2018', '1500', '0', '1500', 1, 'En Attente'),
(37, 'P-380032', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'Cash', '2018-04-02 10:01:01', 'April', '2018', '3000', '800', '3800', 0, 'En Attente'),
(38, 'P-263223', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'Cash', '2018-04-18 14:01:58', 'April', '2018', '1500', '800', '2300', 0, 'En Attente'),
(39, 'P-33333092', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'MTN Mobile Money', '2018-07-07 08:34:44', 'July', '2018', '1500', '0', '1500', 0, 'En Attente'),
(40, 'P-3923383', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'MTN Mobile Money', '2018-07-07 08:47:56', 'July', '2018', '1500', '0', '1500', 1, 'En Attente'),
(41, 'P-3853', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'Orange Money', '2018-07-07 10:23:01', 'July', '2018', '6000', '0', '6000', 0, 'En Attente'),
(42, 'P-633302', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'MTN Mobile Money', '2018-07-07 11:25:19', 'July', '2018', '6000', '0', '6000', 0, 'En Attente'),
(43, 'P-3228203', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'MTN Mobile Money', '2018-07-15 17:05:11', 'July', '2018', '0', '', '0', 1, 'En Attente'),
(44, 'P-0203332', 'HAPPI', 'OLIVIER', 'zamahappi@gmail.com', 'littoral', 'CM', 'DOUALA', 'makepe', '680415442', 'MTN Mobile Money', '2018-07-29 13:20:29', 'July', '2018', '0', '', '0', 0, 'En Attente'),
(45, 'P-2207222', 'jack', 'olivier', 'jack@gmail.com', '', 'Cameroon', 'Douala', '', '680415442', 'MTN Mobile Money', '2018-08-21 15:56:29', 'August', '2018', '0', '', '0', 0, 'En Attente'),
(46, 'P-330442', 'jack', 'olivier', 'jack@gmail.com', '', 'Cameroon', 'Douala', '', '680415442', 'Orange Money', '2018-08-21 16:07:15', 'August', '2018', '2000', '', '2000', 1, 'En Attente');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produits`
--

CREATE TABLE `tbl_produits` (
  `prodID` int(11) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `prodTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodCont` varchar(255) NOT NULL,
  `prodSlug` varchar(255) DEFAULT NULL,
  `prodDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `prodImg` varchar(500) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `prodPrice` varchar(5000) NOT NULL,
  `prodActif` tinyint(3) UNSIGNED NOT NULL,
  `prodUser` int(11) NOT NULL,
  `prodPdf` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produits`
--

INSERT INTO `tbl_produits` (`prodID`, `cat_id`, `subcat_id`, `prodTitle`, `prodCont`, `prodSlug`, `prodDesc`, `prodImg`, `qty`, `prodPrice`, `prodActif`, `prodUser`, `prodPdf`) VALUES
(5, 5, 18, 'Agissons tous No 3', 'comedie', 'agissons-tous-no-3', 'Lait de toilette sport aux mineraux marins\r\n\r\nefficace pour retrouver sans attendre une peau souple, douce et confortable. La formule du lait de toilette Balneo Sport aux mineraux marins vous procure une hydratation longue duree sans effet gras, pour une peau ressourcee.', 'upload/cover1.jpg', '99', '2500', 1, 0, ''),
(6, 5, 18, 'Les voyageurs du graal', 'comedie', 'les-voyageurs-du-graal', 'Lait de toilette sport aux mineraux marins\r\n\r\nefficace pour retrouver sans attendre une peau souple, douce et confortable. La formule du lait de toilette Balneo Sport aux mineraux marins vous procure une hydratation longue duree sans effet gras, pour une peau ressourcee.', 'upload/cover3.jpg', '99', '1500', 1, 0, ''),
(8, 5, 18, 'Les nombrilCs No 1', 'comedie', 'les-nombrilcs-no-1', 'Lait de toilette sport aux mineraux marins\r\n\r\nefficace pour retrouver sans attendre une peau souple, douce et confortable. La formule du lait de toilette Balneo Sport aux mineraux marins vous procure une hydratation longue duree sans effet gras, pour une peau ressourcee.', 'upload/cover2.jpg', '99', '1500', 1, 0, ''),
(31, 5, 19, 'Fichier pdf in there', ' jack', 'fichier-pdf-in-there', 'fichier', 'upload/page.jpg', '18', '2000', 1, 3, 'upload/cdr.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_ID` int(25) NOT NULL,
  `order_ID` varchar(25) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Titre` varchar(500) NOT NULL,
  `Cont` varchar(200) NOT NULL,
  `Qty` varchar(55) NOT NULL,
  `Cost` varchar(35) NOT NULL,
  `Image` varchar(55) NOT NULL,
  `Pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_ID`, `order_ID`, `Name`, `Titre`, `Cont`, `Qty`, `Cost`, `Image`, `Pdf`) VALUES
(63, 'P-330442', 'jack', 'Fichier pdf in there', ' jack', '1', '2000', 'upload/page.jpg', 'upload/cdr.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submain`
--

CREATE TABLE `tbl_submain` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `subcatSlug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_submain`
--

INSERT INTO `tbl_submain` (`subcat_id`, `cat_id`, `subcat_name`, `subcatSlug`) VALUES
(18, 5, 'Comedie', 'comedie'),
(19, 5, 'Policier', 'policier'),
(21, 6, 'Comics', 'comics'),
(22, 6, 'Manga', 'manga'),
(23, 6, 'Realistic', 'realistic'),
(24, 5, 'Adventure', 'adventure'),
(25, 5, 'Horror', 'horror');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('approved','pending') NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `pass`, `email`, `status`) VALUES
(9, 'happi', 'ce2feab71d8cde3d476d428adff6d134', 'zamahappi@gmail.com', 'pending'),
(2, 'olivier', 'ce2feab71d8cde3d476d428adff6d134', 'happiolivier@gmail.com', 'pending'),
(3, 'lily', 'ce2feab71d8cde3d476d428adff6d134', 'lilila@hjh.com', 'approved'),
(4, 'lola', 'ce2feab71d8cde3d476d428adff6d134', 'lola@llll.com', 'pending'),
(10, 'lily', 'd41d8cd98f00b204e9800998ecf8427e', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `author` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `prenom`, `pays`, `ville`, `phone`, `email`, `username`, `password`, `photo`, `author`) VALUES
(1, 'HAPPI', 'OLIVIER', 'CM', 'DOUALA', '680415442', 'zamahappi@gmail.com', 'mapan', 'f1059d27c43877a69f3095a7962ae3b04bd5ea78802aad7feb5f4ccdeb47758a', 'admin/upload/rsz_1rsz_olivier.jpg', 0),
(3, 'jack', 'olivier', 'Cameroon', 'Douala', '680415442', 'jack@gmail.com', 'jack', '31611159e7e6ff7843ea4627745e89225fc866621cfcfdbd40871af4413747cc', 'upload/oli.jpg', 1),
(4, 'jim', '', '', '', '', 'jim@gmail.com', 'jim', '484ae24edd22ea09a58edc2b6c58ee2b5f3879e3b267838a8726366f255fd4b9', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_twitter`
--

CREATE TABLE `users_twitter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `twitter_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `answer` varchar(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `answer`, `vote`) VALUES
(1, 'Balneo', 6),
(2, 'Hydracare', 4),
(3, 'Primo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `voteclari`
--

CREATE TABLE `voteclari` (
  `id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voteclari`
--

INSERT INTO `voteclari` (`id`, `answer`, `vote`) VALUES
(1, 'Biopur Paris', 10),
(2, 'Rapid Clair', 5),
(3, 'Talangai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voteped`
--

CREATE TABLE `voteped` (
  `id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voteped`
--

INSERT INTO `voteped` (`id`, `answer`, `vote`) VALUES
(1, 'Kidoux', 6),
(2, 'Moby', 7),
(3, 'Sephora', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vote_ip`
--

CREATE TABLE `vote_ip` (
  `id` int(11) NOT NULL,
  `emailadd` varchar(30) NOT NULL,
  `vote_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_ip`
--

INSERT INTO `vote_ip` (`id`, `emailadd`, `vote_fk`) VALUES
(6, '1', 1),
(5, '1', 1),
(4, '1', 1),
(7, 'zamahappi@gmail.com', 2),
(8, 'zamahappi@gmail.com', 2),
(9, 'zamahappi@gmail.com', 26),
(10, 'zamahappi@gmail.com', 1),
(11, 'zamahappi@gmail.com', 1),
(12, 'zamahappi@gmail.com', 1),
(13, 'zamahappi@gmail.com', 1),
(14, 'zamahappi@gmail.com', 3),
(15, 'zamahappi@gmail.com', 2),
(16, 'zamahappi@gmail.com', 2),
(17, 'zamahappi@gmail.com', 3),
(18, 'zamahappi@gmail.com', 2),
(19, 'zamahappi@gmail.com', 3),
(20, 'zamahappi@gmail.com', 1),
(21, 'zamahappi@gmail.com', 3),
(22, 'zamahappi@gmail.com', 2),
(23, 'zamahappi@gmail.com', 2),
(24, 'zamahappi@gmail.com', 2),
(25, 'zamahappi@gmail.com', 1),
(26, 'zamahappi@gmail.com', 3),
(27, 'zamahappi@gmail.com', 2),
(28, 'zamahappi@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`vote_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `tbl_conseil`
--
ALTER TABLE `tbl_conseil`
  ADD PRIMARY KEY (`Conseil_ID`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`Name_ID`);

--
-- Indexes for table `tbl_downsub`
--
ALTER TABLE `tbl_downsub`
  ADD PRIMARY KEY (`downcat_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`Information_ID`);

--
-- Indexes for table `tbl_main`
--
ALTER TABLE `tbl_main`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`Transaction_ID`);

--
-- Indexes for table `tbl_produits`
--
ALTER TABLE `tbl_produits`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_ID`);

--
-- Indexes for table `tbl_submain`
--
ALTER TABLE `tbl_submain`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_twitter`
--
ALTER TABLE `users_twitter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voteclari`
--
ALTER TABLE `voteclari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voteped`
--
ALTER TABLE `voteped`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_ip`
--
ALTER TABLE `vote_ip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_conseil`
--
ALTER TABLE `tbl_conseil`
  MODIFY `Conseil_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `Name_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_downsub`
--
ALTER TABLE `tbl_downsub`
  MODIFY `downcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `Information_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_main`
--
ALTER TABLE `tbl_main`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_produits`
--
ALTER TABLE `tbl_produits`
  MODIFY `prodID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_submain`
--
ALTER TABLE `tbl_submain`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_twitter`
--
ALTER TABLE `users_twitter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voteclari`
--
ALTER TABLE `voteclari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voteped`
--
ALTER TABLE `voteped`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vote_ip`
--
ALTER TABLE `vote_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
