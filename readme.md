
# Laravel 6 com AdminLTE 3 Starter Kit

Starter kit para iniciar projetos em laravel

## Instação

Download do zip o clone do git

```bash

git clone https://github.com/danilomde/Lara6Lte3StarterKit.git

cd Lara6Lte3StarterKit

cp .env.example .env

php artisan key:generate

composer update

#configurar o banco de dados no .env

php artisan migrate:refresh --seed

php artisan serve



 # admin@admin.com - 123456
 # user@user.com   - 123456



```



## Plugins instalados

```
"jeroennoten/laravel-adminlte": "^3.0",       
"laravelcollective/html": "^6.0",
"lucascudo/laravel-pt-br-localization": "^1.0",
"spatie/laravel-permission": "^3.2"

```



## CRUDS

```
	- Usuários
	- Permissões

```


