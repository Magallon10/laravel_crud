# DOCUMENTACIÓN LARAVEL
## Instalación de laravel
```bash
laravel new risk
```
Hay que seleccionar:
- breeze: ofrece un sistema de autenteificación
- blade:
- phpunit
- mysql

### Instalar daisyui
```bash
npm i -D daisyui@latest
```
Y modificar el archivo [tailwind.config.js](./tailwind.config.js) para que en plugins requiera daisyui


### Docker
También he creado el [docker-compose.yaml](./docker-compose.yaml)docker-compose.yaml para tener un contenedor con la base de datos.
Las variables de la base de datos las cojo del archivo .env

Ahora inicio el docker y hago un php artisan migrate para que se llene la base de datos

### Iniciar laravel
 ```bash
npm run dev
php artisan serve
```
También puedes ejecutar un comando que haga estos dos a la vez:
```bash
composer dev
```

## Crear layouts
Ahora vamos a crear los layouts de la página.
Primero he creado una carpeta layouts dentro de ./resources/views/components
Dentro de esa carpeta crearé los layouts de mi web

### Header
He hecho un header con un icono de usuario, el cual cambia según si estás con una sesión iniciada o no
Con @guest he puesto el código del icono sin haber iniciado sesión y con @auth he 
puesto el código con la sesión iniciada

