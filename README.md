**Configuración**

ejecutamos

`composer install
`

una vez instalado los vendor copiamos el archivo .env.example y lo pegamos como .env y configuramos nuestra base de datos.

antes de continuar ejecutamos el migrate esto creara las tablas de la base de datos de manera automatica.

`php artisan migrate`

si deseamos probar con el webpack de  artisan ejecutamos

`php artisan serve
`

si no debemos configurar nuestro apache para ejecutarse en nuestro servidor.
