<?php

require("../controller/conex.php");

session_start();

if (!empty($_POST["insertar"])) {

    $nom = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);
    $stock = trim($_POST["stock"]);

    $stmt = $conex->prepare("INSERT INTO productos(nombre, precio, stock) VALUES(?,?,?)");
    $stmt->bind_param("sdi", $nom, $precio, $stock);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION["alerta"] = "Se inserto correctamente";
            $_SESSION["icono"] = "success";
            header("Location: ../index.php");
        }
    } else {
        $_SESSION["alerta"] = "Error al insertar";
        $_SESSION["icono"] = "error";
        header("Location: ../index.php");
    }

}