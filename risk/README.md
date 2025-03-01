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

## Listar proyectos
Empezamos modificando la función index del controlador de proyecto [ProyectoController.php](./app/Http/Controllers/ProyectoController.php)

Ahí haremos que cuando se busque el proyectos.index devuelva la vista del listado con el array de 
todos los alumnos
En esa vista he hecho un foreach del array alumnos que le hemos pasado y con eso he hecho la tabla

## Crear proyecto

### Vista
Cuando le demos al botón del listado de Crear proyecto nos llevará a proyecto.create
Ahí desplegaremos la vista del formulario para crear un proyecto nuevo, el formulario se compone de un
action proyectos.store con método post.

### Unauthorized
Inicialmente nos dará un error de unauthorized cuando intentemos ejecutarlo, eso pas porque tenemos que poner a true
la función authorize del [StoreProyectoRequest](./app/Http/Requests/StoreProyectoRequest.php)

### Crear reglas
Para asignar validaciones a los campos lo haremos en el mismo StoreProyectoRequest.php
En el método rules pondremos un return con todas las reglas que se van a aplicara los campos, por ejemplo
required(obligatorio),date(que sea una fecha), min:5(5 carácteres minimo), etc.

### Mostrar mensajes de error
Si esas validaciones ven que hay un error devolverán un mensaje, por lo tanto por cada regla que hayamos puesto
habrá una respuesta de error, que en el formulario llamaremos con @error("el campo que validamos") y dentro de 
ese error podremos llamar a la variable message.

### Asignar campos a proyecto
Iremos al modelo [Proyecto.php](./app/Models/Proyecto.php) y en su función asignaremos un fillable con
todos los campos que queremos que tenga, exceptuando al id, el created_at y updated_at

### Adaptar store
También tendremos que modificar la función "store" de [ProyectoController.php](./app/Http/Controllers/ProyectoController.php)
Para ello he cogido todos los campos del request, excepto los mencionados en el parrafo anterior.
Crearemos un objeto Proyecto con esos campos y haremos save() de ese objeto
Finalmente redirigiremos a la lista de proyectos una vez se haya guardado.



## Eliminar proyectos

### Controller
En el método destroy simplemente añadiremos la línea que elimina el proyecto:
$proyecto->delete();
Y luego redigiremos al listado de proyectos

### Vista
Para borrar un proyecto necesitamos que mediante un formulario con el método DELETE llame a la ruta
proyectos.destroy con el id del proyecto que queremos borrar. Para que detecte que el formulario
usa el método DELETE pondremos el method POST en la cabecera del formulario (porque solo detecta post o get)
y luego dentro del formulario pondremos @method("DELETE")


## Editar proyectos

### Controller
Primero haremos el método edit que simplemente te devuelve la vista proyectos.edit con la variable del proyecto 
que quieres editar

Luego pasamos al método update, en el que haremos una variable que recogerá todos los datos nuevos con un
$request->input(), después hacemos un update a ese proyecto con esos datos y devolveremos la vista del listado de nuevo

### Unauthorized
Al igual que al crear tienes que modificar el [UpdateProyectoRequest](./app/Http/Requests/UpdateProyectoRequest.php)
y poner authorize en true, después he copiado las mismas reglas y mensajes que en el de crear.

### Vista
Para editar pondré un botón que llame a proyectos.edit, el cual nos llevará al formulario para editar y también
hay que asignarle el id del proyecto que queremos editar

Ahora tendremos un formulario bastante parecido al de crear proyecto, la diferencia es que el action de este
tiene que ser un route("proyectos.update", $proyecto->id) ya que el método update necesita un objeto proyecto.
Además, como hemos hecho en el destroy incluiremos un @method("PUT") que es el método para actualizar. 


## Mostrar alumno

### Controller
Para el controller es como el edit, simplemente tiene que mandar a la vista de poryectos.show y darle
la variable del proyecto también

### Vista
He creado una tabla, simplemente en cada td necesario se ven los valores de la variable $proyecto que
le ha enviado el controller.


## Traducción

### Instalación
Para instalar hacemos 
```bash
composer require laravel-lang/lang
```
Ahora publicamos los idimas con:
```bash
php artisan lang:publish
```
Después instalaremos un idioma en concreto, en este caso instalaré el español, ingles y francés:
```bash
php artisan lang:add es
php artisan lang:add en
php artisan lang:add fr
```

### Layout
Ahora vamos a crear el elemento visual para seleccionar el lenguaje, he cogido la plantilla que tenía de 
daisyui del nav y he adaptado un menú desplegable a los idiomas.
Para ello para mostrar el primer idioma he cogido usado el archivo [lang.php](./config/lang.php) y lo he rellenado
con un array que contiene el nombre de cada lenguaje y su bandera.
Puedo acceder a ese archivo usando config('lang')
Así que mostrará el lenguaje que se está usando actualmente obteniendo del array de configuración el name del
idioma que está configurado en .env, con config( 'lang')[App::getLocale()]['name']
Luego he hecho un bucle para mostrar todos los lenguajes que hay y poder seleccionar el que quieras

### Middleware
Ahora usaremos un middleware para que cuando seleccionemos el lenguaje que queramos verdaderamente se cambie en el 
archivo .env

Lo crearemos con
```bash
php artisan make:middleware LanguageMiddleware
```
Ahora en el middleware pondremos que si hay una sesión con locale se cambie el env al valor de la sesión
y si no hay sesión locale que se cree con el valor de .env

Finalmente para que se ejecute este middleware iremos a [app.php](./bootstrap/app.php) y dentro de la función
withMiddleware añadiremos los middleware que queramos usar, en nuestro caso queremos que en las vistas de web 
se ejecute el middleware LanguageMiddleware

### Controller
Ahora crearemos el controlador que cambie la sesión del lenguaje para el middleware.

Crearemos el controller con:
```bash
php artisan make:controller LanguageController 
```

### Rutas
Finalmente añadiremos la ruta para que cuando llamemos a language/{locale} ejecute el controlador



