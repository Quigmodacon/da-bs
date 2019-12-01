DROP TABLE IF EXISTS organism;
CREATE TABLE organism (
    organismID int AUTO_INCREMENT,
    orgName VARCHAR(30),
    sciName VARCHAR(30),
    orgType VARCHAR(30),
    PRIMARY KEY (organismID)
);

DROP TABLE IF EXISTS location;
CREATE TABLE location (
    locationID int AUTO_INCREMENT,
    locName VARCHAR(30),
    PRIMARY KEY (locationID)
);

DROP TABLE IF EXISTS biome;
CREATE TABLE biome (
    biomeID int AUTO_INCREMENT,
    bioName VARCHAR(30),
    PRIMARY KEY (biomeID)
);

DROP TABLE IF EXISTS organism_location;
CREATE TABLE organism_location (
    organismID int,
    locationID int,
    PRIMARY KEY (organismID, locationID),
    FOREIGN KEY (organismID) REFERENCES organism(organismID),
    FOREIGN KEY (locationID) REFERENCES location(locationID)
);

DROP TABLE IF EXISTS location_biome;
CREATE TABLE location_biome (
    locationID int,
    biomeID int,
    PRIMARY KEY (locationID, biomeID),
    FOREIGN KEY (locationID) REFERENCES location(locationID),
    FOREIGN KEY (biomeID) REFERENCES biome(biomeID)
);

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    userID int AUTO_INCREMENT,
    username VARCHAR(10),
    password_hash VARCHAR(256),
    email VARCHAR(256),
    PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS favorite;
CREATE TABLE favorite (
    favoriteID int AUTO_INCREMENT,
    userID int,
    PRIMARY KEY (favoriteID),
    FOREIGN KEY (userID) REFERENCES user(userID)
);

DROP TABLE IF EXISTS favorite_organism;
CREATE TABLE favorite_organism (
    favoriteID int,
    organismID int,
    PRIMARY KEY (favoriteID, organismID),
    FOREIGN KEY (favoriteID) REFERENCES favorite(favoriteID),
    FOREIGN KEY (organismID) REFERENCES organism(organismID)
);

DROP TABLE IF EXISTS favorite_biome;
CREATE TABLE favorite_biome (
    favoriteID int,
    biomeID int,
    PRIMARY KEY (favoriteID, biomeID),
    FOREIGN KEY (favoriteID) REFERENCES favorite(favoriteID),
    FOREIGN KEY (biomeID) REFERENCES biome(biomeID)
);

