CREATE DATABASE GenitoriFigli;
USE GenitoriFigli; 

CREATE TABLE PERSONE(
  Nome                  CHARACTER(20)    PRIMARY KEY,
  Reddito               NUMERIC(10),
  Eta                   NUMERIC(3),
  Sesso                 ENUM('M','F')
  );


CREATE TABLE GENITORI(
  Figlio                CHARACTER(20),
  Genitore              CHARACTER(20),
  PRIMARY KEY (Figlio,Genitore),
  INDEX (Figlio),
  FOREIGN KEY (Figlio) REFERENCES PERSONE (Nome)  ON DELETE NO ACTION ON UPDATE CASCADE,
  INDEX (Genitore),
  FOREIGN KEY (Genitore) REFERENCES PERSONE (Nome)  ON DELETE NO ACTION ON UPDATE CASCADE
  );

INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Aldo',25,15,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Andrea',27,21,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Salvatore',44,40,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Giovanni',11,10,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Filippo',26,30,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Franco',60,20,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Leonardo',79,30,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Luigi',50,40,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Michelangelo',79,30,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Sergio',85,35,'M');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Amelia',79,28,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Anna',50,29,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Evelina',41,30,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Beatrice',79,30,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Luisa',75,87,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Maria',55,42,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Paola',30,41,'F');
INSERT INTO PERSONE (Nome,Reddito,Eta,Sesso) VALUES ('Diana',90,NULL,'F');

INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Aldo','Franco');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Aldo','Maria');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Andrea','Franco');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Andrea','Maria');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Salvatore','Beatrice');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Salvatore','Leonardo');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Giovanni','Evelina');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Giovanni','Salvatore');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Filippo','Anna');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Filippo','Luigi');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Franco','Sergio');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Luigi','Luisa');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Evelina','Amelia');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Evelina','Michelangelo');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Maria','Luisa');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Paola','Anna');
INSERT INTO GENITORI (Figlio,Genitore) VALUES ('Paola','Luigi');
