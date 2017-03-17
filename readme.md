# Framework PHP - Campus Ynov - Mars 2017

## Présentation de l'application

- Basée sur le framework PHP [Laravel](https://www.laravel.com)
- Utilise une base de données SQLite
- Permet aux utilisateurs connectés de gérer des articles (création, édition,
suppression)

## Prérequis

- PHP >= 7.0
- [Composer](https://getcomposer.org)

## Installation

- Cloner de dépot : `git clone https://github.com/kblais/ynov-frameworks-php.git`
- Installer les dépendances PHP : `composer install`
- Copier le fichier `.env.example` en un fichier `.env`
- Créer un fichier vide `database/database.sqlite`
- Créer la clé de chiffrement de Laravel : `php artisan key:generate`
- Créer nos tables en base de données : `php artisan migrate`

## Utilisation

Pour lancer l'application, utiliser le serveur HTTP inclus dans PHP via la
commande Laravel `php artisan serve`. L'application est alors accessible sur à
l'adresse [http://localhost:8000](http://localhost:8000).
