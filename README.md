## Recomendaciones
Actualmente usando php 8.1.0 y laravel 9.5 \
No olvidarse ejecutar
```php
composer install
``` 
```js
npm install
npm run build
```
Compilar los recursos(js,css) en desarrollo para que estos \
sean subidos al repositorio sin problemas 

La ruta actual de los estilos es /public/build/assets

Para configurar las traducciones en los menus o alguna parte de \
AdminLTE se deben editar el archivo:
```
/lang/vendor/adminlte/es/menu.php
```
Para configurar las traducciones de los labels de cualquier otra\
cosa que no sea el menu o alguna parte de adminlte, se debe\
usar la sintaxis de {{__("Hello World")}} o tambien\
{{trans("Hello World")}}

Esto para posteriormente modificar los archivos dentro de la carpeta\
/lang/es/ y principalmente el archivo /lang/es.json

