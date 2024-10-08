<?php

require("../controller/conex.php");

session_start();

if (!empty($_POST["registrar"])) {
    $nom = $_POST["nombre"];
    $clave = $_POST["clave"];

    $stmt = $conex->prepare("INSERT INTO login(nombre, clave) VALUES(?, ?)");
    $stmt->bind_param("ss", $nom, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["alerta"] = "Registro correcto";
        $_SESSION["icono"] = "success";
        header("Location: ../views/formLogin.php");
    } else {
        $_SESSION["alerta"] = "Usuario y/o contraseña incorrecto/s";
        $_SESSION["icono"] = "error";
        header("Location: ../views/formRegistrar.php");
    }

}