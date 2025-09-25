-- Creation of Table Example Visités --
INSERT INTO Visités (title, description, image_url, price, discount, Star) VALUES
('Plage Tabarka', 'Belle plage de sable fin avec eau turquoise.',
'../../../Asset/Catagories/plage_tabarka.webp', 180, NULL, 5),
('Canyon De Tamerza', 'Magnifique oasis avec cascades et canyons spectaculaires.',
'../../../Asset/Catagories/canyon_tamerza.webp', 140, NULL, 4),
('L Amphithéâtre El Djem', 'Monument romain classé UNESCO, troisième plus grand amphithéâtre du monde', '../../../Asset/Catagories/Amphithéâtre El Djem.jpg', 130, NULL, 3),
('ribat de monastir', 'Forteresse historique en bord de mer, symbole du patrimoine islamique médiéval.', '../../../Asset/Catagories/ribat_de_monastir.webp', 160, NULL, 4),
('port El Kantaoui', 'Charmante marina méditerranéenne, animée par ses cafés, boutiques et bateaux de plaisance.', '../../../Asset/Catagories/port_El_Kantaoui.webp', 170, NULL, 5),
('village Douiret', 'Ancien village berbère troglodytique perché sur une colline, offrant un panorama unique et chargé d’histoire', '../../../Asset/Catagories/village_Douiret.jpeg', 130, NULL, 3),
('archeologique dougga', 'Site romain bien préservé avec temples, théâtres et vestiges antiques, classé au patrimoine mondial de l’UNESCO', '../../../Asset/Catagories/archeologique_dougga.webp', 140, NULL, 2),
('kelibia', 'Ville côtière avec plages magnifiques et forteresse historique surplombant la mer.', '../../../Asset/Catagories/kelibia.webp', 150, NULL, 4),
('Zaghouan', 'Charmante ville entourée de montagnes, célèbre pour ses sources et ses paysages verdoyants.', '../../../Asset/Catagories/Zaghouan.jpeg', 120, NULL, 3),
('Zriba Olia', 'Petit village pittoresque offrant une ambiance traditionnelle et des paysages authentiques de la campagne tunisienne.', '../../../Asset/Catagories/Zriba-Olia.jpg', 135, NULL, 4),
('sa7ra', 'Immense désert de dunes dorées offrant des excursions en chameau et des paysages à couper le souffle.', '../../../Asset/Catagories/sa7ra.png', 155, NULL, 4),
('Tozeur', 'Oasis du sud tunisien, célèbre pour ses palmeraies et ses paysages désertiques.',
 '../../../Asset/Catagories/Tozeur.jpg', 110, NULL, 3);

-- Creation of Table Example Reservés --
INSERT INTO Reservés (title, description, image_url, price, discount, Star) VALUES
('sidi bousaid', 'Village pittoresque aux maisons blanches et volets bleus, surplombant la mer Méditerranée', '../../../Asset/Catagories/sidi_bou_said.webp', 200, NULL, 5),
('hammamet.webp', 'Station balnéaire populaire avec plages de sable fin et vie animée estivale.',
'../../../Asset/Catagories/hammamet.webp', 195, NULL, 5),
('Kairouan Mosque', 'Monument historique et religieux majeur, symbole de l’architecture islamique en Tunisie.', '../../../Asset/Catagories/Kairouan_Mosque.webp', 175, NULL, 5),
('Parc dIchkeul', 'Parc national et lac classé UNESCO, refuge pour de nombreuses espèces d’oiseaux migrateurs.', '../../../Asset/Catagories/Parc_dIchkeul.jpeg', 110, NULL, 4),
('palais Dar Hussein', 'Palais historique à Tunis, reflet de l’architecture traditionnelle et du patrimoine tunisien.', '../../../Asset/Catagories/palais_Dar_Hussein.webp', 144, NULL, 3),
('canyon Midès', 'Canyon spectaculaire avec falaises rouges et oasis, idéal pour la randonnée et l’exploration.', '../../../Asset/Catagories/canyon_Midès.jpg', 140, NULL, 4),
('Chebika', 'Village oasis au pied des montagnes, célèbre pour ses cascades et paysages désertiques magnifiques.', '../../../Asset/Catagories/Chebika.webp', 198, NULL, 5),
('Médina de Tunis', 'Centre historique animé avec ruelles étroites, marchés traditionnels et patrimoine architectural riche', '../../../Asset/Catagories/Médina de Tunis.jpg', 150, NULL, 5),
('ksar Ghilane', 'Oasis du désert avec sources chaudes et dunes, parfait pour l’aventure et les excursions en chameau.', '../../../Asset/Catagories/ksar-Ghilane.jpeg', 108, NULL, 3),
('Canyon De Tamerza', 'Magnifique oasis avec cascades et canyons spectaculaires.',
'../../../Asset/Catagories/canyon_tamerza.webp', 140, NULL, 4),
('port_El_Kantaoui', 'Charmante marina méditerranéenne, animée par ses cafés, boutiques et bateaux de plaisance.', '../../../Asset/Catagories/port_El_Kantaoui.webp', 170, NULL, 5),
('sa7ra', 'Immense désert de dunes dorées offrant des excursions en chameau et des paysages à couper le souffle.', '../../../Asset/Catagories/sa7ra.png', 155, NULL, 4);

