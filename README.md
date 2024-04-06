Установите docker.

Установите все пакеты:
```shell
composer install
```

Скопируйте .env:

```shell
cp .env.example .env
```

В созданный .env файл необходимо внести настройки, а также добавить 3 новых параметра, если их вдруг не будет:
```
L5_SWAGGER_CONST_HOST_V1="http://localhost/api/v1"
L5_SWAGGER_GENERATE_ALWAYS=true
L5_SWAGGER_UI_DOC_EXPANSION=list
```

Сгенерируйте ключ:
```shell
php artisan key:generate
```

Установите sail:
```shell
php artisan sail:install
```

Запустите проект:
```shell
sail up -d
```

Выполните artisan команды:
```shell
# Выполнить миграции
sail artisan migrate

# Выполнить сидеры
sail artisan db:seed
```

В браузере открывайте http://localhost/api/v1