<?php

require("../controller/conex.php");

session_start();

if (!empty($_POST["logear"])) {
    $nom = $_POST["nombre"];
    $clave = $_POST["clave"];

    $stmt = $conex->prepare("SELECT id_login FROM login WHERE nombre = ? AND clave = ?");
    $stmt->bind_param("ss", $nom, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["id_login"] = $row["id_login"];
        $_SESSION["alerta"] = "Login correcto";
        $_SESSION["icono"] = "success";
        header("Location: ../index.php");
    } else {
        $_SESSION["alerta"] = "Usuario y/o contraseña incorrecto/s";
        $_SESSION["icono"] = "error";
        header("Location: ../views/formLogin.php");
    }

}
