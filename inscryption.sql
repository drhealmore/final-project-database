DROP DATABASE IF EXISTS inscryption;
CREATE DATABASE inscryption;

USE inscryption;

DROP TABLE IF EXISTS Card;

CREATE TABLE Card (
    CardID INT UNSIGNED PRIMARY KEY NOT NULL,
    CardName VARCHAR(12) NOT NULL,
    CardHealth INT NOT NULL,
    CardAttack INT NOT NULL,
    BloodCost INT NOT NULL,
    BoneCost INT NOT NULL,
    TribeID INT NOT NULL,
    FirstSigilID INT NOT NULL,
    SecondSigilID INT NOT NULL
);

CREATE INDEX idx_cardname
ON Card(CardName);

DROP TABLE IF EXISTS Tribe;

CREATE TABLE Tribe (
    ID INT PRIMARY KEY NOT NULL,
    TribeName VARCHAR(8) NOT NULL
);

CREATE INDEX idx_tribename
ON Tribe(TribeName);

DROP TABLE IF EXISTS FirstSigil;

CREATE TABLE FirstSigil (
    FirstSigilID INT PRIMARY KEY NOT NULL,
    FirstSigilName VARCHAR(15) NOT NULL,
    FirstSigilDesc VARCHAR(250) NOT NULL
);

CREATE INDEX idx_firstsigilname
ON FirstSigil(FirstSigilName);

DROP TABLE IF EXISTS SecondSigil;

CREATE TABLE SecondSigil (
    SecondSigilID INT PRIMARY KEY NOT NULL,
    SecondSigilName VARCHAR(15) NOT NULL,
    SecondSigilDesc VARCHAR(250) NOT NULL
);

CREATE INDEX idx_secondsigilname
ON SecondSigil(SecondSigilName);

ALTER TABLE Card
   ADD CONSTRAINT fk_tribe_id FOREIGN KEY (ID) 
   REFERENCES Tribe(ID) 
   ON DELETE CASCADE 
   ON UPDATE CASCADE;

ALTER TABLE Card
   ADD CONSTRAINT fk_first_id FOREIGN KEY (FirstSigilID) 
   REFERENCES FirstSigil(FirstSigilID) 
   ON DELETE CASCADE 
   ON UPDATE CASCADE;

ALTER TABLE Card
   ADD CONSTRAINT fk_second_id FOREIGN KEY (SecondSigilID) 
   REFERENCES SecondSigil(SecondSigilID) 
   ON DELETE CASCADE 
   ON UPDATE CASCADE;

CREATE TABLE User(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    create_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

GRANT SELECT, INSERT, UPDATE, DELETE ON inscryption.*
TO php_user@localhost IDENTIFIED BY "nicepass";

INSERT INTO Tribe(ID, TribeName) VALUES (0, "None");
INSERT INTO Tribe(ID, TribeName) VALUES (1, "Reptile");
INSERT INTO Tribe(ID, TribeName) VALUES (2, "Canine");
INSERT INTO Tribe(ID, TribeName) VALUES (3, "Avian");
INSERT INTO Tribe(ID, TribeName) VALUES (4, "Insect");
INSERT INTO Tribe(ID, TribeName) VALUES (5, "Hooved");
INSERT INTO Tribe(ID, TribeName) VALUES (6, "All");
INSERT INTO Tribe(ID, TribeName) VALUES (7, "Squirrel");

INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (0, "No Sigil", "None");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (4, "Touch of Death", "This card instantly kills any card it damages.");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (3, "Sprinter", "At the end of the owner's turn, this card moves in the sigil's direction.");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (7, "Hoarder", "When this card is played, choose a card from your deck to be drawn immediately.");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (19, "Airborne", "This card will ignore opposing cards and strike an opponent directly.");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (23, "Mighty Leap", "This card blocks opposing Airborne creatures.");
INSERT INTO FirstSigil(FirstSigilID, FirstSigilName, FirstSigilDesc) VALUES (34, "Stinky", "The creature opposing this card loses 1 Attack.");

INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (0, "No Sigil", "None");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (4, "Touch of Death", "This card instantly kills any card it damages.");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (3, "Sprinter", "At the end of the owner's turn, this card moves in the sigil's direction.");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (7, "Hoarder", "When this card is played, choose a card from your deck to be drawn immediately.");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (19, "Airborne", "This card will ignore opposing cards and strike an opponent directly.");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (23, "Mighty Leap", "This card blocks opposing Airborne creatures.");
INSERT INTO SecondSigil(SecondSigilID, SecondSigilName, SecondSigilDesc) VALUES (34, "Stinky", "The creature opposing this card loses 1 Attack.");

INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (0, "Squirrel", 1, 0, 0, 0, 7, 0, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (1, "Stoat", 3, 1, 0, 0, 0, 0, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (2, "Bullfrog", 2, 1, 1, 0, 1, 23, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (3, "Wolf", 2, 3, 2, 0, 2, 0, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (4, "Stinkbug", 2, 1, 0, 2, 4, 34, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (7, "Magpie", 1, 1, 2, 0, 3, 7, 19);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (64, "Amalgam", 3, 3, 2, 0, 6, 0, 0);
INSERT INTO Card(CardID, CardName, CardHealth, CardAttack, BloodCost, BoneCost, TribeID, FirstSigilID, SecondSigilID) VALUES (19, "Long Elk", 2, 1, 0, 4, 5, 3, 4);
