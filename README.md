# Proyecto Backend Laravel

Este repositorio contiene el código fuente del backend de nuestro proyecto Laravel. El proyecto utiliza MySQL como sistema de gestión de bases de datos y sigue las mejores prácticas de desarrollo de Laravel.

## Requisitos

Antes de comenzar, asegúrate de tener instalado PHP (versión 8.2.22 o superior), Composer, y MySQL en tu máquina local.

## Api
- **Api https://randomuser.me/**: Ruta `http://localhost:8000/random-users` (El puierto puede variar dependiendo de tu configuracion), la cual retorna 5 usuarios y te dice cual es la letra más utilizada en los
nombres completos de las 5 personas, y evuelve un array de esta manera.
`{
    "users": [
        {
    ..
        }
    ],
    "most_common_letter": ".."
}`

## Instalación

Para instalar este proyecto, sigue estos pasos:

1. Clona este repositorio en tu máquina local utilizando Git o descargando el archivo ZIP.

2. Navega al directorio del proyecto clonado en tu terminal.

3. Ejecuta `composer install` para instalar las dependencias del proyecto.

4. Copia el archivo `.env.example` a `.env` y ajusta las variables de entorno según sea necesario, especialmente la conexión a la base de datos.

5. Crea la base de datos "colegio" en tu servidor MySQL.

6. Ejecuta `php artisan migrate` para crear las tablas necesarias en la base de datos "colegio".

7. Ejecuta `php artisan db:seed` para cargar datos predefinidos en las tablas creadas.

## Uso

Una vez instalado y configurado el proyecto, puedes acceder a él a través de la URL especificada en el archivo `.env`, generalmente `http://localhost:8000`. Desde allí, podrás interactuar con las rutas y endpoints definidos en el proyecto.

## Contribución

Las contribuciones son bienvenidas. Por favor, abre un issue si encuentras algún problema o mejora potencial antes de realizar cambios significativos.