-- Creation of Table Example Promotion --
INSERT INTO Promotion (title, description, image_url, price, discount, Star) VALUES
('sidi bousaid', 'Village pittoresque aux maisons blanches et volets bleus, surplombant la mer Méditerranée', '../../../Asset/Catagories/sidi_bou_said.webp', 200, 185, 5),
('Canyon De Tamerza', 'Magnifique oasis avec cascades et canyons spectaculaires.',
'../../../Asset/Catagories/canyon_tamerza.webp', 140, 130, 4),
('palais Dar Hussein', 'Palais historique à Tunis, reflet de l’architecture traditionnelle et du patrimoine tunisien.', '../../../Asset/Catagories/palais_Dar_Hussein.webp', 144, 138, 3),
('Kairouan Mosque', 'Monument historique et religieux majeur, symbole de l’architecture islamique en Tunisie.', '../../../Asset/Catagories/Kairouan_Mosque.webp', 175, 155, 5),
('Médina de Tunis', 'Centre historique animé avec ruelles étroites, marchés traditionnels et patrimoine architectural riche', '../../../Asset/Catagories/Médina de Tunis.jpg', 150, 125, 5),
('hammamet', 'Station balnéaire populaire avec plages de sable fin et vie animée estivale.',
'../../../Asset/Catagories/hammamet.webp', 195, 180, 5);

-- Creation of Table Example Partenair --
INSERT INTO Partenair (nom, logo_url, site_web) VALUES
('Tunisie Tourisme', '../../../Asset/Catagories/partenair2.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair3.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair4.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair5.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair6.png', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair7.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair8.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair9.jpg', NULL ),
('Tunisie Tourisme', '../../../Asset/Catagories/partenair10.jpg', NULL );

-- Creation of Table Example Daily_quotes --
INSERT INTO Daily_quotes (texte) VALUES
('La randonnée est le meilleur remède pour l’âme et le corps.');

-- Creation of Table Example Galarie_picture --
INSERT INTO Galarie_picture (image, titre) VALUES
('../../../Asset/Catagories/picture1.jpg', 'Lounge 1'),
('../../../Asset/Catagories/picture2.jpg', 'Lounge 2'),
('../../../Asset/Catagories/picture3.jpg', 'Lounge 3'),
('../../../Asset/Catagories/picture4.jpg', 'Lounge 4'),
('../../../Asset/Catagories/picture5.jpg', 'Lounge 5'),
('../../../Asset/Catagories/picture6.jpg', 'Lounge 6'),
('../../../Asset/Catagories/picture7.jpg', 'Lounge 7'),
('../../../Asset/Catagories/picture8.jpg', 'Lounge 8'),
('../../../Asset/Catagories/picture9.jpg', 'Lounge 9'),
('../../../Asset/Catagories/picture10.jpg', 'Lounge 10'),
('../../../Asset/Catagories/picture11.jpg', 'Lounge 11'),
('../../../Asset/Catagories/picture12.jpg', 'Lounge 12');

-- Creation of Table Example Galarie_activité --
INSERT INTO Galarie_activité (image, titre) VALUES
('../../../Asset/Catagories/activite1.webp', 'Lounge 1'),
('../../../Asset/Catagories/activite2.webp', 'Lounge 2'),
('../../../Asset/Catagories/activite3.jpg', 'Lounge 3'),
('../../../Asset/Catagories/activite4.jpg', 'Lounge 4'),
('../../../Asset/Catagories/activite5.jpg', 'Lounge 5'),
('../../../Asset/Catagories/activite6.jpg', 'Lounge 6'),
('../../../Asset/Catagories/activite7.jpg', 'Lounge 7'),
('../../../Asset/Catagories/activite8.webp', 'Lounge 8'),
('../../../Asset/Catagories/activite9.jpg', 'Lounge 9'),
('../../../Asset/Catagories/activite10.jpg', 'Lounge 10'),
('../../../Asset/Catagories/activite11.webp', 'Lounge 11'),
('../../../Asset/Catagories/activite12.jpg', 'Lounge 12');

-- Creation of Table Example Avis_participants --
INSERT INTO Avis_participants (prenom, photo, commentaire) VALUES
('Mohamed', '../../../Asset/Catagories/team1.jpg', 'Très belle expérience, j’ai adoré l’organisation et les activités !'),
('Sarra', '../../../Asset/Catagories/team9.avif', 'Un séjour inoubliable, je recommande fortement.'),
('Omar', '../../../Asset/Catagories/team3.jpg', 'Une équipe très professionnelle et sympathique.'),
('Lina', '../../../Asset/Catagories/team4.jpg', 'Les paysages étaient magnifiques, merci pour tout !'),
('Youssef', '../../../Asset/Catagories/team8.webp', 'C’était la première fois et sûrement pas la dernière.'),
('Amira', '../../../Asset/Catagories/team5.jpg', 'Super ambiance et organisation parfaite !'),
('Yasmine', '../../../Asset/Catagories/team7.jpg', 'J’ai adoré chaque moment, bravo à toute l’équipe.'),
('Yakoub', '../../../Asset/Catagories/team2.jpg', 'Une expérience unique, je reviendrai sûrement.'),
('Nesrine', '../../../Asset/Catagories/team6.jpg', 'Très satisfait du voyage, tout était bien organisé.'),
('Hichem', '../../../Asset/Catagories/team10.webp', 'Des souvenirs gravés à jamais, merci !');