# Gestion de Livres

Une application web de gestion de livres, développée en **Laravel**, permettant de gérer l'authentification des utilisateurs, l'affichage et la gestion des livres, ainsi que les emprunts et retours de livres.

## Fonctionnalités

### Authentification
- **S'inscrire** : Les utilisateurs peuvent créer un compte en fournissant un nom, une adresse email et un mot de passe.
- **Se connecter** : Les utilisateurs peuvent se connecter à leur compte avec leur adresse email et mot de passe.
- **Se déconnecter** : Les utilisateurs peuvent se déconnecter de leur compte.
- **Afficher les profils** : Les utilisateurs peuvent consulter leur profil avec les informations personnelles.

### Gestion des Livres
- **Afficher la liste des livres** : La liste des livres disponibles est affichée pour les utilisateurs.
- **Ajouter un nouveau livre** : Les utilisateurs peuvent ajouter de nouveaux livres avec des informations comme le titre, l'auteur, la description et l'image.
- **Modifier ou supprimer des livres** : Les utilisateurs peuvent modifier ou supprimer des livres existants (fonctionnalité réservée aux administrateurs).

### Gestion des Emprunts
- **Enregistrer les emprunts** : Les utilisateurs peuvent enregistrer les emprunts de livres et choisir une date de retour.
- **Enregistrer les retours** : Les utilisateurs peuvent enregistrer les retours de livres empruntés.

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les logiciels suivants :

- [PHP 8.x](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/)
- [MySQL ou PostgreSQL](https://www.mysql.com/) (selon votre choix de base de données)

## Installation

1. **Clonez le projet**
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/amine_sabri-Gestion-Bibliotheque
   cd gestion_bib
