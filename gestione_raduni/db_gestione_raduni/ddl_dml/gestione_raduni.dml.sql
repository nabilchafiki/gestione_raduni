USE gestione_raduni;

INSERT INTO Tipologia (nome, descrizione) VALUES ('berlina', 'Macchina berlina');
INSERT INTO Tipologia (nome, descrizione) VALUES ('cabriolet', 'Macchina cabriolet');
INSERT INTO Tipologia (nome, descrizione) VALUES ('coupe', 'Macchina coupe');
INSERT INTO Tipologia (nome, descrizione) VALUES ('altro', 'Macchina');


INSERT INTO Luoghi (via, civico, comune, provincia, regione, nazione) VALUES ('XXV Aprile', '5b', 'Zevio', 'VR', 'Veneto', 'Italia');
INSERT INTO Luoghi (via, civico, comune, provincia, regione, nazione) VALUES ('Galileo Galilei', '25', 'Prato', 'PO', 'Toscana', 'Italia');
INSERT INTO Luoghi (via, civico, comune, provincia, regione, nazione) VALUES ('Nuova', '32', 'Cadriano', 'BO', 'Emilia-Romagna', 'Italia');


INSERT INTO Auto (targa, marca, modello, anno, tipologia) VALUES ('VRA58322', 'Fiat', 'Topolino', 1950, 4);
INSERT INTO Auto (targa, marca, modello, anno, tipologia) VALUES ('FIZ95244', 'Alfa Romeo', 'Giulietta Sprint Coupe', 1960, 3);
INSERT INTO Auto (targa, marca, modello, anno, tipologia) VALUES ('RomaX79504', 'Fiat', '501 Spider', 1924, 4);


INSERT INTO Utenti (nome, cognome, data_nascita, cf, email, password, auto, residenza, documento) VALUES ('Luca', 'Bianchi', '1938-11-05', 'BNCLCU38S05M172O', 'luca.bianchi38@gmail.com',
'$2y$10$hVa2gsQUTIMchN0xkdVO/.f6wBBQp0WkTItfmOwLDu2Y1F5mY5fjS', 1, 1, "D:\\documents\\files\\documenti_identita\\lucabianchi.jpg");
INSERT INTO Utenti (nome, cognome, data_nascita, cf, email, password, auto, residenza, documento) VALUES ('Paolo', 'Rossi', '1945-06-01', 'RSSPLA45H01G999P', 'paolo.rossii@tiscali.it',
'$2y$10$CZpbe/W24eIiwPdHh7QLyeuSMC4t.tZNwXn7.2mXWMl/xrNSQ/xZq', 2, 3, "D:\\documents\\files\\documenti_identita\\paolorossi.jpg");
INSERT INTO Utenti (nome, cognome, data_nascita, cf, email, password, auto, residenza, documento) VALUES ('Anna', 'Verdi', '1939-10-10', 'VRDNNA39R50A944B', 'verdianna@tiscali.it',
'$2y$10$ACEJYVg9EUcb8vPBN.1bde.9IC4g7bwteXCFcXC/NfNF1GQeAdafO', 3, 2, "D:\\documents\\files\\documenti_identita\\annaverdi.jpg");


INSERT INTO Raduni (nome, descrizione, data, ora, luogo, tipologia) VALUES ('Primo raduno', 'Raduno numero 1', '2015-07-15', '10:00:00', 1, 3);
INSERT INTO Raduni (nome, descrizione, data, ora, luogo, tipologia) VALUES ('Secondo raduno', 'Raduno numero 2', '2018-09-07', '15:30:00', 2, 4);
INSERT INTO Raduni (nome, descrizione, data, ora, luogo, tipologia) VALUES ('Terzo raduno', 'Raduno numero 3', '2019-05-05', '16:00:00', 3, 4);
INSERT INTO Raduni (nome, descrizione, data, ora, luogo, tipologia) VALUES ('Quarto raduno', 'Raduno numero 4', '2019-06-06', '16:00:00', 1, 1);


INSERT INTO Iscrizioni (utente, raduno) VALUES (1, 1);
INSERT INTO Iscrizioni (utente, raduno) VALUES (2, 1);
INSERT INTO Iscrizioni (utente, raduno) VALUES (3, 2);
INSERT INTO Iscrizioni (utente, raduno) VALUES (3, 3);
INSERT INTO Iscrizioni (utente, raduno) VALUES (1, 3);
INSERT INTO Iscrizioni (utente, raduno) VALUES (2, 3);
