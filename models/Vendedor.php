<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio";
        }
        if (!preg_match('/^[0-9]{8,15}$/', $this->telefono)) {
            self::$errores[] = "El telefono no es valido";
        }

        return self::$errores;
    }

    public function guardar()
    {
        if ($this->id) {
            return $this->actualizarVendedor();
        } else {
            return $this->guardarVendedor();
        }
    }



    public function guardarVendedor()
    {
        // $atributos = $this->sanitizarDatos();

        $stmt = self::$db->prepare("INSERT INTO " . static::$tabla . " 
            (nombre, apellido, telefono)
            VALUES (?, ?, ?)");

        $stmt->bind_param(
            "sss",
            $this->nombre,
            $this->apellido,
            $this->telefono
        );

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /admin?resultado=1');
            exit;
        }
    }

    public function actualizarVendedor()
    {
        // Sanitizar los datos
        // $atributos = $this->sanitizarDatos();

        // Preparar la consulta SQL
        $stmt = self::$db->prepare("UPDATE " . static::$tabla . " SET 
        nombre = ?, 
        apellido = ?, 
        telefono = ?
        WHERE id = ? 
        LIMIT 1");

        // Enlazar los parámetros
        $stmt->bind_param(
            "sssi",
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->id
        );

        // Ejecutar la consulta
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /admin?resultado=2');
            exit;
        }
    }
}
