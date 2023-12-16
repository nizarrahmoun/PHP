# Projet de Programmation Orientée Objet en PHP

## Description
Ce projet illustre la mise en œuvre des concepts de Programmation Orientée Objet (POO) en PHP. Il inclut des classes pour représenter des personnes (`Personne`), des étudiants (`Etudiant`), ainsi qu'une sous-classe pour les personnes avec un lieu de naissance connu (`CertainsPersonnes`).

## Fonctionnalités
- **Classe Personne** : Représente une personne avec des attributs tels que le nom, prénom et date de naissance. Inclut des méthodes pour la présentation et le calcul de l'âge.
- **Classe Etudiant** : Hérite de `Personne`. Ajoute un attribut identifiant et des méthodes pour déterminer l'éligibilité à une bourse en fonction de l'âge.
- **Classe CertainsPersonnes** : Une sous-classe de `Personne` qui inclut un attribut supplémentaire de lieu de naissance.
- **Calcul de l'Âge** : Calcule dynamiquement l'âge des personnes.
- **Méthodes Descriptives** : Méthodes améliorées pour décrire les personnes, y compris leur statut de boursier et lieu de naissance.

## Comment Utiliser
1. Clonez le dépôt.
2. Incluez les fichiers `Personne.php`, `CertainsPersonnes.php` et `Etudiant.php` dans votre script PHP.
3. Créez des instances des classes et utilisez leurs méthodes pour obtenir des descriptions de personnes.

## Exemple
Voir `TestPersonne.php` pour des exemples de création d'instances et d'utilisation de ces classes.

## Licence
Tous droits réservés.


