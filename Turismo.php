<?php
require 'reservas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {

        // Verificar si el nombre del cliente, hotel, destino y fecha no están vacíos
        if (!empty($_POST["nombre_cliente"]) && !empty($_POST["hotel"]) && !empty($_POST["destino"]) && !empty($_POST["fecha"])) {
            createReserva($_POST["nombre_cliente"], $_POST["hotel"], $_POST["destino"], $_POST["fecha"]);
        } else {
            // Imprimir alerta si algún campo está vacío
            echo "<script>alert('Nombre del cliente, hotel, destino y fecha son requeridos');</script>";
        }

    } elseif (isset($_POST["update"])) {

        // Verificar si el id, nombre del cliente, hotel, destino y fecha no están vacíos
        if (!empty($_POST["id"]) && !empty($_POST["nombre_cliente"]) && !empty($_POST["hotel"]) && !empty($_POST["destino"]) && !empty($_POST["fecha"])) {
            updateReserva($_POST["id"], $_POST["nombre_cliente"], $_POST["hotel"], $_POST["destino"], $_POST["fecha"]);
        } else {
            // Imprimir alerta si algún campo está vacío
            echo "<script>alert('ID, nombre del cliente, hotel, destino y fecha son requeridos');</script>";
        }

    } elseif (isset($_POST["delete"])) {

        // Verificar si el id no está vacío
        if (!empty($_POST["id"])) {
            deleteReserva($_POST["id"]);
        } else {
            // Imprimir alerta si el ID está vacío
            echo "<script>alert('ID es requerido');</script>";
        }
    }
}

// Obtener todas las reservas para mostrarlas en la interfaz
$reservas = getReservas();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Reservas Turísticas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Formulario para agregar una nueva reserva -->
            <div class="col">
                <h2>Agregar Reserva</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>Nombre del Cliente: <input type="text" name="nombre_cliente" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Hotel: <input type="text" name="hotel" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Destino: <input type="text" name="destino" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Fecha: <input type="date" name="fecha" class="form-control"></label>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
                </form>
            </div>

            <!-- Formulario para actualizar una reserva -->
            <div class="col">
                <h2>Actualizar Reserva</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>ID: <input type="number" name="id" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Nombre del Cliente: <input type="text" name="nombre_cliente" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Hotel: <input type="text" name="hotel" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Destino: <input type="text" name="destino" class="form-control"></label>
                    </div>
                    <div class="form-group">
                        <label>Fecha: <input type="date" name="fecha" class="form-control"></label>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-pencil"></i> Actualizar</button>
                </form>
            </div>

            <!-- Formulario para eliminar una reserva -->
            <div class="col">
                <h2>Eliminar Reserva</h2>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label>ID: <input type="number" name="id" class="form-control"></label>
                    </div>
                    <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                </form>
            </div>
        </div>

        <!-- Lista de reservas existentes -->
        <h2>Lista de Reservas</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Hotel</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?php echo $reserva["id"]; ?></td>
                    <td><?php echo $reserva["nombre_cliente"]; ?></td>
                    <td><?php echo $reserva["hotel"]; ?></td>
                    <td><?php echo $reserva["destino"]; ?></td>
                    <td><?php echo $reserva["fecha"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>