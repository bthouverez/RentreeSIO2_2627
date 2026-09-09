-- REQUETES SQL

-- A FAIRE POUR DEMAIN le 9/9/26


-- Les infos des enfants dont le nom termine par -ert
SELECT * FROM Enfants WHERE nom LIKE '%ert';

-- Le nombre d'enfants n'ayant pas de téléphone
SELECT COUNT(*) FROM Enfants WHERE num_tel IS NULL;

-- La moyenne de la distance au sol des enfants
SELECT AVG(distance_au_sol) as moyenne FROM Enfants;

-- Les noms et prénoms des enfants tout mouillés (+70%) nés avant 2020
-- SELECT * FROM Enfants WHERE taux_humidite > 0.7 AND date_naissance < '2020-01-01';
SELECT nom, prenom FROM Enfants WHERE taux_humidite > 0.7 AND YEAR(date_naissance) < 2020;


-- Les infos des enfants nés en Février ou en juillet dont le prénom contient moins de 6 lettres
SELECT * FROM Enfants WHERE (MONTH(date_naissance) = 7 OR MONTH(date_naissance) = 2) AND CHAR_LENGTH(prenom) < 6;
SELECT * FROM Enfants WHERE  MONTH(date_naissance) IN (2, 7) AND CHAR_LENGTH(prenom) < 6;
SELECT * FROM Enfants WHERE (date_naissance LIKE '%-02-%' OR date_naissance LIKE '%-07-%') AND prenom NOT LIKE '______%';

-- Le nombre de stylos par couleurs, dans l'ordre du plus nombreux aux moins nombreux


-- Les stylos de m***e qui ont plus de 50% d'encre mais qui ne fonctionnent pas


-- Le nombre de stylos du futur, qui n'ont plus d'encre mais qui fonctionnent


-- Par marque, pourcentage de stylos qui fonctionnent


-- Le nombre de stylos par enfant