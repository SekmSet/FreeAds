# FreeAds - L'Bon Coin

## How to install 

```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
```

Configure the file : .env 

## Create your database

```bash
    php artisan migrate --seed      
```

## Create your Mailtrap account and config it

```bash
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_mail_username
    MAIL_PASSWORD=your_mail_password
    MAIL_FROM_ADDRESS=from@example.com
    MAIL_FROM_NAME="${APP_NAME}"
```

The default users's password is : password

## Run the server 

```bash
    php artisan serv --port 3000
```

## Tools used

Mailtrap : https://mailtrap.io/
