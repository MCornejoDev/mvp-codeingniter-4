# Proyecto Factoria Ideas Practica

## Requerimientos

- Docker
- Docker Compose

## Configurar las variables de entorno

Renombrar el archivo `env` a `.env`.

```bash
cp env .env
```

Editar el archivo `.env` y edita o añade las siguientes variables:

```bash
database.default.hostname = ci4_db
database.default.database = codeigniter
database.default.username = user
database.default.password = password
database.default.DBDriver = MySQLi
database.default.port = 3306
```

## Iniciar el contenedor

Para construir el contenedor ejecutamos:

```bash
docker-compose build
```

Si necesitamos recrear el contenedor ejecutamos:

```bash
docker-compose build --no-cache
```

Esto creara un contenedor con el nombre `ci4_app`.

Para iniciar el contenedor ejecutamos:

```bash
docker-compose up -d
```

Tambien podemos usar el comando `docker-compose up` para iniciar el contenedor con un log de la consola.

Accedemos al contenedor ejecutando:

```bash
docker exec -it ci4_app bash
```

Una vez dentro del contenedor, estaremos en la ruta `/var/www/html`, debemos instalar las dependencias con:

```bash
composer install
```

## Crear las tablas de la base de datos

Usaremos los siguientes comandos para crear las tablas y algunos datos fake.

```bash
php spark migrate
php spark db:seed DatabaseSeeder
```