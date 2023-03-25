<?php

$id = isset($usuario_actual['id']) ? $usuario_actual['id'] : '';

?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $id ? 'Editar' : 'Agregar'; ?> Usuario</title>
</head>
<body>
  <h1><?php echo $id ? 'Editar' : 'Agregar'; ?> Usuario</h1>
  <form action="../controler/empleadoControler.php?accion=<?php echo $id ? 'editar&id&id=' . $id : 'nuevo'; ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $usuario_actual['nombre'] ?? ''; ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $usuario_actual['email'] ?? ''; ?>" required><br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" value="<?php echo $usuario_actual['contraseña'] ?? ''; ?>" required><br>
    <input type="submit" value="Guardar">
  </form>
  <a href="../controler/empleadoControler.php">Volver a la lista de usuarios</a>
