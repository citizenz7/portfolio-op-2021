# Portfolio d'Olivier Prieur

Projet de création du portfolio d'Olivier Prieur avec le framework Symfony 5.

## Environnement de développement

### Pré-requis

* PHP 7.4
* Composer
* Symfony CLI
* Docker
* Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (issue de la CLI Symfony) :

```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
composer install
docker-compose up -d
symfony serve -d
```

### Création du compte admin
```
symfony console app:create-user EMAIL PASSWORD
```
Ce qui donnera par exemple :
```
symfony console app:create-user john.doe@gmail.com password
```

### Translations
```
php bin/console translation:update --force en
```
ou
```
php bin/console translation:extract --force en
```
... depuis Symfony 5.4