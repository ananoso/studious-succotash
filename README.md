## Wymagania

PHP w wersji 8.0
Mysql
NPM i nodejs (polecam używać też nvm)

## Instalacja projektu

1.Uzupełnienie pliku .env, konfiguracja bazydanych

2.Instalacja pakietów

```bash
composer install
```
3.Generowanie klucza aplikacji
```bash
php artisan key:generate
```

4.Uruchomić polecenia które wypełni bazę danych domyślnymi wartościami

```bash
php artisan migrate:refresh --seed
php artisan migrate
```

5.Kompilacja statycznych assetów
```bash
npm install
npm run build
```

6.Uruchomienie lokalnego serwera

```bash
php artisan serve
```

Dane do logowania
```bash
admin@admin.com     password
manager@mail.com    password
user@mail.com       password
```

