
# WR506 / Movie Backend / Antoine LAUZIS / 2024

### Prérequis nécessaires

- [Php 8.1](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Symfony CLI](https://symfony.com/download)
- OpenSSL (pour générer les clés JWT)

### Installation

1. Cloner le repository :
    ```bash
    cd C:/DossierDev
    git clone https://github.com/Antoaane/WRA506-Movies-Backend.git
    ```
1. Installer les dépendances
    ```bash
    composer install
    composer update
    ```
2. Créer le fichier .env.local et renseigner les variables d'environnement
    ```bash
    cp .env .env.local
    ```
3. Renseigner les variables suivantes :
    ```dotenv
    DATABASE_URL #(url de la base de données)
    APP_URL #(adresse IP/URL du back)
    FRONT_URL #(adresse IP/URL du front)
    MAILER_SENDER #(adresse mail d'envoie des mails)
    MAILER_DSN #(adresse IP/URL du serveur mail)
    ```
4. Créer la base de données
    ```bash
    php bin/console d:d:c
    php bin/console d:m:m
    ```
5. Pousser les fixtures
    ```bash
    php bin/console d:f:l
    ```
6. Générer les clés JWT
    ```bash
    php bin/console lexik:jwt:generate-keypair
    ```
7. Lancer le serveur du projet
    ```bash
    symfony server:start
    ```

- La documentation de l'API est disponible à l'adresse suivante : [http://localhost:8000/api/doc](http://localhost:8000/api/docs)

- Les identifiants par défaut pour se connecter à l'API sont les suivants :
```
User:
    email : user1@example.com [user1-user5]
    password : password
```