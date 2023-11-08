## Prérequis

- installer php8.1
- installer les extensions php suivantes (en plus de celles demandées par [symfony](https://symfony.com/doc/current/setup.html#:~:text=Symfony%20screencast%20series.-,Technical%20Requirements,used%20to%20install%20PHP%20packages)) :
  - php-mysql
  - php-ds


## Installation

- installer dependances composer: `composer install`
- installer dependances node: `npm install`
- modifier chaine de connexion pour bdd dans le fichier `.env`

## Developpement

Sur deux terminaux, lancer:
- symfony server:start (lance le serveur dev symfony)
- npm run watch (lance webpack pour le front) (du coup il n'est pas necessaire si l'on travaille que sur des endpoints API)

---

- Naviguer sur [localhost:8000](http://localhost:8000)
