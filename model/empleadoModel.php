<?php

class Usuario {
  private $conexion;

  function __construct($conexion) {
    $this->conexion = $conexion;
  }

  function crear_usuario($nombre, $email, $contraseña) {
    $query = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";
    mysqli_query($this->conexion, $query);
  }

  function obtener_usuarios() {
    $query = "SELECT * FROM usuarios";
    $resultado = mysqli_query($this->conexion, $query);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
  }

  function obtener_usuario_por_id($id) {
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($this->conexion, $query);
    return mysqli_fetch_assoc($resultado);
  }

  function actualizar_usuario($id, $nombre, $email, $contraseña) {
    $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', contraseña = '$contraseña' WHERE id = $id";
    mysqli_query($this->conexion, $query);
  }

  function eliminar_usuario($id) {
    $query = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($this->conexion, $query);
  }
}

