<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::get(100);

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::encontrar($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad,
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router)
    {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $respuestas = $_POST['contacto'];

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['SMTP_PORT'];

            // Configurar el contenido del mail
            $mail->setFrom($_ENV['SMTP_FROM']); //quien envia el Email
            $mail->addAddress($_ENV['SMTP_TO']); //quien lo recibe
            $mail->Subject = 'Tienes un nuevo  mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; //para que permitas caracteres especiales

            $mail->SMTPDebug = 0; // si lo pones en 2 ves todos los detalles

            // // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<body>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p> Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p> Venta o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p> Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';

            // Enviar de forma condicional algunos campos de email y telefeno

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p> Preciere ser contactado por: ' . $respuestas['contacto'] . '</p>';
                $contenido .= '<p> Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p> Fecha de contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p> Hora de contacto: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p> Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '</body>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';


            //Enviar el email
            if ($mail->send()) {
                $mensaje = 'Mensaje enviado Correctamente';
            } else {
                $mensaje = 'El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje,
        ]);
    }
}
