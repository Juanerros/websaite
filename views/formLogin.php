<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
</head>

<?php
session_start();
?>

<body>
    <header></header>
    <main>
        <form action="../model/login.php" method="post">
            <input type="text" name="nombre" placeholder="Ingrese nombre" required>
            <input type="password" name="clave" placeholder="Ingrese clave" required>
            <input type="submit" value="Logearse" name="logear">
        </form>
        <a href="formRegistrar.php">Registrase</a>
    </main>
    
    <footer></footer>

    <script>
        <?php if (isset($_SESSION["alerta"])) { ?>

            Swal.fire({
                text: "<?php echo $_SESSION["alerta"]; ?>",
                icon: "<?php echo $_SESSION["icono"]; ?>",
            });

            <?php
            unset($_SESSION["alerta"]);
            unset($_SESSION["icono"]);
            ?>
        <?php } ?>
    </script>

</body>

</html>