<?php


namespace Model;


class Admin extends ActiveRecord
{

    // base de datos
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'correo', 'contrasena'];

    public $id;
    public $correo;
    public $contrasena;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->correo = $args['correo'] ?? '';
        $this->contrasena = $args['contrasena'] ?? '';
    }


    public function validar()
    {
        if (!$this->correo) {
            self::$errores[] = "El correo es obligatorio";
        }

        if (!$this->contrasena) {
            self::$errores[] = "La contraseña es obligatoria";
        }
        return self::$errores;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = "El usuario no existe";
            return;
        }

        return $resultado;
    }

    public function comprobarContraseña($resulado)
    {
        $usuario = $resulado->fetch_object();
        $autenticado =  password_verify($this->contrasena, $usuario->contrasena);

        if (!$autenticado) {
            self::$errores[] = "La contraseña es incorrecta";
        }
        return $autenticado;
    }

    public function autenticar()
    {
        session_start();

        //llenar el arreglo de la sesión
        $_SESSION['usuario'] = $this->correo;
        $_SESSION['login'] = true;

        //redireccionar
        header('Location: /admin');
    }
}
