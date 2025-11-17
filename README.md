# 🏡 Bienes Raíces | Aplicación Web MVC con PHP y POO

Proyecto de sistema de administración de bienes raíces desarrollado con **PHP** utilizando el patrón de diseño **MVC (Modelo-Vista-Controlador)** y **Programación Orientada a Objetos (POO)**.

Este proyecto ejemplifica la arquitectura profesional de una aplicación web, incluyendo la gestión de bases de datos **MySQL**, sistema de **autenticación** completo, protección de **rutas administrativas** y automatización de tareas **frontend con Gulp**.

---

## 🛠️ Tecnologías y Características Principales

### Tecnologías Usadas

- **Backend:** PHP 7/8, MySQL.
- **Frontend:** HTML5, CSS3/SASS, JavaScript.
- **DevTools:** Node.js, npm, **Gulp** (para compilación y optimización).

### Funcionalidades

- **Arquitectura MVC** y POO organizada.
- **CRUD** completo para **Propiedades** y **Vendedores**.
- **Autenticación de Usuarios:** Login, Logout y manejo de sesiones.
- **Seguridad:** Validación de formularios y protección de rutas para administradores.
- **Manejo de Archivos:** Subida, validación y optimización de imágenes.

---

## 🚀 Requisitos e Instalación

### Requisitos del Sistema

Asegurate de tener instalados los siguientes componentes:

- **Servidor Web** (Apache, Nginx).
- **PHP** (Versión 7.4 o superior).
- **MySQL / MariaDB**.
- **Node.js** y **npm** (Necesarios para Gulp).
- **Composer** (Recomendado para manejar dependencias de PHP).

### Guía Rápida de Instalación

1.  **Clonar el Repositorio:**

    ```bash
    git clone [https://github.com/lucas22dossantos/bienesraices-mvc-php.git](https://github.com/lucas22dossantos/bienesraices-mvc-php.git)
    cd bienesraices-mvc-php
    ```

2.  **Instalar Dependencias Frontend (Node/Gulp):**

    ```bash
    npm install
    # Ejecutar Gulp para compilar SASS/JS y mover archivos al build
    npm run dev
    ```

3.  **Configuración del Servidor Web:**
    - Configurá el **Document Root** de tu servidor web (virtual host) para que apunte a la carpeta **`/public`** dentro del proyecto. Esto es esencial para la seguridad y el enrutamiento.

---

## ⚙️ Configuración de la Base de Datos

### 1. Creación e Importación

1.  Creá una base de datos en MySQL (ej.: `bienesraices_crud`).
2.  Importá el esquema de la base de datos y los datos iniciales usando el archivo **`bienesraices_crud.sql`** (debes incluir este archivo en el repositorio para facilitar la instalación, o indicar dónde se encuentra el script).

### 2. Credenciales

Configurá las credenciales de conexión a tu base de datos editando el archivo de configuración correspondiente (generalmente dentro de `/includes` o `/config`).

### 3. Usuario Administrador (Login)

Para ingresar al panel de administración, el sistema utiliza la tabla `usuario`.

| Campo                                                                | Valor de Ejemplo  |
| -------------------------------------------------------------------- | ----------------- |
| **correo**                                                           | `email@gmail.com` |
| **contrasena**                                                       | `1234`            |
| **Nota:** La contraseña está cifrada con `password_hash()` en la BD. |

---

## 📚 Estructura del Proyecto

La aplicación sigue un patrón **MVC** estricto para la separación de responsabilidades.

| Carpeta            | Descripción                                                                             |
| :----------------- | :-------------------------------------------------------------------------------------- |
| **`/controllers`** | Lógica de la aplicación: procesa datos y retorna la vista.                              |
| **`/models`**      | Modelos POO que interactúan con la base de datos.                                       |
| **`/views`**       | Archivos PHP/HTML que generan la interfaz de usuario.                                   |
| **`/public`**      | **Document Root** principal. Contiene CSS, JS, imágenes y el _entry point_ (index.php). |
| **`/includes`**    | Clases de configuración y _helpers_.                                                    |
| **`/src`**         | Código compartido, incluyendo el **Router** principal de la aplicación.                 |
| **`gulpfile.js`**  | Archivo de configuración para automatizar tareas frontend.                              |

---

## 🗄️ Diseño de la Base de Datos

El sistema se basa en tres tablas principales. La relación es **uno a muchos** (`vendedores` a `propiedades`).

### Tablas y Relaciones

| Tabla             | Propósito                                                  | Relación Importante                              |
| :---------------- | :--------------------------------------------------------- | :----------------------------------------------- |
| **`usuario`**     | Almacena las credenciales para el login del administrador. | -                                                |
| **`vendedores`**  | Datos de contacto de los vendedores.                       | **1 a M** con `propiedades`                      |
| **`propiedades`** | Información detallada de los bienes raíces.                | **M a 1** con `vendedores` (por `vendedores_id`) |

---

## 👤 Autor

**Lucas Dos Santos**

---
