# Laravel App with Angular FE

Clonare questa repo in una cartella, in un altra cartella clonare la repo del frontend
```
https://github.com/drilonhametaj25/laravel-test-fe.git
```

Una volta clonato il BE, entrare nella cartella e lanciare il seguente comando per installare le dipendenze
```
composer install
```

Lanciare il DB con docker
```
docker-compose up --build
```

Lanciare il backend
```
php artisan serve
```

Lanciare le migration
```
php artisan migration
```

Popolare il db con l'utente
```
php artisan db:seed
```

## Frontend angular

Una volta clonato il tutto entrare all'interno della cartella e lanciare il comando
```
docker-compose up --build
```

A questo punto sarà possibile andare nell'applicazione con il seguente link

http://localhost/login

ed effettuare l'accesso con 

email: prova@prova.it
password: password


## Test
Potete anche trovare un accenno di test per quanto riguarda la parte di laravel, lanciando il comando
```
php artisan test
```

