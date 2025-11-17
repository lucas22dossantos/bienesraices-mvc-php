🏡 Bienes Raíces | Aplicación Web MVC con PHP y POOProyecto de sistema de administración de bienes raíces desarrollado con PHP utilizando el patrón de diseño MVC (Modelo-Vista-Controlador) y Programación Orientada a Objetos (POO).Este proyecto ejemplifica la arquitectura profesional de una aplicación web, incluyendo la gestión de bases de datos MySQL, sistema de autenticación completo, protección de rutas administrativas y automatización de tareas frontend con Gulp.🛠️ Tecnologías y Características PrincipalesTecnologías UsadasBackend: PHP 7/8, MySQL.Frontend: HTML5, CSS3/SASS, JavaScript.DevTools: Node.js, npm, Gulp (para compilación y optimización).FuncionalidadesArquitectura MVC y POO organizada.CRUD completo para Propiedades y Vendedores.Autenticación de Usuarios: Login, Logout y manejo de sesiones.Seguridad: Validación de formularios y protección de rutas para administradores.Manejo de Archivos: Subida, validación y optimización de imágenes.🚀 Requisitos e InstalaciónRequisitos del SistemaAsegurate de tener instalados los siguientes componentes:Servidor Web (Apache, Nginx).PHP (Versión 7.4 o superior).MySQL / MariaDB.Node.js y npm (Necesarios para Gulp).Composer (Recomendado para manejar dependencias de PHP).Guía Rápida de InstalaciónClonar el Repositorio:git clone [https://github.com/lucas22dossantos/bienesraices-mvc-php.git](https://github.com/lucas22dossantos/bienesraices-mvc-php.git)
cd bienesraices-mvc-php
Instalar Dependencias Frontend (Node/Gulp):npm install

# Ejecutar Gulp para compilar SASS/JS y mover archivos al build

npm run dev
Configuración del Servidor Web:Configurá el Document Root de tu servidor web (virtual host) para que apunte a la carpeta /public dentro del proyecto. Esto es esencial para la seguridad y el enrutamiento.⚙️ Configuración de la Base de DatosPara que la aplicación funcione correctamente, debes crear la base de datos y sus tablas.1. Script de Creación y Datos InicialesCopia y ejecuta el siguiente script SQL en tu gestor de base de datos (por ejemplo, PHPMyAdmin, MySQL Workbench o la consola).--
-- Base de datos: `bienesraices_crud`
--

---

--
-- Estructura de tabla para `vendedores`
--

CREATE TABLE `vendedores` (
`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nombre` VARCHAR(45) NOT NULL,
`apellido` VARCHAR(45) NOT NULL,
`telefono` VARCHAR(10) NOT NULL
);

---

--
-- Estructura de tabla para `propiedades`
--

CREATE TABLE `propiedades` (
`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`titulo` VARCHAR(45) NOT NULL,
`precio` DECIMAL(10,2) NOT NULL,
`imagen` VARCHAR(200) NOT NULL,
`descripcion` LONGTEXT NOT NULL,
`habitaciones` INT(1) NOT NULL,
`wc` INT(1) NOT NULL,
`estacionamiento` INT(1) NOT NULL,
`creado` DATE NOT NULL,
`vendedores_id` INT(11) NOT NULL
);

---

--
-- Estructura de tabla para `usuario`
--

CREATE TABLE `usuario` (
`id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`correo` VARCHAR(50) NOT NULL,
`contrasena` CHAR(60) NOT NULL
);

---

--
-- Relación de Llave Foránea
--
-- Establece la relación entre propiedades y vendedores
ALTER TABLE `propiedades`
ADD CONSTRAINT `fk_vendedores_propiedades` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

---

--
-- Inserción del Usuario Administrador
--
-- Correo: 'email@gmail.com'
-- Contraseña: '1234' (cifrada con password_hash)
--

INSERT INTO `usuario` (`correo`, `contrasena`) VALUES
('email@gmail.com', '$2y$10$wN9iL66x/YnO.nC9O.v17O3.7O8jO6P6L1H8L6D1Y6K4W0D5Y1L9G5H5R9F3Y1T7U3Y6G2F0F7V1');

2. Credenciales y AccesoConexión: Configurá las credenciales de conexión a tu base de datos editando el archivo de configuración correspondiente (generalmente dentro de /includes o /config).Usuario Administrador (Login): Para ingresar al panel de administración, utiliza la tabla usuario con los siguientes datos iniciales:CampoValor de Ejemplocorreoemail@gmail.comcontrasena1234Nota: La contraseña está cifrada con password_hash() en la BD.🗄️ Diseño de la Base de DatosEl sistema se basa en tres tablas principales. La relación es uno a muchos (vendedores a propiedades).Estructura Detallada de CamposTablaCampoTipoRestricciónDescripciónusuarioidINTPK, AIIdentificador único.correoVARCHAR(50)NOT NULLEmail del administrador.contrasenaCHAR(60)NOT NULLContraseña cifrada (password_hash).vendedoresidINTPK, AIIdentificador del vendedor.nombreVARCHAR(45)NOT NULLNombre del vendedor.apellidoVARCHAR(45)NOT NULLApellido del vendedor.telefonoVARCHAR(10)NOT NULLNúmero de teléfono.propiedadesidINTPK, AIIdentificador de la propiedad.tituloVARCHAR(45)NOT NULLTítulo.precioDECIMAL(10,2)NOT NULLPrecio.imagenVARCHAR(200)NOT NULLNombre del archivo de imagen.descripcionLONGTEXTNOT NULLDescripción larga.habitacionesINTNOT NULLNúmero de habitaciones.wcINTNOT NULLNúmero de baños.estacionamientoINTNOT NULLCocheras.creadoDATENOT NULLFecha de creación de la propiedad.vendedores_idINTFKID del vendedor asociado.📚 Estructura del ProyectoLa aplicación sigue un patrón MVC estricto para la separación de responsabilidades.CarpetaDescripción/controllersLógica de la aplicación: procesa datos y retorna la vista./modelsModelos POO que interactúan con la base de datos./viewsArchivos PHP/HTML que generan la interfaz de usuario./publicDocument Root principal. Contiene CSS, JS, imágenes y el entry point (index.php)./includesClases de configuración y helpers./srcCódigo compartido, incluyendo el Router principal de la aplicación.gulpfile.jsArchivo de configuración para automatizar tareas frontend.👤 AutorLucas Dos Santos
