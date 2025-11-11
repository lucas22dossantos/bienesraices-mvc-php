<?php


namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::todas();

        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::todas();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // crear una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            // Verificar si se subió una imagen
            if (
                isset($_FILES['propiedad']['tmp_name']['imagen']) &&
                $_FILES['propiedad']['error']['imagen'] === UPLOAD_ERR_OK
            ) {
                $imagen = [
                    'name' => $_FILES['propiedad']['name']['imagen'],
                    'type' => $_FILES['propiedad']['type']['imagen'],
                    'tmp_name' => $_FILES['propiedad']['tmp_name']['imagen'],
                    'error' => $_FILES['propiedad']['error']['imagen'],
                    'size' => $_FILES['propiedad']['size']['imagen']
                ];

                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                $propiedad->imagen = $nombreImagen;
            } else {
                $imagen = null;
            }


            // validar
            $errores = $propiedad->validar();

            if (empty($errores)) {

                // Crear carpeta si no existe
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0777, true);
                }

                if ($imagen) {
                    // Procesar la imagen con Intervention
                    try {
                        $manager = new Image(new Driver());

                        $img = $manager->read($imagen['tmp_name'])
                            ->resize(800, 600)
                            ->toJpeg(85);

                        // Guardar la imagen en la carpeta destino
                        $img->save(CARPETA_IMAGENES . $nombreImagen);

                        // Asignar el nombre a la propiedad
                        $propiedad->imagen = $nombreImagen;

                        // Guardar en base de datos
                        $propiedad->guardar();
                    } catch (\Exception $e) {
                        $errores[] = "Error al procesar la imagen: " . $e->getMessage();
                    }
                }
            }
        }

        $router->render('/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores ?? [],
        ]);
    }
    public static function actualizar()
    {
        echo 'Actualizar';
    }
}
