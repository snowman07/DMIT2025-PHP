-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 11:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adomingo4_charactersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `harry_potter`
--

CREATE TABLE `harry_potter` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harry_potter`
--

INSERT INTO `harry_potter` (`first_name`, `last_name`, `description`, `id`) VALUES
('Harry', 'Potter', 'Harry James Potter was an English half-blood wizard, and one of the most famous wizards of modern times. He was the only child and son of James and Lily Potter (nÃ©e Evans), both members of the original Order of the Phoenix. Harry\'s birth was overshadowed by a prophecy, naming either himself or Neville Longbottom as the one with the power to vanquish Lord Voldemort. After half of the prophecy was reported to Voldemort, courtesy of Severus Snape, Harry was chosen as the target due to his many similarities with the Dark Lord. In turn, this caused the Potter family to go into hiding. Voldemort made his first vain attempt to circumvent the prophecy when Harry was a year and three months old. During this attempt, he murdered Harry\'s parents as they tried to protect him, but this unsuccessful attempt to kill Harry led to Voldemort\'s first downfall.', 9),
('Hermione', 'Granger', 'Minister Hermione Jean Granger was an English Muggle-born witch born to Mr and Mrs Granger. At the age of eleven, she learned about her magical nature and was accepted into Hogwarts School of Witchcraft and Wizardry. Hermione began attending Hogwarts in 1991 and was Sorted into Gryffindor House. She possessed a brilliant academic mind and proved to be a gifted student in almost every subject that she studied.', 10),
('Ronald', 'Weasley', 'Ronald Bilius \"Ron\" Weasley was an English pure-blood wizard, the sixth and youngest son of Arthur and Molly Weasley. He was also the younger brother of Bill, Charlie, Percy, Fred, George, and the elder brother of Ginny. Ron and his siblings lived at the The Burrow, on the outskirts of Ottery St Catchpole, Devon.', 16),
('Draco', 'Malfoy', 'Draco Lucius Malfoy was a British pure-blood wizard and the only son of Lucius and Narcissa Malfoy. The son of a Death Eater, Draco was raised to strongly believe in the importance of blood purity. He attended Hogwarts School of Witchcraft and Wizardry from 1991-1998 and was sorted into Slytherin House. During his years at Hogwarts, he became friends with Vincent Crabbe, Gregory Goyle, Pansy Parkinson, and other fellow Slytherins, but he quickly developed a rivalry with Harry Potter.', 17),
('Luna', 'Lovegood', 'Luna Scamander was a British witch, the only child and daughter of Xenophilius and Pandora Lovegood. Her mother accidentally died while experimenting with spells when Luna was nine and Luna was raised by her father, editor of the magazine The Quibbler, in a rook-like house near the village of Ottery St Catchpole in Devon.', 18),
('Severus', 'Snape', 'Severus Snape was an English half-blood wizard serving as Potions Master (1981-1996), Defence Against the Dark Arts professor (1996-1997), and Headmaster (1997-1998) of the Hogwarts School of Witchcraft and Wizardry as well as a member of the Order of the Phoenix and a Death Eater. His double life played an extremely important role in both of the Wizarding Wars against Voldemort. The only child of Muggle Tobias Snape and Gobstones witch Eileen Snape, Severus was raised in the Muggle dwelling of Spinner\'s End, which was in close proximity to the home of the Evans family, though in a poorer area. He met Lily and Petunia Evans when he was nine and fell deeply in love with Lily, becoming a close friend of hers.', 19),
('Tom', 'Riddle', 'Tom Marvolo Riddle, later known as Lord Voldemort or, alternatively as You-Know-Who, He-Who-Must-Not-Be-Named, or the Dark Lord, was an English half-blood wizard considered to have been the most powerful and dangerous Dark Wizard of all time. He was amongst the greatest wizards to have ever lived, often considered to be the second most powerful wizard in history, his only superior being Albus Dumbledore. The only child and son of Tom and Merope Riddle, Riddle was raised in the Muggle-run Wool\'s Orphanage after his father abandoned his new family on the streets of London when the potion\'s influence was lifted, and his mother died moments after giving birth to and naming him after his father and maternal grandfather, Marvolo Gaunt.', 20),
('Albus', 'Dumbledore', 'Professor Albus Percival Wulfric Brian Dumbledore was an English half-blood wizard, who was the Defence Against the Dark Arts Professor, later the Transfiguration Professor, and later the Headmaster of Hogwarts School of Witchcraft and Wizardry. Professor Dumbledore also served as Supreme Mugwump of the International Confederation of Wizards and Chief Warlock of the Wizengamot. He was a half-blood, Muggle-supporting wizard considered to have been the greatest wizard of modern times, perhaps of all time. The son of Percival and Kendra Dumbledore, and the elder brother of Aberforth and Ariana. His father died in Azkaban when Dumbledore was young, while his mother and sister were later accidentally killed. His early losses greatly affected him early on, even at his death, but, in turn, made him a better person.', 21),
('Rubeus', 'Hagrid', 'Professor Rubeus Hagrid was an English half-giant wizard, son of Mr Hagrid and the giantess Fridwulfa, and elder half-brother of the giant Grawp. Hagrid attended Hogwarts School of Witchcraft and Wizardry in 1940 and was sorted into Gryffindor house. In Hagrid\'s third year, he was framed by Tom Riddle for the crime of opening the Chamber of Secrets and using his pet Acromantula to attack several Muggle-born students and eventually killing one of them. Though Hagrid\'s wand was snapped and he was expelled, he was trained as gamekeeper of Hogwarts and allowed to live on the school grounds at the request of Albus Dumbledore.', 22),
('Sirius', 'Black', 'Sirius Black (3 November, also known as Padfoot or Snuffles (in his Animagus form) was an English pure-blood wizard, the older son of Orion and Walburga Black, and the brother of Regulus Black. Although he was the heir of the House of Black, Sirius disagreed with his family\'s belief in blood purity and defied tradition when he was Sorted into Gryffindor House instead of Slytherin at Hogwarts School of Witchcraft and Wizardry, which he attended from 1971-1978. As the rest of his family had been in Slytherin, he was the odd one out.', 23),
('Bellatrix', 'Lestrange', 'Bellatrix Lestrange was an English pure-blood Dark witch, the eldest daughter of Cygnus and Druella Black, cousin of Regulus and Sirius Black, and the elder sister of Andromeda Tonks and Narcissa Malfoy. She was a member of the House of Black, an old wizarding family and one of the Sacred Twenty-Eight. Bellatrix started her education at Hogwarts School of Witchcraft and Wizardry in the early sixties (either 1962 or 1963), and was Sorted into Slytherin House.', 24),
('Ginevra', 'Weasley', 'Ginevra Molly \"Ginny\" Potter, occasionally known as Gin by Harry Potter, was an English pure-blood witch, the youngest of Arthur and Molly Weasley\'s seven children, and the first female to be born into the Weasley line for several generations. She and her older brothers grew up in The Burrow on the outskirts of Ottery St Catchpole in Devon.', 25),
('Neville', 'Longbottom', 'Professor Neville Longbottom was a British pure-blood wizard, the only child and son of Frank and Alice Longbottom. Neville\'s parents were well-respected Aurors and members of the original Order of the Phoenix until they were tortured into insanity by Bellatrix Lestrange and three other Death Eaters with the Cruciatus Curse when he was about sixteen months old. They were placed in the Janus Thickey Ward at St Mungo\'s Hospital for Magical Maladies and Injuries, leaving Neville to be raised by his grandmother, Augusta Longbottom.', 26),
('Lily', 'Potter', 'Lily Potter was an English Muggle-born witch, the younger daughter of Mr and Mrs Evans, and the younger sister of Petunia Evans. She learned of her magical nature as a child, after Severus Snape recognised her as a witch and told her of the existence of magic. Lily attended Hogwarts School of Witchcraft and Wizardry from 1971-1978. She was Sorted into Gryffindor House and was a member of the Slug Club. In her seventh year she was made Head Girl and began dating James Potter', 27),
('James', 'Potter', 'James Potter, also known as Prongs, was an English pure-blood wizard and the only son of Fleamont and Euphemia Potter. He attended Hogwarts School of Witchcraft and Wizardry from 1971-1978 and was sorted into Gryffindor. When James started at Hogwarts, he met and became best friends with three fellow Gryffindor students: Remus Lupin, Sirius Black, and Peter Pettigrew. He also met Severus Snape, a Slytherin student with whom he became bitter rivals. During his seventh year, James was appointed Head Boy and began dating Lily Evans.', 28),
('Molly', 'Weasley', 'Molly Weasley was an English pure-blood witch and matriarch of the Weasley family after marrying Arthur Weasley. She was born into the Prewett family and was sister to Fabian and Gideon Prewett, members of the original Order of the Phoenix.', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harry_potter`
--
ALTER TABLE `harry_potter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harry_potter`
--
ALTER TABLE `harry_potter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
