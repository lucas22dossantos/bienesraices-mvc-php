<?php

define('TEMPLATES_URL',  __DIR__ . '/templates');
define('FUNCIONES_URL',  __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplates(string $nombre, bool $inicio)
{
    include __DIR__ . "/templates/{$nombre}.php";
}


function estaAutenticada(): bool
{
    // Solo inicia la sesión si no hay una activa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return $_SESSION['login'] ?? false;
}

function debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

// escapa / sanitizar del HTML

function san($html): string
{
    $san = htmlspecialchars($html);
    return $san;
}

// validar tipo de contenido
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = "";

    switch ($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}


function validarORedireccionar(string $url)
{
    // Validar el id sea un entero
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location:"  . $url);
        exit;
    }

    return $id;
}
