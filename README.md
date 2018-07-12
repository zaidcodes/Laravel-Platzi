# Laravel-Platzi
Curso de Laravel con Platzi

---

- Inicializar servidor artisan: php artisan serve

# Controller
- Crear: php artisan make:controller <Nombre>Controller

# Model
- Crear: php artisan make:model <Nombre>

# Migration
- Crear migration: php artisan make:migration create_messages_table --create messages
- Ejecutar todas las migrations que esten listas: php artisan migrate
- Crear un indice: php artisan make:migration add_created_at_index_to_messages_table --table message
- para volver a un migration anterior: php artisan migrate:rollback
- Para volver atras todas las migrations: php artisan migrate:reset
- Para volver y ejecutar todas las migrations: php artisan migrate:refresh

# Form request

- Crear: php artisan make:request <nombre>

# Datos fake

- ## Tinker

    - Modo tinker: php artisan tinker
    - Crear instancia de un objeto: factory(App\Message::class)->make()
    - Crear en bbdd un objeto: factory(App\Message::class)->create()

- ## Seed

    - Ejecuta el factory que se encuentra en DatabaseSeeder: php artisan db:seed

    - Eliminar datos anteriores y ejecutar nuevamente: php artisan migrate: refresh --seed

# Generar codigo para usuarios (login/registro)
    - php artisan make:auth

# create the symbolic link, you may use the storage:link

    - php artisan storage:link

# test con php unit
    - ./vendor/bin/phpunit