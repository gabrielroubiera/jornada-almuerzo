# Jornada de Almuerzo Gratis

### Sistema para hacer pedidos de platos de comida para jornada de almuerzo gratis.

#### Tecnologias utilizadas:
- [Laravel 7](https://laravel.com/docs/7.x)
- [Laravel WebSockects](https://beyondco.de/docs/laravel-websockets/getting-started/introduction)
- [Pusher](https://pusher.com/)
- [Redis](https://redis.io/)
- [MySQL](https://www.mysql.com/)
- [Docker](https://www.docker.com/) & [Docker Compose](https://docs.docker.com/compose/)
- [Digital Ocean](https://www.digitalocean.com/) para la Restful API en Laravel
- [Heroku](https://dashboard.heroku.com/) para la interfaz de usuario con Angular.


#### Caracteristicas del sistema:
* Soporte de pedido masivos, los pedidos que no se pudieron procesar por falta de ingredientes se quedan en cola la cual se ejecuta cada 10 segundos para verificar si en la tienda de ingredientes hay suficientes para procesar el plato seleccionado.
- Se puede vizualizar la cantidad restante de ingredientes en la bodega.
* Se puede ver el historial de compra de ingredientes en la bodega.
- Se puede ver las recetas de los 6 platos disponibles.
* Se puede ver el historial de los platos solicitados.



