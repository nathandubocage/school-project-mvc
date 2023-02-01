-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 01 fév. 2023 à 19:30
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school_project_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `character` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `movie_id`, `picture`) VALUES
(1, 5, 'https://lumiere-a.akamaihd.net/v1/images/gallery_toystory_16_0e2d4ef0.jpeg'),
(2, 5, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1525yhh_74a809df.jpeg'),
(3, 5, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1u7xm3_9c8abe11.jpeg'),
(4, 6, 'https://lumiere-a.akamaihd.net/v1/images/Toy-Story-2_3eb865ac.jpeg'),
(5, 6, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1twuk2c_c7684d3a.jpeg'),
(6, 6, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1hos6b1_5a686bac.jpeg'),
(7, 7, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1rchyy4_73a90f3c.jpeg'),
(8, 7, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-4v9gfu_8abbece5.jpeg'),
(9, 7, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-16n6joh_c6245304.jpeg'),
(10, 8, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-pji2fm_af837d17.jpeg'),
(11, 8, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1v4qh20_5244737e.jpeg'),
(12, 8, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150608-27674-1ac1g1c_0e1e46f4.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `released_at` date NOT NULL,
  `film_poster` varchar(256) NOT NULL,
  `synopsis` text NOT NULL,
  `banner` varchar(256) NOT NULL,
  `trailer` varchar(256) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `released_at`, `film_poster`, `synopsis`, `banner`, `trailer`, `summary`) VALUES
(5, 'Toy Story', '1996-03-27', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Toy_Story_logo.jpg/440px-Toy_Story_logo.jpg', 'Quand le jeune Andy quitte sa chambre, ses jouets se mettent à mener leur propre vie sous la houlette de son pantin préféré, Woody le cow-boy. Andy ignore également que chaque anniversaire est une source d&#039;angoisse pour ses jouets qui paniquent à l&#039;idée d&#039;être supplantés par un nouveau venu. Ce qui arrive quand Buzz l&#039;éclair est offert à Andy. Cet intrépide aventurier de l&#039;espace, venu d&#039;une lointaine galaxie, va semer la zizanie dans ce petit monde et vivre avec Woody d&#039;innombrables aventures aussi dangereuses que palpitantes.', 'https://static.wikia.nocookie.net/disney/images/0/0a/Toy-story-disneyscreencaps.com-3746.jpg/revision/latest/scale-to-width-down/1000?cb=20140904213320', 'https://www.youtube.com/embed/q_1wTx-qIpk', 'Dans la chambre d&#039;Andy, ses jouets se mettent à vivre leur propre vie dès qu&#039;il sort de la pièce. Le jour de son anniversaire, quelques jours avant le déménagement de sa famille, c&#039;est la panique puisque chacun craint d&#039;être remplacé par un jouet neuf. Woody le cow-boy est le jouet préféré du jeune garçon et n&#039;appréhende donc pas tellement cette fête. Mais Andy reçoit une figurine articulée d&#039;astronaute, Buzz l&#039;Éclair (« Buzz Lightyear » en version originale et québécoise). Très vite, il s&#039;avère que Woody a « perdu sa place » de jouet préféré, au profit de Buzz. Il essaie toutefois d&#039;accueillir Buzz dans le groupe des jouets d&#039;Andy, mais l&#039;astronaute ne sait pas qu&#039;il est un jouet, mais un Ranger de l&#039;espace, employé par Star Command et ennemi du terrible empereur Zurg. Il pense aussi qu&#039;il peut voler, ce que Woody conteste. Après une « démonstration » devant les jouets, ceux-ci l&#039;applaudissent, à l&#039;exception de Woody, qui « n&#039;appelle pas ça voler » mais plutôt « tomber avec panache ».\r\n\r\nAlors qu&#039;Andy se prépare pour aller à Pizza Planète (« Pizza Planet » en version originale et québécoise), sa mère lui dit qu&#039;il ne peut prendre qu&#039;un seul jouet. Woody essaie alors de se débarrasser de Buzz en le faisant tomber dans un coin inaccessible de la chambre, mais échoue et Buzz se retrouve projeté à travers la fenêtre. Les autres jouets commencent alors à penser que Woody, jaloux, a essayé de tuer Buzz. Quant à Andy, ne trouvant plus Buzz, il s&#039;empare de Woody pour aller à Pizza Planet. Buzz voit soudain Andy aller dans la voiture de sa mère avec Woody et grimpe dans le véhicule pour se venger de ce dernier. Lors d&#039;un arrêt à une station-service, les deux jouets rivaux se battent, quittent même la voiture de la mère d&#039;Andy, qui repart finalement sans eux.\r\n\r\nWoody trouve un camion Pizza Planet et prévoit alors de monter dedans pour rejoindre Andy. Mais, redoutant le regard des autres jouets s&#039;il revient seul, il demande à Buzz de venir avec lui. Arrivés à destination, les deux jouets finissent dans une machine attrape-peluche, où Sid, le voisin d&#039;Andy, connu pour être un destructeur de jouets, les capture.\r\n\r\nBuzz et Woody essaient désormais de s&#039;enfuir de la maison de Sid avant le déménagement d&#039;Andy. Cette maison renferme de nombreux jouets inquiétants ainsi que Scud, le chien méchant de Sid. Buzz voit alors une publicité pour la gamme de jouets Buzz l&#039;Éclair, ce qui le choque profondément. Il veut se prouver qu&#039;il peut voler, mais n&#039;y arrive pas et se casse un bras. Déprimé, Buzz se sent incapable de participer au plan d&#039;évasion de Woody. Ce dernier essaie d&#039;obtenir l&#039;aide des jouets d&#039;Andy, situés dans la maison d&#039;en face ; mais ceux-ci lui en veulent toujours d&#039;avoir essayé d&#039;écarter Buzz. En revanche, les jouets de Sid viennent en aide à Woody en refixant le bras de Buzz, qui se fait ensuite martyriser par Sid. Woody organise alors, avec les jouets de Sid, un plan de sauvetage de Buzz. Mais même après tous ces efforts, les deux jouets ne parviennent pas à rattraper la voiture de la mère d&#039;Andy partie pour le déménagement.\r\n\r\nIls s&#039;accrochent alors au camion de déménagement mais sont poursuivis par Scud. En sauvant Woody du chien, Buzz est éjecté du camion. Woody essaie de le sauver avec la voiture téléguidée d&#039;Andy, mais les autres jouets ne lui font pas confiance et il est jeté par-dessus bord. Les jouets comprennent leur erreur lorsqu&#039;ils aperçoivent Woody et Buzz sur la voiture téléguidée et les aident alors à les ramener sur le camion ; mais les piles de la voiture sont épuisées et les deux héros sont obligés d&#039;allumer la fusée qu&#039;avait fixée Sid sur le dos de Buzz pour décoller. Finalement, la voiture téléguidée rejoint les autres jouets dans le camion et Buzz et Woody rejoignent Andy dans la voiture. La famille et tous les jouets d&#039;Andy arrivent finalement à bon port dans la nouvelle maison. Chaque jouet est à sa place et chacun s&#039;en trouve heureux.\r\n\r\nAu Noël suivant, la sœur d&#039;Andy reçoit une Madame Patate tandis qu&#039;Andy reçoit un véritable petit chien, ce qui ne rassure pas la tribu des jouets.\r\n\r\n'),
(6, 'Toy Story 2', '2000-02-02', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Toy_Story_2_Logo.jpg/440px-Toy_Story_2_Logo.jpg', 'Woody, le cow-boy à la démarche déhanchée, reste le jouet préféré d&#039;Andy, même si aujourd&#039;hui Buzz partage cette amitié. Toujours chef de bande, Woody protège et rassure tous les jouets de la chambre. Kidnappé par un collectionneur sans scrupules, Woody va découvrir qu&#039;il fut jadis une vraie star. Après maintes péripéties, il va être confronté à la décision la plus importante de sa vie: rentrer chez lui pour retrouver Andy et les jouets ou rester pour devenir une pièce rare de musée.', 'https://static.wikia.nocookie.net/disney/images/b/b0/Vlcsnap-2014-10-26-17h13m58s251.png/revision/latest?cb=20141026231928', 'https://www.youtube.com/embed/RSU_cOpfOv4', 'Momentanément mis au placard, Woody le cow-boy est enlevé par un collectionneur avide prénommé Al de la série Western Woody, dont il fait figure de héros en compagnie de Jessie l&#039;écuyère, du cheval Pile-Poil et du chercheur d&#039;or Papi Pépite. Woody se rend compte de sa popularité et se voit proposer une place dans un musée, évitant ainsi le risque d&#039;être un jour délaissé par Andy. Ses amis, eux, traversent toute la ville pour le ramener chez leur propriétaire.'),
(7, 'Toy Story 3', '2010-07-14', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Toy_Story_3_Logo.jpg/440px-Toy_Story_3_Logo.jpg', 'Les créateurs des très populaires films Toy Story ouvrent à nouveau le coffre à jouets et invitent les spectateurs à retrouver le monde délicieusement magique de Woody et Buzz au moment où Andy s\'apprête à partir pour l\'université. Délaissée, la plus célèbre bande de jouets se retrouve... à la crèche ! Les bambins déchaînés et leurs petits doigts capables de tout arracher sont une vraie menace pour nos amis ! Il devient urgent d\'échafauder un plan pour leur échapper au plus vite. Quelques nouveaux venus vont se joindre à la Grande évasion, dont l\'éternel séducteur et célibataire Ken, compagnon de Barbie, un hérisson comédien nommé Larosse, et un ours rose parfumé à la fraise appelé Lotso.', 'https://static.wikia.nocookie.net/disney/images/1/17/Toy-story-disneyscreencaps.com-9143.jpg/revision/latest/scale-to-width-down/1000?cb=20140904212213', 'https://www.youtube.com/embed/Q9vWyuAX954', 'Andy entre à l\'université à 17 ans, et cela fait des années qu\'il n\'a pas touché à ses jouets, dont le groupe a été très réduit à cause de dons durant son adolescence. Même les soldats verts, les trois restants, s\'enfuient, pensant que leur devoir d\'égayer Andy a été accompli. Andy range tous les membres du groupe, dont Buzz et Jessie, dans un sac poubelle sauf Woody (après un moment d\'hésitation) qu\'il veut emmener à l\'université. Il s\'apprête à les ranger dans le grenier, mais Molly fait tomber un jouet parmi d\'autres destinés à Sunnyside, une garderie. Il l\'aide, mais l\'échelle du plafond se replie et la mère tombe sur le sac. Pensant qu\'il est destiné à la poubelle, elle l\'emmène sur le trottoir. Heureusement, les jouets sortent à temps du sac, mais Woody qui les a retrouvés après avoir voulu les sauver, voit ses amis rentrer dans la voiture de la mère d\'Andy qui veut emmener des jouets à la garderie. Il tente de les convaincre de sortir de là, mais le coffre est refermé, les condamnant à aller à Sunnyside. Tandis que Woody tente une nouvelle fois de les convaincre, eux, préfèrent aller à la garderie, pour une nouvelle vie. Woody est persuadé que ses amis le supplieront de rentrer une fois entrés.\r\n\r\nIls arrivent dans la garderie en question, et le carton est placé dans la salle des papillons. Tous sont émerveillés par la salle sauf Woody. Rex, voulant voir mieux, bouscule ses amis ce qui fait tomber le carton au sol, et les jouets déjà là les accueillent chaleureusement. Chacun se présente à tous, et un ours en peluche rose appelé Lotso arrive. Il explique que, dans cet endroit, ils ne seront jamais délaissés. Les enfants, lorsqu\'ils grandissent, amènent d\'autres enfants et ainsi de suite. Puis, il appelle Ken, qui présente la salle. Il fait le tour du coin, et c\'est à la fin qu\'ils voient leur pièce à eux : la salle des chenilles (la salle de Lotso et des autres étant celle des papillons). Ken et Barbie, un des ex-jouets de Molly, se déclarent leurs sentiments, et Ken l\'emmène avec lui. Lotso et son assistant Big Baby laissent les jouets dans la salle. Woody avoue que c\'est un endroit magnifique. Il décide cependant de partir, laissant même Pile-Poil qui voulait l\'accompagner. Il sort par la porte, passe par les toilettes et monte sur le toit, avant de trouver un cerf-volant auquel il s\'accroche. Il s\'envole, mais le vent joue contre lui, l\'amenant dans un arbre, où Bonnie, une petite fille, le trouve. Il a perdu son chapeau sur l\'herbe en dessous de l\'arbre, et c\'est sans lui qu\'il est emmené.\r\n\r\nPendant ce temps, les jouets entendent les enfants faire la file pour rentrer. Rex est impatient, mais Buzz remarque quelque chose d\'étrange : tous les jouets se cachent. Il se rend compte après, lorsque la porte est ouverte, que les enfants sont déchaînés, sans pitié avec les jouets, et les martyrisent. Alors que Bonnie joue avec son nouveau shérif, qui rencontre les jouets de la fillette. Mais à la garderie, le groupe constate que les enfants de cette salle sont trop jeunes pour eux. Buzz décide d\'aller demander à Lotso d\'être transférer lui et ses amis dans la salle des papillons. Lorsqu\'il sort de la salle, il remarque que deux membres de la salle des papillons discutent et se dirigent vers un distributeur automatique. En chemin, l\'un d\'eux tire de force Ken. Les trois arrivent en bas du distributeur suivi en secret par Buzz. Les trois jouets escaladent le distributeur. Buzz arrive en haut et découvre que les jouets qu\'il a suivi sont en train de jouer à un jeu de société avec d\'autres membres de la salle des papillons. Leur conversation semble suspecte pour Buzz. Il est repéré par Big Baby, et est emmené à la bibliothèque. Lotso arrive et décide qu\'il peut rester dans la salle des « anciens ». Lotso décide que Buzz est digne de faire partie du groupe. Mais lorsqu\'il demande d\'aller chercher ses amis, l\'ours ordonne qu\'on le remette sur la chaise d\'interrogatoire où il avait été enchainé. Sur ordre de Lotso, il est réinitialisé.\r\n\r\nWoody apprend pendant ce temps, après avoir dit aux jouets de Bonnie qu\'il était parti de Sunnyside, l\'histoire de Lotso par Rectus, un clown : il était, avec Big Baby et Rictus, un des jouets d\'une fille, Daisy, qui les a oubliés un jour à la campagne. Lorsqu\'ils reviennent, Lotso est remplacé par une autre peluche identique. Blessé, il considère alors qu\'ils ont tous les trois été remplacés et les trois jouets échouèrent à Sunnyside. Là, Lotso instaure les règles et Big Baby devient son bras droit. Rectus, lui, a été cassé et Bonnie l\'a emmené. Déterminé à les sauver, Woody repart à la garderie, où ses amis ont été capturés par Buzz, qui se considère de nouveau comme un ranger de l\'espace et qui obéit désormais à Lotso, et même Barbie, qui a rompu avec Ken, alors qu\'elle a compris que ses amis étaient fait prisonniers. Ils ont juste eu le temps de voir grâce à un œil de Mme Patate qui a été perdu que le cowboy disait la vérité  : Andy ne les a pas oubliés, et les cherche. Mr. Patate, lui, a été jeté dans la boîte, un bac à sable destiné aux plus coriaces, jugé insolent par l\'antagoniste. Ce dernier jette alors, devant les yeux de tous, le chapeau de Woody, et Buzz leur explique les règles.\r\n\r\nMais Woody revient dans cet enfer et a le temps de voir ses pauvres amis qui subissent mille et un dommages. Il parle alors avec un téléphone caché qui lui explique que depuis son départ, ils ont plus de surveillance partout. Le shérif demande alors s\'il y a moyen de sortir. Là, le téléphone lui explique : Les portes sont fermées chaque soir à double tour, et les murs sont grands de deux mètres. Une solution : passer par en dessous et accéder à la benne à ordures. Lotso a aussi des camions qui patrouillent toute la nuit dans les couloirs, les salles de jeux et dans la cour de récré. Mais le vrai problème vient du singe : il surveille tout depuis des caméras et rien ne lui échappe. Il faut donc se débarrasser de ce primate. Tous les jouets d\'Andy retrouvent leur ami qui leur explique le plan. D\'abord, Mr. Patate fait semblant de s\'enfuir pour se retrouver dans la boîte. Puis, pendant ce temps, et avec des difficultés, Zigzag et Woody parviennent à capturer le surveillant. Ils prennent la clé de la porte et l\'ouvrent, tandis que Mr. Patate s\'est fait passer une tortilla après que ses parties du corps soient sorties, excepté le corps, du bac. Ils réussissent également à réparer de Buzz, mais une fausse manipulation le fait passer en mode espagnol. Ils sortent, aidés par Mr. Patate, et ce dernier rencontre un pigeon qui le morcelle. Ils récupèrent son corps et le lui rendent une fois dehors, après avoir utilisé un légume en tant que corps temporaire. Ils avancent en évitant les gardes ainsi que Big Baby et parviennent à la benne à ordures. Ils sont sur le point de traverser, lorsque Lotso et ses acolytes les rattrapent à l\'aide du téléphone qu\'ils ont cassé.\r\n\r\nLe camion poubelle arrive quand Lotso leur explique qu\'il est préférable pour eux qu\'ils reviennent. Ils refusent, et Flex, une adjointe de Lotso, tente de les faire tomber dans la poubelle. Mais Ken les rejoint, et essaye de faire rébellion face à Lotso en lui disant que pour lui, il n\'y a qu\'une Barbie. L\'ours dit alors qu\'aucun « morveux » n\'aime vraiment les jouets et il s\'en va, mais Woody parle de sa propriétaire en disant qu\'elle l\'aimait. L\'ennemi tente d\'avoir le dernier mot, mais là, le shérif lui montre un petit cœur où il y a marqué « Daisy », la propriétaire, et alors que Big Baby prend le cœur en disant « maman », Lotso le prend et le brise, et pour se venger, le gros bébé le jette dans la poubelle et la referme, tandis que les jouets sont en marche pour sortir, Woody se fait attraper par Lotso et est emmené dans la poubelle. Le camion arrive juste à ce moment-là. Ils restent solidaires et s\'accrochent à la poubelle, qui est vidée. Durant le voyage, Buzz est finalement remis en mode normal en recevant une télévision sur la tête, et surtout, ils arrivent à la décharge. Voyant un grappin, les trois extraterrestres à trois yeux qui sont les \"bébés\" du couple Patate, sont emmenés par un camion qui est suivi d\'un second qui amène les héros sur un convoyeur. Ils découvrent que tout ce qui est métallique est attiré par un aimant au plafond. Woody remarque une déchiqueteuse. Pour l\'esquiver, Woody ordonne à ses amis d\'attraper un objet métallique. Woody lui risque sa peau pour sauver Lotso de la déchiqueteuse, aidé par Buzz. Les trois attrapent de justesse un morceau de métal. De l\'autre côté, Woody découvre que ses amis ont disparu mais il remarque qu\'ils sont juste en bas. Ils lâchent l\'objet métallique et arrivent auprès des autres. Rex voit de la lumière et malheureusement, il s\'agit en fait d\'un incinérateur. Lotso voit une échelle et un bouton pour annuler la progression du tapis roulant qui amène les protagonistes vers les flammes. Il monte, mais au moment d\'appuyer, décide de laisser les jouets à leur sort. Ils tentent de fuir le feu, mais Buzz se montre impuissant face à cette situation, et tend sa main. Tous les jouets se réunissent, se tiennent la main et ferment les yeux se préparant à leur fin inéluctable, y compris Woody qui comprend en dernier qu\'ils vont tous y passer. Ils se rapprochent des flammes, mais tout d\'un coup, une lumière bleue apparait.\r\n\r\nIls sont sauvés de justesse par les trois bonhommes verts, qui les délivrent avec une grue dont le bout est un grappin. Heureux, Mr. Patate, qui ne les supportait pas depuis le précédent épisode, les accepte. Les amis décident de se venger de Lotso de les avoir trahis au dernier moment alors qu\'ils l\'ont sauvé, mais Woody les dissuade, affirmant qu\'il n\'en vaut pas la peine. Lotso, lui, est accroché à un devant de camion, condamné à y rester pour l\'éternité. Les jouets sont de retour chez Andy grâce au camion poubelle qu\'ils ont vu, et retournent dans leurs boites respectives après des au revoir sincères. Mais en voyant Andy qui dit au revoir à sa famille, Woody se rend compte qu\'au fond, ils resteront toujours ensemble quelque part. Il écrit l\'adresse de Bonnie, entre dans la boîte à mettre au grenier. Andy donne ses jouets à Bonnie, qui reçoit même le shérif. Andy joue avec eux une dernière fois, et puis part. Le film se termine alors que le cowboy et ses amis vivent une nouvelle vie. Mais à la garderie, Barbie et Ken ont amélioré le niveau de vie. Les jouets se passent à présent le relais à tour de rôle dans la salle des chenilles. Les amoureux savent en plus que les héros ont survécu à la décharge. Enfin, l\'épilogue est terminé par une danse espagnole entre Jessie et Buzz, désormais ensemble.'),
(8, 'Toy Story 4', '2019-06-26', 'https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_officiel_toy_story_4.jpg', 'Woody a toujours privilégié la joie et le bien-être de ses jeunes propriétaires – Andy puis Bonnie – et de ses compagnons, n’hésitant pas à prendre tous les risques pour eux, aussi inconsidérés soient-ils. L’arrivée de Fourchette un nouveau jouet qui ne veut pas en être un dans la chambre de Bonnie met toute la petite bande en émoi. C’est le début d’une grande aventure et d’un extraordinaire voyage pour Woody et ses amis. Le cowboy va découvrir à quel point le monde peut être vaste pour un jouet…', 'https://static.wikia.nocookie.net/disney/images/b/b1/Toystory_761.jpg/revision/latest/scale-to-width-down/1000?cb=20181124053639', 'https://www.youtube.com/embed/ZBocV7KRJY0', 'Neuf ans plus tôt, après les événements de Toy Story 2, La Bergère et Woody tentent de sauver la voiture télécommandée d&#039;Andy, perdue pendant un orage. Alors que le sauvetage prend fin, La Bergère est donnée à un nouveau propriétaire. Woody veut d&#039;abord partir avec elle puis décide finalement de rester avec Andy.\r\n\r\nDes années plus tard, Andy, devenu adolescent, donne tous ses jouets à Bonnie, encore jeune enfant, avant de partir à l&#039;université. Bien que les jouets soient heureux d&#039;avoir une nouvelle vie avec un nouvel enfant, Woody peine à s&#039;adapter à un environnement dans lequel il n&#039;est plus aussi aimé qu&#039;avec Andy : Bonnie lui enlève régulièrement son étoile de shérif pour la donner à Jessie et le choisit rarement lorsqu&#039;elle veut jouer.\r\n\r\nAlors que Bonnie s&#039;apprête à passer son premier jour à l&#039;école maternelle, Woody s&#039;inquiète pour elle et se met dans son sac à dos. À l&#039;école, Bonnie se retrouvant sans de quoi pouvoir faire un dessin à sa portée, Woody va chercher plusieurs matériaux dans la poubelle, dont une cuillère-fourchette, du fil cure-pipe et un bâtonnet de glace, que Bonnie utilise pour créer un nouveau jouet qu&#039;elle prénomme Fourchette. Fourchette prend vie dans le sac à dos de Bonnie et fait une crise existentielle, pensant qu&#039;il n&#039;est composé que de déchets et qu&#039;il n&#039;est donc pas un jouet, et souhaite retourner dans une poubelle. Alors que Fourchette devient le jouet préféré de Bonnie, Woody se charge de l&#039;empêcher de se jeter à la poubelle.\r\n\r\nLors d&#039;une virée routière organisée par les parents de Bonnie, Fourchette saute de la fenêtre du camping-car, poursuivi par Woody. Quand Woody explique à Fourchette à quel point il est important pour Bonnie, il accepte de retourner auprès de Bonnie. Près du parking où se sont arrêtés les parents de Bonnie, Woody remarque la lampe de La Bergère dans la vitrine d&#039;un antiquaire et y entre, espérant la retrouver. À l&#039;intérieur, Woody et Fourchette rencontrent Gabby Gabby, une poupée des années 1950, qui désire remplacer sa boîte vocale, défectueuse depuis sa création, par celle de Woody, qui fonctionne encore parfaitement. Bien que Woody parvienne à s&#039;échapper, Gabby Gabby capture Fourchette. Woody arrive dans un parc de jeux et retrouve La Bergère ainsi que ses trois moutons, Be, Bop et Lula, qui sont maintenant des jouets « perdus », c&#039;est-à-dire qui n&#039;appartiennent plus à aucun enfant. La Bergère accepte d&#039;aider Woody à sauver Fourchette.\r\n\r\nPendant ce temps, Buzz l&#039;Éclair part chercher Woody mais se perd, se retrouve dans une fête foraine et devient l&#039;un des prix d&#039;un jeu de tir. Il s&#039;échappe avec deux peluches prénommées Ducky et Bunny et retrouve Woody et La Bergère. Avec l&#039;aide de la Polly Pocket policière Giggle McDimples et du jouet cascadeur québécois Duke Caboom, ils essaient de sauver Fourchette de Gabby Gabby, de ses sous-fifres, des pantins de ventriloque, et du chat de la propriétaire de l&#039;antiquaire, sans succès. Après la défaite, La Bergère et les autres jouets refusent de réessayer. Woody déclare que secourir Fourchette est son seul but et dit à La Bergère qu&#039;être loyal est quelque chose qu&#039;un jouet perdu ne pourrait pas comprendre. Seul, Woody rencontre de nouveau Gabby Gabby, qui lui explique qu&#039;elle attend depuis toujours l&#039;amour d&#039;un enfant. Woody a pitié de Gabby Gabby et accepte de lui donner sa boîte vocale en échange de Fourchette.\r\n\r\nLes jouets se séparent, mais Woody voit Gabby Gabby se faire rejeter par Harmonie, qu&#039;elle pensait être sa propriétaire idéale. Woody réconforte Gabby Gabby qui a le cœur brisé et l&#039;invite à devenir l&#039;un des jouets de Bonnie. La Bergère revient avec les autres jouets et se réconcilie avec Woody. Ils se dirigent vers la fête foraine, tandis que les autres jouets de Bonnie se mettent à la place de l&#039;assistant de navigation pour forcer les parents de Bonnie à revenir au parking. Gabby Gabby voit une petite fille en train de pleurer dans la fête foraine et décide alors de devenir son jouet, lui donnant alors le courage d&#039;aller voir un agent de sécurité pour retrouver ses parents.\r\n\r\nSur le carrousel, Woody et La Bergère se font des adieux doux-amers et Woody hésite à la quitter de nouveau. Quand Buzz lui dit que Bonnie ira bien même sans lui, Woody décide de rester avec La Bergère au lieu de repartir avec les autres jouets. Il donne son étoile de shérif à Jessie et dit adieu à ses amis.\r\n\r\nWoody et La Bergère commencent leur vie ensemble, accompagnés de Ducky, Bunny, Giggle et Duke Caboom, dans le but de trouver de nouveaux propriétaires aux jouets perdus. Lors de son premier jour de cours préparatoire, Bonnie crée un nouveau jouet à partir d&#039;un couteau en plastique, souffrant de la même crise existentielle que Fourchette auparavant, ce dernier en tombant sous le charme.');

-- --------------------------------------------------------

--
-- Structure de la table `movies_actors`
--

CREATE TABLE `movies_actors` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `role` varchar(5) DEFAULT 'USER',
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`, `email`) VALUES
(3, 'nathan.dubocage', 'ADMIN', 'aq136761fb95857e97998a9c7319b3a64dad6f6726e25', 'nathandubocage@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `movies_actors`
--
ALTER TABLE `movies_actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD CONSTRAINT `movies_actors_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
