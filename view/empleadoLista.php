<!DOCTYPE html>
<html>
<head>
  <title>Lista de usuarios</title>
</head>
<body>
  <h1>Lista de usuarios</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Contraseña</th>
      <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
      <tr>
        <td><?php echo $usuario['id']; ?></td>
        <td><?php echo $usuario['nombre']; ?></td>
        <td><?php echo $usuario['email']; ?></td>
        <td><?php echo $usuario['contraseña']; ?></td>
        <td>
          <a href="../controler/empleadoControler.php?accion=editar&id=<?php echo $usuario['id']; ?>">Editar</a>
          <a href="../controler/empleadoControler.php?accion=eliminar&id=<?php echo $usuario['id']; ?>">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../controler/empleadoControler.php?accion=nuevo">Nuevo usuario</a>
  <a href="generar_recibo.php">Imprimir</a>
</body>
</html>