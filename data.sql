insert into user (username, password_hash, email, isAdmin) values ('ADMIN', 'admin','none', 1);

insert into biome values (1, 'Temperate deciduous forest');
insert into biome values (2, 'Coniferous forest');
insert into biome values (3, 'Woodland');
insert into biome values (4, 'Chaparral');
insert into biome values (5, 'Tundra');
insert into biome values (6, 'Grassland');
insert into biome values (7, 'Desert');
insert into biome values (8, 'Tropical savanna');
insert into biome values (9, 'Tropical forest');
insert into biome values (10, 'Oceanic plankton and nekton');
insert into biome values (11, 'Balanoid-gastropod-thallophyte');
insert into biome values (12, 'Pelecypod-annelid');
insert into biome values (13, 'Coral reef');

insert into location values (1, 'Angolan Miombo woodlands');
insert into location values (2, 'Angolan Mopane woodlands');
insert into location values (3, 'Central Zambezian Miombo woodlands');
insert into location values (4, 'Eastern Miombo woodlands');
insert into location values (5, 'Kalahari Acacia-Baikiaea woodlands');
insert into location values (6, 'Zambezian and Mopane woodlands');
insert into location values (7, 'Zambezian Baikiaea woodlands');
insert into location values (8, 'Cerrado woodlands');

insert into location_biome values (1, 3);
insert into location_biome values (2, 3);
insert into location_biome values (3, 3);
insert into location_biome values (4, 3);
insert into location_biome values (5, 3);
insert into location_biome values (6, 3);
insert into location_biome values (7, 3);
insert into location_biome values (8, 3);

insert into organism values (1, 'Giant sable antelope', 'Hippotragus niger variani', 'Animal');
insert into organism values (2, "Vernay's climbing mouse", 'Dendromus vernayi', 'Animal');
insert into organism values (3, 'Giraffe', 'Giraffa', 'Animal');
insert into organism values (4, 'Cape bushbuck', 'Tragelaphus sylvaticus', 'Animal');
insert into organism values (5, 'Blue duiker', 'Philantomba monticola', 'Animal');
insert into organism values (6, 'Yellow-backed duiker', 'Cephalophus silvicultor', 'Animal');
insert into organism values (7, 'Sitatunga', 'Tragelaphus spekii', 'Animal');
insert into organism values (8, 'Waterbuck', 'Kobus ellipsiprymnus', 'Animal');
insert into organism values (9, 'Tsessebe', 'Damaliscus lunatus lunatus', 'Animal');
insert into organism values (10, 'Hippopotamus', 'Hippopotamus amphibius', 'Animal');

insert into organism_location values (1, 1);
insert into organism_location values (2, 1);
insert into organism_location values (3, 1);
insert into organism_location values (4, 1);
insert into organism_location values (5, 1);
insert into organism_location values (6, 1);
insert into organism_location values (7, 1);
insert into organism_location values (8, 1);
insert into organism_location values (9, 1);
insert into organism_location values (10, 1);
