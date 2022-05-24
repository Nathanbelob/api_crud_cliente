# Como rodar o projeto:
```
$ composer install
```
```
$ cp .env.example .env
```

```
$ php artisan serve
```

Obs: Antes de startar o servidor, é preciso inserir as credenciais do banco de dados no arquivo .env

Caso não use um dump do banco de dados, é possivel atualizar com os seguintes comandos: 

```
$ php artisan migrate
```

```
$ php artisan db:seed
```