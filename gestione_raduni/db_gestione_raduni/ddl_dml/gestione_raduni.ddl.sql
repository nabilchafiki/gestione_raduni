CREATE DATABASE gestione_raduni;

USE gestione_raduni;

CREATE TABLE IF NOT EXISTS Tipologia (
    id_tipologia INT AUTO_INCREMENT PRIMARY KEY,
    nome ENUM ('berlina','cabriolet','coupe','altro') UNIQUE NOT NULL,
    descrizione TEXT
);


CREATE TABLE IF NOT EXISTS Luoghi (
    id_luogo INT AUTO_INCREMENT PRIMARY KEY,
    via VARCHAR(255) NOT NULL,
    civico VARCHAR(4) NOT NULL,
    comune VARCHAR(100) NOT NULL,
    provincia CHAR(2) NOT NULL,
    regione VARCHAR(100) NOT NULL,
    nazione VARCHAR(100) NOT NULL
);


CREATE TABLE IF NOT EXISTS Auto (
    id_auto INT AUTO_INCREMENT PRIMARY KEY,
    targa VARCHAR(30) UNIQUE NOT NULL,
    marca varchar(50) NOT NULL,
    modello varchar(50) NOT NULL,
    anno YEAR NOT NULL,
    tipologia INT NOT NULL,
    FOREIGN KEY (tipologia) REFERENCES Tipologia(id_tipologia)
);


CREATE TABLE IF NOT EXISTS Utenti (
    id_utente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(25) NOT NULL,
    cognome VARCHAR(25) NOT NULL,
    data_nascita DATE NOT NULL,
    cf char(16) UNIQUE NOT NULL,
    email varchar(50) UNIQUE NOT NULL,
    password CHAR(60) NOT NULL,
    auto INT,
    residenza INT NOT NULL,
    documento VARCHAR(255),
    FOREIGN KEY (auto) REFERENCES Auto(id_auto),
    FOREIGN KEY (residenza) REFERENCES Luoghi(id_luogo)
);


CREATE TABLE IF NOT EXISTS Raduni (
    id_raduno INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descrizione TEXT,
    data DATE NOT NULL,
    ora TIME NOT NULL,
    luogo INT NOT NULL,
    tipologia INT NOT NULL,
    FOREIGN KEY (luogo) REFERENCES Luoghi(id_luogo),
    FOREIGN KEY (tipologia) REFERENCES Tipologia(id_tipologia)
);


CREATE TABLE IF NOT EXISTS Iscrizioni (
    id_iscrizione INT AUTO_INCREMENT PRIMARY KEY,
    utente INT NOT NULL,
    raduno INT NOT NULL,
    FOREIGN KEY (utente) REFERENCES Utenti(id_utente),
    FOREIGN KEY (raduno) REFERENCES Raduni(id_raduno)
);
