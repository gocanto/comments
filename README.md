## Nested Comments

Simple application to control nested comments for given consumers.

> This project was developed using PHP, MySql and [Composer](https://getcomposer.org) to manage its dependencies.
> So, before using it, make sure you have them installed in your machine. Once you have done this, you will be able to 
>pull this library in by typing the following command in your terminal.

## Installation

```bash
git@github.com:gocanto/comments.git
```

After you have cloned the project, you should be able to execute the following commands from your command line within 
the project directory.

```bash
cp .env.example .env

composer install

php artisan key:generate
```

* Second of all, you will need to create a testing DB. This DB will be used to persist and read comments.

> Once you have done this, please make sure your DB setup abides by the `.env` files configuration. The DB related keys
> are (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
>

See example [configuration](https://github.com/gocanto/comments/blob/master/.env.example#L12-L14).

Once you have done this, you will be able to execute the following command to migrate your database and have the comments table
created. Like so:

```bash
php artisan migrate
```

Third of all, you should run the following command to have some seed data to test with.

```bash
php artisan migrate:fresh --seed
```

* Finally, you will have to make sure you have an HTTP server (Apache or nginx) serving locally this domain `http://comments.local`. This
domain can also be changed by updating the following [key](https://github.com/gocanto/comments/blob/master/.env.example#L5) in your `.env` file.

# License

The MIT License (MIT). Please see [License File](https://github.com/gocanto/comments/blob/master/LICENSE) for more information.
