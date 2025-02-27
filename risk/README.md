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

## Registrarse e Iniciar Sesión
En el header ponemos un {{route('register')}} o {{route('login')}} que nos llevará a las 
vistas de auth en las que nos podremos registrar o iniciar sesión
Para poder ver estos formularios sin cabmiar de página haremos lo siguiente:

## Redirigir despues de registrarse al home
Metiendose en [AuthenticatedSessionController.php](./app/Http/Controllers/Auth/AuthenticatedSessionController.php)
En la función de store que es la que usa cuando envías el formulario de register, por defecto redirige a dashboard
pero si quieres que te redirija al home pues pones la ruta de home

## Logout
Para desloguearse tienes que hacerlo mediante un formulario que llame a la ruta "logout" con el método post

## Landing page
Lo único a destacar es que en la parte de @auth he puesto el nombre del usuario con {{auth()->user()->name}}

## Modelo
Vamos a crear todos los archivos necesarios escribiendo en la terminal
```bash
php artisan make:model Alumno -a
```

## Migraciones
Para poder configurar una conexión con la base de datos y nuestro modelo crearemos una migración.
Esto lo haremos con:
```bash
php artisan make:migration proyectos
```

En la variable $table iremos asignando los campos que queremos que tegna la tabla



## Factorías
Con cada ejecución de una factoría se crea un registro en la tabla proyectos, en el definition pondremos
todos los campos que va a tener

## Seeder
Aquí pondremos cúantos registros crearemos de la factoria de proyectos, lo hacemos con:
Proyecto::factory()->count(nº de registros)->create();

## DatabaseSeeder
Finalmente asignaremos a este archivo qué seeders queremos que se ejecuten, de momento nosotros solo ejecutamos
el seeder de proyecto

Ahora con la migración creada la podemos ejecutar con:
```bash
php artisan migrate:refresh --seed
```
