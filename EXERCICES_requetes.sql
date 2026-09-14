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
SELECT couleur, COUNT(*) AS quantite FROM Stylos GROUP BY couleur ORDER BY quantite DESC;

-- Les stylos de m***e qui ont plus de 50% d'encre mais qui ne fonctionnent pas
SELECT * FROM Stylos WHERE niveau_encre > 50 AND fonctionne = FALSE;

-- Le nombre de stylos du futur, qui n'ont plus d'encre mais qui fonctionnent
SELECT * FROM Stylos WHERE niveau_encre = 0 AND fonctionne = TRUE;

-- Par marque, pourcentage de stylos qui fonctionnent triés par la meilleure marque
| Parker   |  97%  |
| Velleda  |   7%  |
| Bic      |  84%  |
SELECT marque, ROUND(100 * SUM(fonctionne) / COUNT(*), 2) AS pourcentage_fonctionnel
FROM Stylos
GROUP BY marque
ORDER BY pourcentage_fonctionnel DESC;


-- Par marque, pourcentage de stylos qui fonctionnent triés par la meilleure marque, pour les marques ayant plus de 75%
SELECT marque, ROUND(100 * SUM(fonctionne) / COUNT(*), 2) AS pourcentage_fonctionnel
FROM Stylos
GROUP BY marque
HAVING pourcentage_fonctionnel > 75
ORDER BY pourcentage_fonctionnel DESC;


-- Nom et prenom des enfants ayant un stylo Violet
SELECT nom, prenom FROM Enfants e JOIN Stylos s ON s.id_enfant = e.id WHERE couleur = 'Violet';


-- Le nombre de stylos par enfant
SELECT nom, prenom, COUNT(*) FROM Stylos s JOIN Enfants e ON e.id = s.id_enfant GROUP BY prenom, nom



-- Afficher les stylos mâchés par Margaux Boyer
