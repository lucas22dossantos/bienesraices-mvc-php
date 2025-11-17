# Bienes Raíces MVC (PHP)

Proyecto desarrollado con **PHP** aplicando el patrón **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**.
Incluye conexión a MySQL, autenticación de usuarios, automatización de tareas con Gulp, protección de rutas y administración completa de propiedades y vendedores.

---

## Tabla de Contenidos

- **Descripción**
- **Funcionalidades**
- **Tecnologías Usadas**
- **Requisitos**
- **Instalación**
- **Configuración**
- **Uso**
- **Estructura del Proyecto**
- **Autenticación**
- **Base de Datos**
- **Autor**

---

## Descripción

Sistema de administración de bienes raíces construido en PHP MVC.
Permite crear, editar, listar y eliminar propiedades y vendedores, incluye autenticación con sesiones y protección de rutas, y automatiza tareas frontend con Gulp.

Es ideal para aprender arquitectura MVC, seguridad básica, validación de formularios, manejo de sesiones y organización profesional de un proyecto PHP.

---

## Funcionalidades

- Arquitectura **MVC** organizada.
- CRUD completo de **propiedades**.
- CRUD de **vendedores**.
- **Autenticación de usuarios** (login y logout).
- **Protección de rutas** para administradores.
- Manejo de **sesiones**.
- Validación de formularios.
- Conexión a base de datos MySQL.
- Compilación y optimización de CSS/JS mediante **Gulp**.
- Subida y optimización de imágenes.

---

## Tecnologías Usadas

- PHP 7/8
- MySQL
- HTML5 / CSS3 / SASS
- JavaScript
- Node.js / npm
- Gulp

---

## Requisitos

- PHP 7+ / 8
- Servidor web (Apache, Nginx)
- MySQL
- Node.js + npm (para Gulp)
- Composer (opcional)

---

## Instalación

1. Cloná el repositorio en tu computadora.
2. Instalá las dependencias de Node usando `npm install`.
3. Ejecutá Gulp para compilar los archivos frontend.
4. Configurá tu servidor web para que el **document root** sea la carpeta **/public**.

---

## Configuración

- Creá una base de datos (ej.: `bienesraices_crud`).
- Configurá tus credenciales en el archivo de conexión a la base de datos.
- Importá las tablas indicadas en la sección de base de datos (más abajo).

---

## Uso

- Abrí la URL local de tu proyecto (por ejemplo: `http://localhost/bienesraices-mvc-php/`).
- Accedé al formulario de login para entrar al panel de administración.
- Una vez logueado podrás gestionar propiedades y vendedores.
- El sistema mostrará el enlace **Cerrar Sesión** si la sesión está activa.

---

## Estructura del Proyecto

/controllers — Controladores MVC
/models — Modelos del sistema
/views — Vistas HTML/PHP
/public — Carpeta pública del proyecto
/includes — Helpers y configuración
/src — Código compartido (rutas, clases varias)
gulpfile.js — Configuración de Gulp
package.json — Dependencias frontend
Router.php — Enrutador MVC principal

---

## Autenticación

El sistema de login implementa:

- Validación de email y contraseña.
- Verificación del usuario en la base de datos.
- Comparación de contraseñas con `password_verify`.
- Creación de sesión `$_SESSION['login']`.
- Cierre de sesión desde la ruta `/logout`.
- Protección automática de rutas administrativas.

---

# 🗄️ Base de Datos

La base de datos **bienesraices_crud** contiene tres tablas principales:

- **usuario**
- **vendedores**
- **propiedades**

---

## 📍 Tabla: `usuario`

| Campo      | Tipo         | Descripción                          |
| ---------- | ------------ | ------------------------------------ |
| id         | INT (PK, AI) | Identificador único                  |
| correo     | VARCHAR(50)  | Email del administrador              |
| contrasena | CHAR(60)     | Contraseña cifrada con password_hash |

Ejemplo:

- correo: `email@gmail.com`
- contraseña: `1234`

---

## 📍 Tabla: `vendedores`

| Campo    | Tipo         | Descripción         |
| -------- | ------------ | ------------------- |
| id       | INT (PK, AI) | Identificador       |
| nombre   | VARCHAR(45)  | Nombre del vendedor |
| apellido | VARCHAR(45)  | Apellido            |
| telefono | VARCHAR(10)  | Teléfono            |

---

## 📍 Tabla: `propiedades`

| Campo           | Tipo          | Descripción                   |
| --------------- | ------------- | ----------------------------- |
| id              | INT (PK, AI)  | Identificador de la propiedad |
| titulo          | VARCHAR(45)   | Título                        |
| precio          | DECIMAL(10,2) | Precio                        |
| imagen          | VARCHAR(200)  | Nombre del archivo subido     |
| descripcion     | LONGTEXT      | Descripción larga             |
| habitaciones    | INT           | Habitaciones                  |
| wc              | INT           | Baños                         |
| estacionamiento | INT           | Cocheras                      |
| creado          | DATE          | Fecha de creación             |
| vendedores_id   | INT (FK)      | ID del vendedor asociado      |

### 🔗 Relación

`propiedades.vendedores_id` → `vendedores.id`
Un vendedor puede tener muchas propiedades.

---

## 🔄 Diagrama Simplificado

usuario

- id
- correo
- contrasena

vendedores

- id
- nombre
- apellido
- telefono

propiedades

- id
- titulo
- precio
- imagen
- descripcion
- habitaciones
- wc
- estacionamiento
- creado
- vendedores_id (FK → vendedores.id)

---

## 📥 Script SQL (resumen)

CREATE TABLE `usuario` (
id INT AUTO_INCREMENT PRIMARY KEY,
correo VARCHAR(50),
contrasena CHAR(60)
);

CREATE TABLE `vendedores` (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(45),
apellido VARCHAR(45),
telefono VARCHAR(10)
);

CREATE TABLE `propiedades` (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(45),
precio DECIMAL(10,2),
imagen VARCHAR(200),
descripcion LONGTEXT,
habitaciones INT,
wc INT,
estacionamiento INT,
creado DATE,
vendedores_id INT
);

---

## Autor

**Lucas Dos Santos**
