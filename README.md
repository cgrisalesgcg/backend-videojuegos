## Prueba de ingreso

Este proyecto es un CRUD de tus videojuegos favoritos.
Estas son las tecnologias usadas:

-   Jwt
-   Laravel
-   MySQL

Para realizar la ejecucion del proyecto debes ejecutar desde la consola

-   Ejecutar el comando (Si no tienes Laravel)
    ```
    composer global require laravel/installer`
    ```
-   Crear la base de datos con el nombre backend_videojuegos
-   Ejecutar el comando (Instalacion de paquetes JWT)
    ```
    composer install
    ```
-   Ejecutar el comando (Para la creacion de las tablas de la base de datos)
    ```
    php artisan migrate
    ```

Si deseas ejecutar los EndPoints de los videojuegos debes primero registrarte enviando los parametros en el body

```
    URL -> http://127.0.0.1:8000/api/register
    {
        "name" : 'example1',
        "password" : 'example123.*',
        "password_confirmation" : 'example123.*',
        "email" : 'example@example.com'
    }
```

Recuerda que para hacer el CRUD de tus juegos favoritos debes enviar siempre como parametro en los headers el Token generado colocando la palabra Bearer antes del token

```
    {
        "Authorization": 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'
    }
```

Pero tranquilo, si se te olvido puedes consultarlo con tus credenciales

```
    URL -> http://127.0.0.1:8000/api/login
    {
        "email" : "example@example.com",
        "password" : "example123"
    }
```

Vamos a comenzar ¿Estas listo para agregar tus juegos favoritos?

```
    URL (Registrar juego) -> http://127.0.0.1:8000/api/registrarVideojuego

    HEADERS *Obligatorio para todas las peticiones*
    {
        "Authorization" : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9'
    }
    BODY
    {
        "nombre" : "Fifa 21",
        "descripcion" : "Juego de futbol",
        "produccion" : "EA Sports",
        "anio_creacion" : "2021",
        "img" : "img/fifa.png"
    }


    URL (Obtener un juego) -> http://127.0.0.1:8000/api/obtenerVideojuego
    BODY
    {
        "id" : "1"
    }

    URL (Obtener todos los juegos) -> http://127.0.0.1:8000/api/consultarVideojuegos
    BODY
    {}

    URL (Eliminar juego) -> http://127.0.0.1:8000/api/eliminarVideojuego
    BODY
    {
        "id" : "1"
    }

    URL (Editar juego) -> http://127.0.0.1:8000/api/registrarVideojuego
    BODY
    {
        "nombre" : "Fifa 21",
        "descripcion" : "Juego de futbol",
        "produccion" : "EA Sports",
        "anio_creacion" : "2021",
        "img" : "img/fifa.png",
        "id" : "1"
    }
    Espero te haya funcionado, hasta un nuevo proyecto ;)
```
