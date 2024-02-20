# Inventory Management System
 Inventory Management System es una aplicación web desarrollada en Laravel para gestionar el inventario de productos de las cafeterías de la empresa KONECTA. Este sistema permite la creación, edición, eliminación y listado de productos, así como la realización de ventas y consultas directas en la base de datos.

## Características principales

- Creación, edición, eliminación y listado de productos.
- Registro de ventas y actualización automática del stock.
- Consultas directas en la base de datos para conocer el producto con más stock y el producto más vendido.

## Requisitos

- PHP >= 8.2
- Composer
- Laravel >= 10.x
- POSGREST, MySQL o cualquier otro sistema de gestión de bases de datos compatible con Laravel.

## Instalación

1. Clona el repositorio desde GitHub:

   ```bash
   git clone https://github.com/oscarfiscal/-coffee_shops.git

## 2. Instala las dependencias de Composer:
 ```bash
  cd coffee_shops
```
```bash
  composer install
```

## 3. Copia el archivo .env.example
```bash
cp .env.example .env
```

## 4. Genera la clave de la aplicación:
```bash
php artisan key:generate
```
## 5. Ejecuta las migraciones para crear las tablas necesarias en la base de datos::
```bash
php artisan migrate
```
## 5. Inicia el servidor de desarrollo:
```bash
php artisan serve
```
## 6.Visita http://localhost:8000 en tu navegador para acceder al sistema

## Funcionalidades de la Aplicación

Una vez que la aplicación esté instalada y en funcionamiento, tendrás acceso a las siguientes funcionalidades:

### Gestión de Productos

Esta funcionalidad te permite administrar los productos de tu inventario. Puedes realizar las siguientes operaciones:

- Crear nuevos productos.
- Editar la información de productos existentes.
- Eliminar productos del inventario.
- Listar todos los productos disponibles.

Cada producto debe contener la siguiente información:

- Nombre del producto.
- Referencia única.
- Precio unitario.
- Peso del producto.
- Categoría a la que pertenece.
- Cantidad disponible en stock.
- Fecha de creación del producto.

### Venta de Productos

Esta función te permite realizar la venta de productos desde tu inventario. Para llevar a cabo una venta, necesitas especificar el ID del producto que deseas vender y la cantidad que se va a vender. El sistema realizará automáticamente las siguientes acciones:

- Actualizará el stock del producto después de la venta.
- Registrará la venta realizada en el historial.
- Si el producto no tiene suficiente stock para satisfacer la venta solicitada, se mostrará un mensaje informando que la venta no puede ser procesada.

## Consultas Directas en la Base de Datos

Se incluyen dos consultas directas en la base de datos para obtener información relevante:

### Producto con Más Stock

Esta consulta permite conocer cuál es el producto que tiene más unidades en stock. 

### Producto Más Vendido

Esta consulta permite conocer cuál es el producto que ha sido mas vendido






    

