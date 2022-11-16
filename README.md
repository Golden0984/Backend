# Instalacion symfony:
1. Instalar version PHP 8.1 min
2. Instalar composer
3. Instalar symfony cli 


# Clonar repositorio
1. Instalacion git clone proyecto
2. Ejecutar Composer install(para instalar las dependencias y insertara automaticamente los datos de la tabla de about us y contact)
3. Arrancar servidor local `symfony server:start`


# Symfony configuracion servidor para la conexion con la BBDD
1.  Conexion de 0
    1.1. Configuracion archivo .env `DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3306/nombreBBDD?serverVersion=8&charset=utf8mb4"`
    1.2. Creacion BBDD : `php bin/console doctrine:database:create`
    1.3. Si ya hay migraciones guardadas, las migras para crear las tablas : `php bin/console doctrine:migrations:migrate`,si estuviera vacia 
    pero hay entidades, primero ejecuatas `php bin/console make:migration`

2.  Reconexion:
    2.1. Verificar si no hay migraciones que faltan por migrar `php bin/console doctrine:migrations:status`
    2.2. Si hay un error, ejecutas este comando, que sincroniza con los datos `php bin/console doctrine:migration:sync-metadata-storage`

# Instalacion symfony:
1. Instalar version PHP 8.1 min
2. Instalar composer
3. Instalar symfony cli 


# Clonar repositorio
1. Instalacion git clone proyecto
2. Ejecutar Composer install(para instalar las dependencias y insertara automaticamente los datos de la tabla de about us y contact)
3. Arrancar servidor local `symfony server:start`


# Symfony configuracion servidor para la conexion con la BBDD
1.  Conexion de 0
    1.1. Configuracion archivo .env `DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3306/nombreBBDD?serverVersion=8&charset=utf8mb4"`
    1.2. Creacion BBDD : `php bin/console doctrine:database:create`
    1.3. Si ya hay migraciones guardadas, las migras para crear las tablas : `php bin/console doctrine:migrations:migrate`,si estuviera vacia 
    pero hay entidades, primero ejecuatas `php bin/console make:migration`

2.  Reconexion:
    2.1. Verificar si no hay migraciones que faltan por migrar `php bin/console doctrine:migrations:status`
    2.2. Si hay un error, ejecutas este comando, que sincroniza con los datos `php bin/console doctrine:migration:sync-metadata-storage`

# Configuracion para corregir el proyecto
1. Crear el archivo .env , pegar el contenido de env-exam al archivo .env creado y modificar los datos necesarios para la base de datos.

2. Crear la base de datos ´php bin/console doctrina:database:create´ , recogera la informacion del .env

3. Migrar las tablas a la BBDD, con los archivos de la carpeta migrations, ´php bin/console doctrine:migrations:migrate´

4. Insertar los datos a la BBDD con el comando que creamos, ´php bin/console app:insert-data´, esto inserta la informacion que tenemos en la base de datos

5. Para ver la informacion desde Angular, hay que tener abierto el servidor de symfony

