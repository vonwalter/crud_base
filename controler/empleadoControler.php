<?php

require_once("C:/xampp2/htdocs/recibos/otroCrud/conexion.php");
require_once('C:/xampp2/htdocs/recibos/otroCrud/model/empleadoModel.php');

$usuario = new Usuario($conexion);

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'lista';
}



switch ($accion) {
    case 'lista':
        $usuarios = $usuario->obtener_usuarios();
        include('C:\xampp2\htdocs\recibos\otroCrud/view/empleadoLista.php');
        break;

    case 'nuevo':
        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
            $usuario->crear_usuario($_POST['nombre'], $_POST['email'], $_POST['contraseña']);
            header('Location: empleadoControler.php');
        } else {
            include('../view/empleadoNuevoEditar.php');
        }
        break;

    case 'editar':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario_actual = $usuario->obtener_usuario_por_id($id);
            if ($usuario_actual) {
                if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
                    $usuario->actualizar_usuario($id, $_POST['nombre'], $_POST['email'], $_POST['contraseña']);
                    header('Location: empleadoControler.php');
                } else {
                    include('../view/empleadoNuevoEditar.php');
                }
            } else {
                header('Location: empleadoControler.php');
            }
        } else {
            header('Location: empleadoControler.php');
        }
        break;

    case 'eliminar':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario_actual = $usuario->obtener_usuario_por_id($id);
            if ($usuario_actual) {
                $usuario->eliminar_usuario($id);
                header('Location: empleadoControler.php');
            } else {
                header('Location: empleadoControler.php');
            }
        } else {
            header('Location: empleadoControler.php');
        }
        break;

    default:
        $usuarios = $usuario->obtener_usuarios();
        include('empleadoLista.php');
        break;
}
