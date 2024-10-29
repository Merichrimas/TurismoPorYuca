<?php
function createReserva($nombre_cliente, $hotel, $destino, $fecha) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO reservas (nombre_cliente, hotel, destino, fecha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre_cliente, $hotel, $destino, $fecha);
    $stmt->execute();
    $stmt->close();
}

function getReservas() {
    global $mysqli;
    $result = $mysqli->query("SELECT id, nombre_cliente, hotel, destino, fecha FROM reservas");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateReserva($id, $nombre_cliente, $hotel, $destino, $fecha) {
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE reservas SET nombre_cliente = ?, hotel = ?, destino = ?, fecha = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nombre_cliente, $hotel, $destino, $fecha, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteReserva($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("DELETE FROM reservas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
