# Bienes Raíces MVC (PHP)

Proyecto desarrollado en **PHP** utilizando el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**.  
Incluye conexión a **MySQL**, **autenticación de usuarios**, **protección de rutas**, **administración completa de propiedades y vendedores**, y automatización de tareas frontend con **Gulp**.

Ideal para aprender buenas prácticas en desarrollo web con PHP, manejo de sesiones, validación de formularios, seguridad básica y organización profesional de un proyecto.

---

## 📋 Tabla de Contenidos

- [Descripción](#-descripción)
- [Funcionalidades](#-funcionalidades)
- [Tecnologías Usadas](#-tecnologías-usadas)
- [Requisitos](#-requisitos)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Uso](#-uso)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Autenticación](#-autenticación)
- [Base de Datos](#-base-de-datos)
- [Autor](#-autor)

---

## 📝 Descripción

Sistema de administración de bienes raíces construido con **PHP en arquitectura MVC**.  
Permite gestionar **propiedades** y **vendedores** mediante operaciones CRUD completas, incluye un sistema de **autenticación seguro con sesiones**, protección de rutas administrativas y automatización de activos frontend con **Gulp**.

---

## ✨ Funcionalidades

- Arquitectura **MVC** clara y organizada.
- CRUD completo de **propiedades**.
- CRUD de **vendedores**.
- **Autenticación de usuarios** (login y logout).
- **Protección de rutas** para áreas administrativas.
- Manejo de **sesiones PHP**.
- Validación de formularios del lado del servidor.
- Conexión a base de datos **MySQL**.
- Compilación y optimización de **CSS (SASS)** y **JavaScript** con **Gulp**.
- Subida y gestión básica de **imágenes**.

---

## ⚙️ Tecnologías Usadas

- **PHP 7/8**
- **MySQL**
- **HTML5 / CSS3 / SASS**
- **JavaScript**
- **Node.js / npm**
- **Gulp**
- **Composer**

---

## 🧰 Requisitos

- PHP 7+ o 8+
- Servidor web (Apache, Nginx, etc.)
- MySQL
- Node.js y npm (para Gulp)
- Composer (opcional, para autoloading o dependencias futuras)

---

## 📥 Instalación

1. Clona el repositorio en tu entorno local:
   ```bash
   git clone https://github.com/tu-usuario/bienesraices-mvc-php.git
   ```
2. Instala las dependencias de frontend:
   ```bash
   npm install
   ```
3. Ejecuta Gulp para compilar los archivos SASS y JavaScript:
   ```bash
   npx gulp
   ```
4. Configura tu servidor web para que el **document root** apunte a la carpeta **`/public`**.

---

## ⚙️ Configuración

1. Crea una base de datos en MySQL (por ejemplo: `bienesraices_crud`).
2. Configura las credenciales de conexión en el archivo correspondiente (generalmente en `/includes/database.php` o similar).
3. Importa las tablas usando el script SQL proporcionado en la sección [Base de Datos](#-base-de-datos).

---

## ▶️ Uso

- Accede al proyecto publico desde tu navegador:  
  Ejemplo: `http://localhost/`
- Inicia sesión en el panel de administración con las credenciales de ejemplo:
  Ejemplo: `http://localhost/login`
  - **Email**: `email@gmail.com`
  - **Contraseña**: `1234`
- Una vez autenticado, podrás gestionar **propiedades** y **vendedores**.
- El sistema muestra un enlace de **"Cerrar Sesión"** mientras la sesión esté activa.

---

## 🗂️ Estructura del Proyecto

```
/bienesraices-mvc-php
│
├── /controllers     # Controladores MVC
├── /models          # Modelos (lógica de negocio y base de datos)
├── /views           # Vistas (HTML + PHP)
├── /public          # Carpeta pública (CSS, JS, imágenes, index.php)
├── /includes        # Archivos de configuración y helpers
├── /src             # Clases compartidas (ej. Router, etc.)
├── gulpfile.js      # Configuración de Gulp
├── package.json     # Dependencias de frontend
└── Router.php       # Enrutador principal del MVC
```

---

## 🔐 Autenticación

El sistema implementa un flujo de autenticación básico pero seguro:

- Validación de **email** y **contraseña**.
- Verificación contra la base de datos.
- Comparación de contraseñas con `password_verify()`.
- Inicio de sesión mediante `$_SESSION['login'] = true`.
- Cierre de sesión en la ruta `/logout`.
- **Protección automática** de rutas administrativas mediante validación de sesión.

---

## 🗄️ Base de Datos

La base de datos se llama **`bienesraices_crud`** y contiene tres tablas principales:

- `usuario`
- `vendedores`
- `propiedades`

---

### 📍 Tabla: `usuario`

| Campo      | Tipo         | Descripción                              |
| ---------- | ------------ | ---------------------------------------- |
| id         | INT (PK, AI) | Identificador único                      |
| correo     | VARCHAR(50)  | Email del administrador                  |
| contrasena | CHAR(60)     | Contraseña cifrada con `password_hash()` |

> **Ejemplo de credenciales** (¡cambia en producción!):
>
> - Correo: `email@gmail.com`
> - Contraseña: `1234` → almacenada como hash

---

### 📍 Tabla: `vendedores`

| Campo    | Tipo         | Descripción         |
| -------- | ------------ | ------------------- |
| id       | INT (PK, AI) | Identificador       |
| nombre   | VARCHAR(45)  | Nombre del vendedor |
| apellido | VARCHAR(45)  | Apellido            |
| telefono | VARCHAR(10)  | Número de teléfono  |

---

### 📍 Tabla: `propiedades`

| Campo           | Tipo          | Descripción                        |
| --------------- | ------------- | ---------------------------------- |
| id              | INT (PK, AI)  | Identificador                      |
| titulo          | VARCHAR(45)   | Título de la propiedad             |
| precio          | DECIMAL(10,2) | Precio en moneda local             |
| imagen          | VARCHAR(200)  | Nombre del archivo subido          |
| descripcion     | LONGTEXT      | Descripción detallada              |
| habitaciones    | INT           | Número de habitaciones             |
| wc              | INT           | Cantidad de baños                  |
| estacionamiento | INT           | Número de cocheras                 |
| creado          | DATE          | Fecha de registro                  |
| vendedores_id   | INT (FK)      | Relación con la tabla `vendedores` |

#### 🔗 Relación

- `propiedades.vendedores_id` → `vendedores.id`
- Un vendedor puede tener **muchas propiedades**.

---

## 🔄 Diagrama Simplificado

```
usuario
├── id
├── correo
└── contrasena

vendedores
├── id
├── nombre
├── apellido
└── telefono

propiedades
├── id
├── titulo
├── precio
├── imagen
├── descripcion
├── habitaciones
├── wc
├── estacionamiento
├── creado
└── vendedores_id → vendedores.id
```

---

## 💾 Script SQL (Resumen)

```sql
CREATE TABLE `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `correo` VARCHAR(50) NOT NULL,
  `contrasena` CHAR(60) NOT NULL
);

CREATE TABLE `vendedores` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(10)
);

CREATE TABLE `propiedades` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `titulo` VARCHAR(45) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `imagen` VARCHAR(200),
  `descripcion` LONGTEXT,
  `habitaciones` INT,
  `wc` INT,
  `estacionamiento` INT,
  `creado` DATE,
  `vendedores_id` INT,
  FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores`(`id`)
);
```

> 💡 **Consejo**: Inserta un usuario de ejemplo después de crear la base de datos:
>
> ```php
> $contrasena_hash = password_hash('1234', PASSWORD_DEFAULT);
> // INSERT INTO usuario (correo, contrasena) VALUES ('email@gmail.com', '$contrasena_hash');
> ```

---

## 👤 Autor

**Lucas Dos Santos**

---
