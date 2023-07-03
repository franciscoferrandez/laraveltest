# Instalación

docker-compose -f docker-compose-nginx.yml up -d --build

Al levantar el contenedor "node" debería ejecutarse npm install y npm run dev para dejar el servidor de Vite corriendo en segundo plano.

A continuación, acceder a pgAdmin y crear una BD "laravel"

Ejecutar las migraciones con docker exec -u www-data app php artisan migrate

Acceder a la aplicación y registrar un usuario para poder acceder a los formularios

## Datos de acceso a los servicios

### pgAdmin
- http://localhost:5050/browser/
- usuario: raj@nola.com
- pass: admin

### PostgreSQL
- user
- admin

### mailcatcher
- http://localhost:1080/
- sin pass

## aplicación
- http://localhost:81/home

