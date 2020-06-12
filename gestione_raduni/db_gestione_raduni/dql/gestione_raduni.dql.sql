SELECT nome, cognome, cf, data_nascita, email FROM Utenti ORDER BY cognome;

SELECT * FROM Raduni;

SELECT * FROM Auto WHERE tipologia = 4 AND marca = 'Fiat';

SELECT * FROM luoghi WHERE regione = 'Veneto';

SELECT * FROM Raduni WHERE data BETWEEN '2017-01-01' AND CURDATE();

SELECT id_tipologia, nome FROM Tipologia WHERE id_tipologia = 2;

/* Visualizzare il numero di iscrizioni a un determinato raduno */
SELECT Raduni.nome, data, ora, Utenti.nome, cognome, email
FROM Utenti, Iscrizioni, Raduni
WHERE Iscrizioni.utente = id_utente AND iscrizioni.raduno = id_raduno AND id_raduno = 1;

/* Numero di raduni in un determinato luogo */
SELECT id_luogo, Luoghi.via, Luoghi.civico, Luoghi.comune, Luoghi.provincia, Luoghi.regione, Luoghi.nazione, COUNT(id_luogo) AS numero_raduni
FROM Luoghi, Raduni
WHERE id_luogo = Raduni.luogo AND id_luogo = 1;

/* Visualizzare il numero di vetture presenti in un raduno */
SELECT id_raduno, Raduni.nome, COUNT(id_raduno) AS numero_auto 
FROM Raduni, Utenti, Iscrizioni, Auto
WHERE Iscrizioni.utente = id_utente AND Iscrizioni.raduno = id_raduno AND Utenti.auto = id_auto AND Utenti.auto IS NOT NULL
GROUP BY id_raduno;