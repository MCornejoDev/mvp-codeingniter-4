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
CI_ENVIRONMENT = development

database.default.hostname = ci4_db
database.default.database = codeigniter
database.default.username = user
database.default.password = password
database.default.DBDriver = MySQLi
database.default.port = 3306

app.baseURL = 'http://localhost/'
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
> [!NOTE]
> Tambien podemos usar el comando `docker-compose up` para iniciar el contenedor con un log de la consola.

Accedemos al contenedor ejecutando:

```bash
docker exec -it ci4_app bash
```

Una vez dentro del contenedor, estaremos en la ruta `/var/www/html`, debemos instalar las dependencias con:

```bash
composer install
```

También instalaremos las dependencias necesarias para el uso de Tailwind CSS:

```bash
npm install
npm run dev
```

> [!NOTE]
> Al ejecutar el comando `npm run dev` se iniciará la compilación de CSS y se actualizará automáticamente el archivo `public/css/output.css` con los cambios.

## Crear las tablas de la base de datos

Usaremos los siguientes comandos para crear las tablas y algunos datos fake.

```bash
php spark migrate
php spark db:seed DatabaseSeeder
```
> [!NOTE]
> Tambien podemos usar el comando `php spark migrate:refresh` para actualizar las tablas.

## Acceso a la aplicación

Accedemos a la aplicación ejecutando:

```bash
http://localhost/
```

## Credenciales de acceso

Ya tenemos en funcionamiento credenciales de administrador y un usuario :

Usuario administrador:

```bash
Correo electrónico: admin@admin.com
Contraseña: admin
```

Usuario normal:
```bash
Correo electrónico: user@user.com
Contraseña: user
```

